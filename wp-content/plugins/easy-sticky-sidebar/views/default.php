<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly 
}

if ('yes' == $ctacontent->collapse_on_page_load) {
	array_push($cta_classes, 'shrink');
}

$cta_links_attrs = '';
$tag = 'div';
if ($ctacontent->SSuprydp_action_option_url) {
	$tag = 'a';
	$cta_links_attrs = sprintf('href="%s"', esc_url_raw($ctacontent->SSuprydp_action_option_url));
}

if ($ctacontent->SSuprydp_target_blank == 'Yes') {
	$cta_links_attrs .= ' target="_blank"';
}

if ($ctacontent->SSuprydp_nofollow == 'Yes') {
	$cta_links_attrs .= ' rel="nofollow"';
}

ob_start(); ?>

<div id="<?php echo 'easy-sticky-sidebar-' . esc_attr($ctacontent->id) ?>" class="<?php echo esc_attr(implode(' ', $cta_classes)) ?>" data-id="<?php echo esc_attr($ctacontent->id); ?>">

	<div class="sticky-sidebar-button">
		<div><?php do_action('easy_sticky_sidebar_sticky_cta_button', $ctacontent); ?></div>
		<?php
		if (function_exists('wordpress_cta_pro_get_close_button')) {
			wordpress_cta_pro_get_close_button($ctacontent);
		} ?>
	</div>

	<<?php echo esc_html($tag) ?> class="sticky-sidebar-content sticky-sidebar-container" <?php echo $cta_links_attrs; ?>>

		<?php if ('yes' != $ctacontent->hide_cta_image) { ?>
			<div class="sticky-sidebar-image"></div>
		<?php } ?>

		<div class="sticky-sidebar-text sticky-content-inner"><?php echo do_shortcode(wp_kses_post($ctacontent->SSuprydp_content_option_text)); ?></div>
		<?php

		if ($ctacontent->SSuprydp_action_option_url) {
			if ($ctacontent->line_separator_show != 'no') {
				echo '<hr>';
			}

			if ($ctacontent->hide_call_to_action != 'yes') {
				printf('<div class="sticky-sidebar-call-to-action sticky-content-inner">%s</div>', wp_kses_post($ctacontent->SSuprydp_action_option_text));
			}
		} ?>
	</<?php echo esc_html($tag) ?>>
</div>
<?php

echo ob_get_clean();
