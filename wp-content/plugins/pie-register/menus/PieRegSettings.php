<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	# Define variable's default values
	$action = $subaction = "";
	$active	= 'class="active"';
	
	if(isset($_GET['tab']))
		$action	= esc_attr($_GET['tab']);
	if(isset($_GET['subtab']))
		$subaction	= esc_attr($_GET['subtab']);
	?>  
<div id="container"  class="pieregister-admin">
  <div class="right_section">
    <div class="settings">
      <h2 class="headingwidth"><?php _e("Settings",'pie-register') ?></h2>   
      <div class="rest_btn_wrap">
        <form id="frm_default" method="post" onsubmit="return window.confirm('Are you sure? It will restore all the plugin settings to default.');">
          <input type="button" onclick="jQuery('#frm_default').submit();" class="submit_btn flt_none" value="<?php _e("Reset to Default","pie-register");?>" />
          <input type="hidden" value="1" name="piereg_default_settings" />
        </form>
      </div>
      <?php 
	  	if( isset($this->pie_post_array['notice']) && !empty($this->pie_post_array['notice']) ){
			echo '<div id="message" class="updated fade msg_belowheading"><p><strong>' . $this->pie_post_array['notice'] . '</strong></p></div>';
			
			# Role Based Pages On Edit Section
			if(	!isset($_GET['action']) && !isset($_GET['pie_id']) ) {
				$_POST['piereg_user_role'] = $_POST['logged_in_url'] = $_POST['log_in_page'] = $_POST['log_out_url'] = $_POST['log_out_page'] = "";
			}
		}
		else if( isset($this->pie_post_array['error']) && !empty($this->pie_post_array['error']) ){
			echo '<div id="error" class="error fade msg_belowheading"><p><strong>' . $this->pie_post_array['error'] . '</strong></p></div>';
		}		
		
		if(  isset($this->pie_post_array['success']) && !empty($this->pie_post_array['success']) ){
			echo '<div id="message" class="updated fade msg_belowheading"><p><strong>' . $this->pie_post_array['license_success'] . '.</strong></p></div>';
		}
		
		?>
        <div id="tabsSetting" class="tabsSetting">
        <div class="whiteLayer"></div>
        	<ul class="tabLayer1">
            	<li <?php echo ($action == "pages" || $action == "") ? $active :""; ?>>
                	<a href="admin.php?page=pie-settings&tab=pages"><?php _e("Pages",'pie-register') ?></a>
                    <ul class="tabLayer2">
                        <li <?php echo ( ($action == "pages" && $subaction == "") || ($action == "" && $subaction == "") || $subaction == "all-users" ) ? $active :""; ?>>
                        	<a href="admin.php?page=pie-settings&tab=pages&subtab=all-users"><?php _e("All Users",'pie-register') ?></a></li>                        
                        <li><img src="<?php echo $this->plugin_url ?>images/settingTabSeperator.jpg"/></li>    
                        <li <?php echo ($subaction == "role-based") ? $active :""; ?>>
                            <a href="admin.php?page=pie-settings&tab=pages&subtab=role-based"><?php _e("Role Based Redirect",'pie-register') ?></a></li>
                    </ul>
                </li>
            	<li <?php echo ($action == "ux") ? $active :""; ?> >
                	<a href="admin.php?page=pie-settings&tab=ux"><?php _e("UX",'pie-register') ?></a>
                	<ul class="tabLayer2">
                        <li <?php echo ( ($action == "ux" && $subaction == "") || $subaction == "basic" ) ? $active :""; ?>>
                        	<a href="admin.php?page=pie-settings&tab=ux&subtab=basic"><?php _e("Basic",'pie-register') ?></a></li>
                        <li><img src="<?php echo $this->plugin_url ?>images/settingTabSeperator.jpg"/></li>    
                        <li <?php echo ($subaction == "advanced") ? $active :""; ?>>
                        	<a href="admin.php?page=pie-settings&tab=ux&subtab=advanced"><?php _e("Advanced",'pie-register') ?></a></li>
                    </ul>
                </li>
            	<li <?php echo ($action == "overrides") ? $active :""; ?>>
                	<a href="admin.php?page=pie-settings&tab=overrides"><?php _e("Overrides",'pie-register') ?></a></li>
                <?php if(is_plugin_active('pie-register-geolocation/pie-register-geolocation.php')){ ?>    
                    <li <?php echo ($action == "geo_location") ? $active : ""; ?>>
                        <a href="admin.php?page=pie-settings&tab=geo_location"><?php _e("Geo Location", 'piereg') ?></a></li>    
            	<?php } ?>
                <li <?php echo ($action == "security") ? $active :""; ?>>
                	<a href="admin.php?page=pie-settings&tab=security"><?php _e("Security",'pie-register') ?></a>
                    <ul class="tabLayer2">
                        <li <?php echo ( ($action == "security" && $subaction == "") || $subaction == "sbasic" ) ? $active :""; ?>>
                        	<a href="admin.php?page=pie-settings&tab=security&subtab=sbasic"><?php _e("Basic",'pie-register') ?></a></li>
                        <li><img src="<?php echo $this->plugin_url ?>images/settingTabSeperator.jpg"/></li>    
                        <li <?php echo ($subaction == "sadvanced") ? $active :""; ?>>
                        	<a href="admin.php?page=pie-settings&tab=security&subtab=sadvanced"><?php _e("Advanced",'pie-register') ?></a></li>
                    </ul>
                </li>
            </ul>
        </div>
                
        <div class="wrapper-forms">
        	<div class="right_section">
        		<div class="settings">
                <?php 
                    if( ($action == "pages") || $action == "") { 
                        
                        if($action == "pages" && $subaction == "role-based") { 
                            $this->require_once_file($this->plugin_dir.'/menus/settings/PieRegPagesRoleBased.php');
                        
                        } else {	
                        
                            $this->require_once_file($this->plugin_dir.'/menus/settings/PieRegPagesAllUsers.php');			
                        } 
                    
                    } elseif ($action == "geo_location") {
                            
                        $this->require_once_file( WP_PLUGIN_DIR . '/pie-register-geolocation/menus/PR_GeoLocation_Settings2.php');
                    
                    } elseif($action == "ux") { 
                        
                        $this->require_once_file($this->plugin_dir.'/menus/settings/PieRegUX.php');
                        
                    } elseif($action == "overrides") { 
                    
                        $this->require_once_file($this->plugin_dir.'/menus/settings/PieRegOverrides.php');
                    
                    } elseif($action == "security") { 
                    
                        if($action == "security" && $subaction == "" || $subaction == "sbasic") { 
                            
                            $this->require_once_file($this->plugin_dir.'/menus/settings/PieRegSecurityBasic.php');
                        
                        } else {	
                        
                            $this->require_once_file($this->plugin_dir.'/menus/settings/PieRegSecurityAdvance.php');		
                        }
                    
                    }  
                    ?>
        		</div>
        	</div>    
        </div>
    </div>
  </div>
</div>