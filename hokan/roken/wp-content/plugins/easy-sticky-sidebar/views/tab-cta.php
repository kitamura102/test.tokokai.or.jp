<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly 
}
$btn_color = $ctacontent->SSuprydp_button_option_color;
if($btn_color){
$button_color = $btn_color ;
}

$btn_backcolor = $ctacontent->SSuprydp_button_option_backg_color;
if($btn_backcolor){
$button_background_color = $btn_backcolor ;
}

$cta_links_attrs = sprintf('href="%s"', esc_url($ctacontent->tab_cta_url));
if ($ctacontent->tab_cta_target_blank == 'yes') {
	$cta_links_attrs .= ' target="_blank"';
}

if ($ctacontent->tab_cta_nofollow == 'yes') {
	$cta_links_attrs .= ' rel="nofollow"';
}

$horizontal_vertical_position = $ctacontent->dynamic_properties['horizontal_vertical_position'];
$position_style = '';
$position_a = '';
    if($ctacontent->SSuprydp_cta_position == 'left' || $ctacontent->SSuprydp_cta_position == 'right'){
        if ($horizontal_vertical_position === 'top') {
            $position_style = 'top: 0; transform: none;';    
        } elseif ($horizontal_vertical_position === 'bottom') {
            $position_style = 'bottom: 0; transform: none; top:100%';
            $position_a = 'position: absolute; bottom: 0; top:unset';

        }
    }

ob_start(); ?>

<div id="<?php echo 'easy-sticky-sidebar-' . esc_attr($ctacontent->id) ?>" style="<?php echo $position_style;   ?>"
    class="<?php echo esc_attr(implode(' ', $cta_classes)) ?>" data-id="<?php echo esc_attr($ctacontent->id); ?>">
    <?php 
 
?>

    <a class="sticky-sidebar-button"
        style="color: <?php echo $button_color ?> ; background-color:<?php echo $button_background_color ?>; <?php echo $position_a; ?>"
        <?php echo $cta_links_attrs; ?>>
        <div><?php echo wp_kses_post($ctacontent->SSuprydp_button_option_text) ?></div>
    </a>
    <?php 
	if (function_exists('wordpress_cta_pro_get_close_button')) { 
		wordpress_cta_pro_get_close_button($ctacontent); 
	} ?>
</div>
<?php
     
echo ob_get_clean();