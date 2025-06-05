<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly 
}
if ( $ctacontent->SSuprydp_button_option_color) {
	$button_color = sanitize_hex_color($ctacontent->SSuprydp_button_option_color);
}

if ( $ctacontent->SSuprydp_button_option_backg_color) {
	$button_background_color = sanitize_hex_color($ctacontent->SSuprydp_button_option_backg_color);
}

if ( $ctacontent->SSuprydp_content_option_color) {
	$content_color = sanitize_hex_color($ctacontent->SSuprydp_content_option_color);
}

if ( $ctacontent->content_background_color) {
	$contents_background_color = sanitize_hex_color($ctacontent->content_background_color);
}

if ( $ctacontent->SSuprydp_action_option_color) {
	$link_color = sanitize_hex_color($ctacontent->SSuprydp_action_option_color);
}

if ( $ctacontent->link_text_background) {
	$links_text_background = sanitize_hex_color($ctacontent->link_text_background);
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

if ( $ctacontent->call_to_action_padding ) {
    $padding_top    = isset($ctacontent->call_to_action_padding['top']) ? intval($ctacontent->call_to_action_padding['top']) : 0;
    $padding_bottom = isset($ctacontent->call_to_action_padding['bottom']) ? intval($ctacontent->call_to_action_padding['bottom']) : 0;
    $padding_right  = isset($ctacontent->call_to_action_padding['right']) ? intval($ctacontent->call_to_action_padding['right']) : 0;
    $padding_left   = isset($ctacontent->call_to_action_padding['left']) ? intval($ctacontent->call_to_action_padding['left']) : 0;
    $padding_unit   = isset($ctacontent->call_to_action_padding['unit']) 
                        ? sanitize_text_field((string) $ctacontent->call_to_action_padding['unit']) 
                        : 'px';

    // If all paddings are 0, use default
    if ($padding_top === 0 && $padding_right === 0 && $padding_bottom === 0 && $padding_left === 0) {
        $padding_css = "14px 24px";
    } else {
        $padding_css = "{$padding_top}{$padding_unit} {$padding_right}{$padding_unit} {$padding_bottom}{$padding_unit} {$padding_left}{$padding_unit}";
    }
} else {
    // No padding set, use default
    $padding_css = "14px 24px";
}

$btn_letter_spacing = '';
if($ctacontent->call_to_action_letter_spacing){
	$btn_letter_spacing = $ctacontent->call_to_action_letter_spacing ? intval($ctacontent->call_to_action_letter_spacing) : 0;
}

ob_start(); ?>

<div id="<?php echo esc_attr('easy-sticky-sidebar-' . $ctacontent->id); ?>"
    class="<?php echo esc_attr(implode(' ', $cta_classes)); ?>" data-id="<?php echo esc_attr($ctacontent->id); ?>">

    <div class="sticky-sidebar-button" style="background-color:<?php echo esc_attr($button_background_color); ?>">
        <div style="color: <?php echo esc_attr($button_color); ?>;">
            <?php do_action('easy_sticky_sidebar_sticky_cta_button', $ctacontent); ?>
        </div>
        <?php
		if (function_exists('wordpress_cta_pro_get_close_button')) {
			wordpress_cta_pro_get_close_button($ctacontent);
		}
		?>
    </div>

    <<?php echo esc_html($tag); ?> class="sticky-sidebar-content sticky-sidebar-container"
        <?php echo $cta_links_attrs; ?>>

        <?php
		$image = $ctacontent->sticky_s_media;

		if ('yes' != $ctacontent->hide_cta_image) { ?>
        <div class="sticky-sidebar-image" style="background-image: url('<?php echo esc_url($image); ?>');"></div>
        <?php } ?>

        <div class="sticky-sidebar-text sticky-content-inner"
            style="color: <?php echo esc_attr($content_color); ?>; background-color: <?php echo esc_attr($contents_background_color); ?>;">
            <?php echo do_shortcode(wp_kses_post($ctacontent->SSuprydp_content_option_text)); ?>
        </div>

        <?php 

        $url = $ctacontent->SSuprydp_action_option_url;
        $text = $ctacontent->SSuprydp_action_option_text;
        $line_background = $ctacontent->line_separator_color;
        $line_height = $ctacontent->dynamic_properties['line_separator_thickness'] ?? '';

        if (!empty($url)) :
            if ($ctacontent->line_separator_show !== 'no') {
                echo '<hr style="background-color:' . esc_attr($line_background) . '; height:' . esc_attr($line_height) . 'px; border: none;">';
            }

            if ($ctacontent->hide_call_to_action !== 'yes') {
                $style = sprintf(
                    'color:%s; background-color:%s;%s%s',
                    esc_attr($link_color),
                    esc_attr($links_text_background),
                    $padding_css ? ' padding:' . esc_attr($padding_css) . ';' : '',
                    $btn_letter_spacing ? ' letter-spacing:' . esc_attr($btn_letter_spacing) . 'px;' : ''
                );

                printf(
                    '<div class="sticky-sidebar-call-to-action sticky-content-inner" style="%s">%s</div>',
                    $style,
                    wp_kses_post($text)
                );
            } 
        endif;
        ?>

    </<?php echo esc_html($tag); ?>>
</div>
<?php
echo ob_get_clean();