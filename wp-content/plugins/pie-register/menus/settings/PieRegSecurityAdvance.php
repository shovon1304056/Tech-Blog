<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php $piereg = PieReg_Base::get_pr_global_options();

$_disable = $_available_in_pro 	= "";
if(!$this->piereg_pro_is_activate)	{
	$_disable 			= "disabled";
	$_available_in_pro 	= ' - <span style="color:red;">'. __("Available in Pro version","pie-register") . '</span>';
}

if( !isset($_GET['act']) || !isset($_GET['pie_id']) || !isset($_GET['option']) )
{
	?>
    <form name="frm_settings_security_advanced" action="" method="post">
    <?php if( function_exists( 'wp_nonce_field' )) wp_nonce_field( 'piereg_wp_settings_security_advanced','piereg_settings_security_advanced'); ?>
        <div class="fields">
        	<div class="piereg_box_style_1">
             <input <?php echo $_disable; ?> type="checkbox" name="reg_form_submission_time_enable" id="reg_form_submission_time_enable" value="1" <?php echo ($piereg['reg_form_submission_time_enable']=="1")?'checked="checked"':''?> /> 
             <?php _e("Time form submission, reject form if submitted within ",'pie-register') ?>
             <input <?php echo $_disable; ?> type="text" name="reg_form_submission_time" 
             		style="width:auto;"
                    id="reg_form_submission_time" 
                    value="<?php echo ( (isset($piereg['reg_form_submission_time']) && !empty($piereg['reg_form_submission_time'])) ? intval($piereg['reg_form_submission_time']) : 0 ); ?>" 
                    class="input_fields submissionfield" 
                    />
                    <?php _e("seconds or less.",'pie-register') ?>
            <span class="quotation" style="margin-left:0px;"><?php _e("Security enhancement for forms (timed submission)",'pie-register') ?></span> 
            </div>
        </div>
        <div class="fields">
            <input name="action" value="pie_reg_settings" type="hidden" />
            <input <?php echo $_disable; ?> type="submit" class="submit_btn flt_none" value="<?php _e("Save Settings","pie-register"); ?>" />
        </div>
    </form>
<hr class="seperator" />    
<?php 
}
	?>
<h2 class="hydin_without_bg mar_none"><?php _e("Restrict Widgets",'pie-register') ?></h2>
    <div class="piereg_clear"></div>        
<?php if( $this->piereg_pro_is_activate ) { ?>
    <?php $this->require_once_file($this->plugin_dir.'/restrict_widget/pie_register_widget_class.ini.php'); ?>
<?php } else { ?>
	<p><?php _e('You need to upgrade to PRO to use this Restrict Widgtets feature. Want to learn about this feature ?','pie-register');?> 
    <a href="https://pieregister.com/manual/pie-register-features/7329-2/" target="_blank"><?php _e('Click Here','pie-register');?></a>
    </p>
<?php } ?>
