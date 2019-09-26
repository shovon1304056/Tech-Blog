<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php 
	$action =	""; $active	= 'class="selected"';
	if(isset($_GET['tab']))
		$action	= esc_attr($_GET['tab']);
	?>

<div id="container"  class="pieregister-admin">
    <div class="right_section">
        <div class="go-pro">
            <h2 class="headingwidth"><?php _e("Extentions",'pie-register') ?></h2>
            <p><?php _e("Upgrade to PRO plan and unlock ALL features and addons for Free. Pie Registration offers perpetual licensing - purchase once and use for a lifetime, no hassle or recurring periodic payments","pie-register")?>.</p>
            <div class="features-main-container">
                <div class="et_pb_row et_pb_row_1 features-row">
                    <div class="feature-single-container margin-right">
                        <div class="feature-icon-container"><img src="<?php echo plugins_url() ?>/pie-register/images/img-info3.png" /></div>
                        <div class="feature-content-container">
                            <h5>Ticket Based Support</h5>
                            <p class="feature-content">Use our ticketing system to get premium support directly from the Pie Register Support and Development team.</p>
                        </div>
                    </div>
                    <div class="feature-single-container margin-right">
                        <div class="feature-icon-container"><img src="<?php echo plugins_url() ?>/pie-register/images/img-info1.png" /></div>
                        <div class="feature-content-container">
                            <h5>One Time Purchase</h5>
                            <p class="feature-content">Don't choose, just get all Features and  Addons at one price for a lifetime, no hassle or recurring periodic payments. </p>
                        </div>                    
                    </div>
                    <div class="feature-single-container margin-right">
                        <div class="feature-icon-container"><img src="<?php echo plugins_url() ?>/pie-register/images/img-info2.png" /></div>
                        <div class="feature-content-container">
                            <h5>Ongoing updates</h5>
                            <p class="feature-content">As we introduce new Features and Addons to Professional Version. You'll get them as free updates.</p>
                        </div>                    
                    </div>
                </div>
            </div>
            <a href="https://pieregister.com/plan-and-pricing/"><?php _e("View Pricing","pie-register") ?></a>
        </div>
        
        <ul class="go-pro-tabs">
            <li <?php echo ($action != "addons") ? $active :""; ?>><a href="admin.php?page=pie-pro-features"><?php _e("Features","pie-register") ?></a></li>
            <li <?php echo ($action == "addons") ? $active :""; ?>><a href="admin.php?page=pie-pro-features&tab=addons"><?php _e("Addons","pie-register") ?></a></li>
        </ul>
        <div class="pane">
        	<?php if( $action == 'addons' ) { ?> 
            	<div id="tab2" class="tab-content">
                <div class="addons-container-section">
                    <div class="addon-row">
                        <div class="addon-column margin-right">
                            <div class="addon-container">
                                <img class="addon-img" src="<?php echo plugins_url("images/pro/6.jpg", dirname(__FILE__) ); ?>" alt="Authorize.net Payment Addon">
                                <div class="">
                                    <div class="addon-content-container">
                                        <h3>Authorize.net Payment Addon</h3>
                                        <p>Use Authorize.net addon to process membership payments using Pie Register.</p>
                                        <a class="get-addon" href="https://store.genetech.co/cart/?add-to-cart=878">Get this addon</a>
                                        <a class="read-more" href="https://pieregister.com/addons/authorize-net-payment-addon/"> Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="addon-column margin-right">
                            <div class="addon-container">
                                <img class="addon-img" src="<?php echo plugins_url("images/pro/5.jpg", dirname(__FILE__) ); ?>" alt="Stripe Payment Addon">
                                <div class="">
                                    <div class="addon-content-container">
                                        <h3>Stripe Payment Addon</h3>
                                        <p>Use Stripe addon to process membership payments using Pie Register.</p>
                                        <a class="get-addon" href="https://store.genetech.co/cart/?add-to-cart=835">Get this addon</a>
                                        <a class="read-more" href="https://pieregister.com/addons/stripe-payment-addon/"> Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="addon-column margin-right">
                            <div class="addon-container">
                                <img class="addon-img" src="<?php echo plugins_url("images/pro/3.jpg", dirname(__FILE__) ); ?>" alt="Two-step Authentication Addon">
                                <div class="">
                                    <div class="addon-content-container">
                                        <h3>Two-step Authentication Addon</h3>
                                        <p>Add an additional security layer by having users verify registration via SMS (TWILIO).</p>
                                        <a class="get-addon" href="https://store.genetech.co/cart/?add-to-cart=200">Get this addon</a>
                                        <a class="read-more" href="https://pieregister.com/addons/two-step-authentication-addon/"> Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="addon-column margin-right">
                            <div class="addon-container">
                                <img class="addon-img" src="<?php echo plugins_url("images/pro/4.jpg", dirname(__FILE__) ); ?>" alt="MailChimp Addon">
                                <div class="">
                                    <div class="addon-content-container">
                                        <h3>MailChimp Addon</h3>
                                        <p>Use Pie Register to export your site users into MailChimp lists to send communication, sales and marketing emails.</p>
                                        <a class="get-addon" href="https://store.genetech.co/cart/?add-to-cart=197">Get this addon</a>
                                        <a class="read-more" href="https://pieregister.com/addons/mailchimp-addon/"> Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="addon-column margin-right">
                            <div class="addon-container">
                                <img class="addon-img" src="<?php echo plugins_url("images/pro/1.jpg", dirname(__FILE__) ); ?>" alt="Social Login Addon">
                                <div class="">
                                    <div class="addon-content-container">
                                        <h3>Social Login Addon</h3>
                                        <p>Let your site or blog users to login via their Facebook, Twitter, Google, LinkedIn, Yahoo and WordPress accounts.</p>
                                        <a class="get-addon" href="https://store.genetech.co/cart/?add-to-cart=199">Get this addon</a>
                                        <a class="read-more" href="https://pieregister.com/addons/social-login-addon/"> Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="addon-column margin-right">
                            <div class="addon-container">
                                <img class="addon-img" src="<?php echo plugins_url("images/pro/2.jpg", dirname(__FILE__) ); ?>" alt="Profile Search Addon">
                                <div class="">
                                    <div class="addon-content-container">
                                        <h3>Profile Search Addon</h3>
                                        <p>With the Profile Search tool, admin can provide users the feature to search or filter to display user data.</p>
                                        <a class="get-addon" href="https://store.genetech.co/cart/?add-to-cart=198">Get this addon</a>
                                        <a class="read-more" href="https://pieregister.com/addons/profile-search-addon/"> Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>			
			<?php  } else { ?> 
				<div id="tab1" class="tab-content">
                <div class="features-main-container">
                    <div class="et_pb_row et_pb_row_1 features-row">
                        <div class="feature-single-container margin-right">
                            <div class="feature-icon-container" style="background-image: url('<?php echo plugins_url("images/pro/feature-1.png", dirname(__FILE__) ); ?>')"></div>
                            <a class="" href="">
                                <div class="feature-content-container">
                                    <h5>Multiple Registration Forms</h5>
                                    <p class="feature-content">Drag-drop fields to create registration forms so users can register to your blog or site.</p>
                                </div>
                            </a>
                        </div>
                        <div class="feature-single-container margin-right">
                            <div class="feature-icon-container" style="background-image: url(<?php echo plugins_url("images/pro/feature-10.png", dirname(__FILE__) ); ?>)"></div>
                            <a class="" href="">
                                <div class="feature-content-container">
                                    <h5>Block Users</h5>
                                    <p class="feature-content">Block spammers by username, email and IP address.</p>
                                </div>
                            </a>
                        </div>
                        <div class="feature-single-container margin-right">
                            <div class="feature-icon-container" style="background-image: url(<?php echo plugins_url("images/pro/feature-15.png", dirname(__FILE__) ); ?>)"></div>
                            <a class="" href="">
                                <div class="feature-content-container">
                                    <h5>Role Based Redirection</h5>
                                    <p class="feature-content">Rules for Role-Based Redirection to land users on different pages based on user role.</p>
                                </div>
                            </a>
                        </div>

                        <div class="feature-single-container margin-right">
                            <div class="feature-icon-container" style="background-image: url(<?php echo plugins_url("images/pro/feature-18.png", dirname(__FILE__) ); ?>)"></div>
                            <a class="" href="">
                                <div class="feature-content-container">
                                    <h5>Auto Login</h5>
                                    <p class="feature-content">Auto login users after registration and let them complete verification process later on.</p>
                                </div>
                            </a>
                        </div>
                        <div class="feature-single-container margin-right">
                            <div class="feature-icon-container" style="background-image: url(<?php echo plugins_url("images/pro/feature-16.png", dirname(__FILE__) ); ?>)"></div>
                            <a class="" href="">
                                <div class="feature-content-container">
                                    <h5>Built-in Pie Register Form Themes</h5>
                                    <p class="feature-content">Change the default forms UI and apply the built-in form themes according to website UI.</p>
                                </div>
                            </a>
                        </div>
                        <div class="feature-single-container margin-right">
                            <div class="feature-icon-container" style="background-image: url(<?php echo plugins_url("images/pro/feature-9.png", dirname(__FILE__) ); ?>)"></div>
                            <a class="" href="">
                                <div class="feature-content-container">
                                    <h5>Customizable Login Security</h5>
                                    <p class="feature-content">Advanced security will lets you throw CAPTCHA based on the number of unsuccessful login attempts.</p>
                                </div>
                            </a>
                        </div>

                        <div class="feature-single-container margin-right">
                            <div class="feature-icon-container" style="background-image: url(<?php echo plugins_url("images/pro/3.png", dirname(__FILE__) ); ?>)"></div>
                            <a class="" href="">
                                <div class="feature-content-container">
                                    <h5>Content Restriction</h5>
                                    <p class="feature-content">Restrict access to website pages or posts based on user role or current logged in status.</p>
                                </div>
                            </a>
                        </div>
                        <div class="feature-single-container margin-right">
                            <div class="feature-icon-container" style="background-image: url(<?php echo plugins_url("images/pro/feature-19.png", dirname(__FILE__) ); ?>)"></div>
                            <a class="" href="">
                                <div class="feature-content-container">
                                    <h5>Timed Form Submission</h5>
                                    <p class="feature-content">Prevent bots for event timed submission.</p>
                                </div>
                            </a>
                        </div>
                        <div class="feature-single-container margin-right">
                            <div class="feature-icon-container" style="background-image: url(<?php echo plugins_url("images/pro/feature-12.png", dirname(__FILE__) ); ?>)"></div>
                            <a class="" href="">
                                <div class="feature-content-container">
                                    <h5>Restrict Widgets</h5>
                                    <p class="feature-content">Set visibility of widgets for specific user roles and non-logged in users.</p>
                                </div>
                            </a>
                        </div>

                        <div class="feature-single-container margin-right">
                            <div class="feature-icon-container" style="background-image: url(<?php echo plugins_url("images/pro/feature-6.png", dirname(__FILE__) ); ?>)"></div>
                            <a class="" href="">
                                <div class="feature-content-container">
                                    <h5>Import and Export</h5>
                                    <p class="feature-content">Want to quickly duplicate or move your existing WordPress user or configuration data?</p>
                                </div>
                            </a>
                        </div>
                        <div class="feature-single-container margin-right">
                            <div class="feature-icon-container" style="background-image: url(<?php echo plugins_url("images/pro/feature-13.png", dirname(__FILE__) ); ?>)"></div>
                            <a class="" href="">
                                <div class="feature-content-container">
                                    <h5>Ticket Based Support</h5>
                                    <p class="feature-content">Pie Register provides a premium support directly from the development team.</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="et_pb_row et_pb_row_1 features-row-last">
                        <a class="features-last-pricing" target="_blank" href="https://pieregister.com/plan-and-pricing/"><?php _e("Upgrade Now","pie-register") ?></a>
                        <a class="view-all-features" target="_blank" href="https://pieregister.com/features/"><?php _e("View all features","pie-register") ?></a>
                    </div>

                </div>
            </div>			
			<?php } ?>
        </div>
    </div>
</div>