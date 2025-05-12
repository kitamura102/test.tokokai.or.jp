 <?php
	if (!defined('ABSPATH')) {
		exit; // Exit if accessed directly 
	}
	?>

 <div class="wrap wrap-easy-sticky-sidebar">
     <?php easy_sticky_sidebar_get_header();  ?>
     <hr class="wp-header-end">

     <div class="easy-sticky-sidebar-container">
         <div id="SSuprydp_builder_form">
             <div class="SSuprydp_col_2 SSuprydp-form-col">
                 <form id="SSuprydp_form" method="post"
                     action="<?php echo add_query_arg('action', 'process_pages', admin_url('admin-ajax.php')) ?>"
                     <?php echo implode(' ', $form_attributes)  ?>>
                     <input type="hidden" id="ajaxaction"
                         value="<?php echo add_query_arg('action', 'ajax_check', admin_url('admin-ajax.php')); ?>" />
                     <?php wp_nonce_field('_nonce_easy_sticky_sidebar') ?>
                     <div class="SSuprydp_page_fields">
                         <div class="ssuprydp_load" style="display:none;">
                             <p>Loading.....</p>
                         </div>
                         <!-- ----------------------Sticky Sidebar Media-----------------------------  -->

                         <div class="SSuprydp_field_wrap cta-name-field">
                             <label class="heading"><?php _e("CTA Name", "easy-sticky-sidebar"); ?></label>
                             <input type="text" name="sidebar_name" class="SSuprydp_input"
                                 value="<?php echo esc_attr($stickycta->sidebar_name); ?>"
                                 placeholder="Enter CTA name here">
                         </div>
                         <?php
                         error_log( 'Sticky Object: ' . print_r( $stickycta, true ) );
?>
                         <input type="hidden" name="sticky_id" value="<?php echo esc_attr($sticky_id); ?>" />
                         <div class="gap-10"></div>

                         <?php do_action('easy_sticky_sidebar_before_tab', $stickycta); ?>

                         <div class="status-notice status-notice-off">
                             <p><?php _e('Your CTA live status is set to Off and will not show on the front end.', 'easy-sticky-sidebar') ?>
                             </p>
                         </div>

                         <div class="status-notice status-notice-development">
                             <p><?php _e('Your CTA live status is set to Development and will show on the front end only for users logged in as admin.', 'easy-sticky-sidebar') ?>
                             </p>
                         </div>

                         <input type="hidden" name="cta_editor_current_tab"
                             value="<?php echo esc_attr($editor_current_tab) ?>">
                           
                         <h2 class="wordpress-cta-heading"><?php _e("CTA Settings", "easy-sticky-sidebar") ?> </h2>
                         <div class="s_set"><input type="submit" onclick="return SSuprydp_Admin.ProcessPageData(event, this);"
                         class="button_save" value="Save Setting"></div>
                         <div class="SSuprydp_btn_save">
                         <input type="submit" onclick="return SSuprydp_Admin.ProcessPageData(event, this);"
                             class="button_save" value="<?php _e("Save Setting"); ?>">
                     </div>
                         <p class="wordpress-cta-instruction" style="margin-bottom: 10px">
                             <?php _e('Follow the steps to create your CTA and then make it go live.', 'easy-sticky-sidebar') ?>
                         </p>
                    
                         <nav class="nav-tab-wrapper sticky-sidebar-nav-tab-wrapper">
                             <?php
								$tabs = easy_sticky_sidebar_get_cta_tabs();
								$tab_number = 1;
								foreach ($tabs as $key => $tab) {
									$tab_active = ('sticky-sidebar-' . $key === $editor_current_tab) ? 'nav-tab-active' : '';
									$tab_icon = !empty($tab['icon']) ? sprintf('<i class="%s"></i>', esc_attr($tab['icon'])) : '';
									printf('<a href="#sticky-sidebar-%1$s" class="nav-tab nav-tab-%1$s %2$s">%3$d. %4$s %5$s</a>', $key, $tab_active, $tab_number, $tab_icon, esc_html($tab['label']));
									$tab_number++;
								} ?>
                         </nav>

                         <div class="sticky-sidebar-tab-content">
                             <?php
                           
								foreach ($tabs as $key => $tab) {
                                    // echo "<pre>";
                                    // print_r($tab_1['callback']);
                                    // echo "</pre>";


									$tab_display = ('sticky-sidebar-' . $key === $editor_current_tab) ? 'display:block' : '';
									printf('<div id="sticky-sidebar-%s" class="tab-content" style="%s">', $key, $tab_display);
									call_user_func_array($tab['callback'], [$stickycta]);
									echo '</div>';
								} ?>
                         </div>
                         <!--/end sticky-sidebar-tab-content -->
                     </div>
                     <!--/end .SSuprydp_page_fields -->

                   

                     <div class="SSuprydp_field_wrap" id="SSuprydp_modal_msg" style="display:none;">
                         <div class="SSuprydp_modal_content"></div>
                     </div>
                 </form>
             </div><!-- SSuprydp_col_2 -->

             <?php if (!has_wordpress_cta_pro()) : ?>
             <div class="wordpress-cta-advertisement">
                 <span class="div-two">
                     <a href="https://wpctapro.com/" target="_blank"><img
                             src="<?php echo EASY_STICKY_SIDEBAR_PLUGIN_URL; ?>/assets/img/ads.jpeg" /></a>
                 </span>
                 <span class="div-two">
                     <a href="https://alphalinkseo.com/" target="_blank"><img
                             src="<?php echo EASY_STICKY_SIDEBAR_PLUGIN_URL; ?>/assets/img/alphalinkseo.jpg" /></a>
                 </span>
             </div>

             <?php endif; ?>
         </div>
     </div>
 </div>

 <div id="easy-sticky-sidebar-toast"><?php _e('Clear Your Cache', 'easy-sticky-sidebar') ?></div>



 <script type='text/javascript'>
jQuery(document).ready(function($) {
    var file_frame;

    jQuery('#upload_image_button').on('click', function(event) {

        event.preventDefault();

        // If the media frame already exists, reopen it.
        if (file_frame) {
            file_frame.open();
            return;
        }

        // Create the media frame.
        file_frame = wp.media({
            title: 'Select a image to upload',
            button: {
                text: 'Use this image',
            },
            multiple: false // Set to true to allow multiple files to be selected
        });

        // When an image is selected, run a callback.
        file_frame.on('select', function() {
            // We set multiple to false so only get one image from the uploader
            attachment = file_frame.state().get('selection').first().toJSON();

            // Do something with attachment.id and/or attachment.url here
            $('#image-preview').attr('src', attachment.url).css('width', 'auto');
            $('#image_attachment_id').val(attachment.id);
            $('#sticky_s_media').val(attachment.url);
        });

        // Finally, open the modal
        file_frame.open();
    });
});
 </script>