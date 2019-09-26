<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( !class_exists( 'WP_List_Table' ) )
    require_once( $this->admin_path  . 'includes/class-wp-list-table.php' );

class Pie_Invitation_Table extends WP_List_Table
{
    private $order;
    private $orderby;
    public function __construct()
    {
        parent :: __construct( array(
            'singular' => 'table example',
            'plural'   => 'table examples',
            'ajax'     => true
        ) );
    }
    private function get_sql_results()
    {
        global $wpdb;
        $search = "";
        $searchByCodeName = "";
        $args = array( "`id`", "`name`", "`code_usage`", "`count`","`status`" );
        $sql_select = implode( ', ', $args );
		$prefix=$wpdb->prefix."pieregister_";
		$codetable=$prefix."code";
		
		$order_by 	 = sanitize_sql_orderby("`$this->orderby` $this->order");	// Ensures a string is a valid SQL order by clause.
		if( $order_by === false )
		{
			$order_by = "`code_usage` DESC";
		}

        if (isset($_GET['search']) && $_GET['search'])
        {
            $search             = $_GET['search'];
            $searchByCodeName   = "WHERE `name` LIKE %s";
            $query = $wpdb->prepare("SELECT %s as `check_box`,$sql_select,%s as `action` FROM `$codetable` $searchByCodeName ORDER BY $order_by", "check_box", "action", '%' . $wpdb->esc_like($search) . '%');
        } else {
            $query = $wpdb->prepare("SELECT %s as `check_box`,$sql_select,%s as `action` FROM `$codetable` $searchByCodeName ORDER BY $order_by", "check_box", "action");
        }
		 // echo $query; die;
        $sql_results = $wpdb->get_results( $query );
		
        return $sql_results;
    }
    public function set_order()
    {
        $order = 'DESC';
        if ( isset( $_GET['order'] ) && $_GET['order'] )
            $order = $_GET['order'];
        $this->order = sanitize_key( $order );	// Lowercase alphanumeric characters, dashes and underscores are allowed
    }
    public function set_orderby()
    {
        $orderby = 'code_usage';
        if ( isset( $_GET['orderby'] ) && $_GET['orderby'] )
            $orderby = $_GET['orderby'];
        $this->orderby = sanitize_key( $orderby );	// Lowercase alphanumeric characters, dashes and underscores are allowed
    }
    public function search_box($text, $input_id)
    {
        if (empty($_REQUEST['search']) && !$this->has_items()){
            return;
        }

        $input_id = $input_id . '-search-input';
        ?>
            <form id="pie-invite-search" method="GET">
                <?php 

                    if (!empty($_REQUEST['orderby']))
                        echo '<input type="hidden" name="orderby" value="' . esc_attr($_REQUEST['orderby']) . '" />';
                    if (!empty($_REQUEST['order']))
                        echo '<input type="hidden" name="order" value="' . esc_attr($_REQUEST['order']) . '" />';
                    if (!empty($_REQUEST['page']))
                        echo '<input type="hidden" name="page" value="' . esc_attr($_REQUEST['page']) . '" />';      
                ?>
                <p class="search-box">
                    <label class="screen-reader-text" for="<?php echo esc_attr($input_id); ?>"><?php echo $text; ?>:</label>
                    <input type="search" id="<?php echo esc_attr($input_id); ?>" name="search" value="<?php _admin_search_query(); ?>" />
                    <?php submit_button($text, '', '', false, array('id' => 'search-submit')); ?>
                </p>
            </form>
        <?php

    }
    public function ajax_user_can() 
    {
        return current_user_can( 'edit_posts' );
    }
    public function no_items() 
    {
         _e( 'No invitation codes are found', "pie-register" );
    }
    public function get_views()
    {
        return array();
    }
    public function get_columns()
    {
        $columns = array(
			'check_box'		=> __( '<input type="checkbox" id="select_all_invitaion_checkbox" class="select_all_invitaion_checkbox" onclick="select_all_invitaion_checkbox();" title="'.__("Click Here to Select/De-select All","pie-register").'" />' ),
            'id'         => __( '#' ),
            'name' => __( 'Code Name',"pie-register" ),
            'code_usage'  => __( 'Usage' ,"pie-register"),
            'count'  => __( 'Used' ,"pie-register"),
            'action'  => __( 'Action',"pie-register" )
        );
        return $columns;        
    }
    public function get_sortable_columns()
    {
        $sortable = array(
            'id'         => array( 'id', true ),
            'name' => array( 'name', true ),
            'code_usage'  => array( 'code_usage', true ),
            'count'  => array( 'count', true )
        );
        return $sortable;
    }
    public function prepare_items( )
    {
        $columns  = $this->get_columns();
        $hidden   = array();
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = array( 
            $columns,
            $hidden,
            $sortable 
        );

        // SQL results
        $posts = $this->get_sql_results();
        
        empty( $posts ) AND $posts = array();
        # >>>> Pagination
		
        $opt = get_option(OPTION_PIE_REGISTER);
		$per_page_item = (isset($opt['invitaion_codes_pagination_number']) && ((int)$opt['invitaion_codes_pagination_number']) != 0)? (int)$opt['invitaion_codes_pagination_number'] : 10;
		unset($opt);
        $per_page     = $per_page_item;
        $current_page = $this->get_pagenum();
        $total_items  = count( $posts );
        $this->set_pagination_args( array (
            'total_items' => $total_items,
            'per_page'    => $per_page,
            'total_pages' => ceil( $total_items / $per_page )
        ) );
        $last_post = $current_page * $per_page;
        $first_post = $last_post - $per_page + 1;
        $last_post > $total_items AND $last_post = $total_items;
        // Setup the range of keys/indizes that contain 
        // the posts on the currently displayed page(d).
        // Flip keys with values as the range outputs the range in the values.
        $range = array_flip( range( $first_post - 1, $last_post - 1, 1 ) );
        // Filter out the posts we're not displaying on the current page.
        $posts_array = array_intersect_key( $posts, $range );
        # <<<< Pagination
        // Prepare the data
        $permalink = __( 'Edit:' );
		$id = 1;
        foreach ( $posts_array as $key => $post )
        {
            $link     = "#";
            $no_title = __( 'No title set' );
            $title    = ! $post->name ? "<em>{$no_title}</em>" : $post->name;
			$post_name = $post->name;
			$posts[ $key ]->check_box = '<input type="checkbox" value="'.$posts[ $key ]->id.'" class="invitaion_fields_class" id="invitaion_fields[id_'.$id.']" />';
			
			/*code name*/
			$e_title = __( 'Click Here To Edit',"pie-register" );
			$posts[ $key ]->name = '<span title="'.$e_title.'" onclick="show_field(this,\'field_id_'.$id.'\');" id="field_id_1_'.$id.'">'.$posts[ $key ]->name.'</span><input type="text" id="field_id_'.$id.'" value="'.$posts[ $key ]->name.'" style="display:none;" onblur="hide_field(this,\'field_id_1_'.$id.'\');" data-id-invitationcode="'.$posts[ $key ]->id.'" data-type-invitationcode="name" />';
			
			/*code usage*/
			$posts[ $key ]->code_usage = '<span title="'.$e_title.'" onclick="show_field(this,\'usage_field_id_'.$id.'\');" id="usage_field_id_1_'.$id.'">'.$posts[ $key ]->code_usage.'</span><input autocomplete="off" type="text" id="usage_field_id_'.$id.'" value="'.$posts[ $key ]->code_usage.'" style="display:none;" onblur="hide_field(this,\'usage_field_id_1_'.$id.'\');" data-id-invitationcode="'.$posts[ $key ]->id.'" data-type-invitationcode="code_usage" />';
			
			$class = ($post->status==1) ? "active"  : "inactive";
			$title = ($class == "active")? "Deactivate" : "Activate";

			$posts[ $key ]->action = '<a onclick="changeStatusCode(\''.$post->id.'\',\''.$post_name.'\',\''.$title.'\');" href="javascript:;" title="'.__($title,"pie-register").'" class="'.$class.'"></a> <a class="delete" href="javascript:;" onclick="confirmDelInviteCode(\''.$post->id.'\',\''.$post_name.'\');" title="'.__("Delete","pie-register").'"></a>';
			$id++;
        }
        $this->items = $posts_array;
		
    }
    public function column_default( $item, $column_name )
    {
        return $item->$column_name;
    }
    public function display_tablenav( $which ) {
        ?>
        <div class="tablenav <?php echo esc_attr( $which ); ?>">
            
            <div class="alignleft actions">
                <?php //Bulk option here ?>
            </div>
             
            <?php
            $this->extra_tablenav( $which );
            $this->pagination( $which );
            ?>
            <br class="piereg_clear" />
        </div>
        <?php
    }
    public function extra_tablenav( $which )
    {
        global $wp_meta_boxes;
        $views = $this->get_views();
        if ( empty( $views ) )
            return;
        $this->views();
    }
}