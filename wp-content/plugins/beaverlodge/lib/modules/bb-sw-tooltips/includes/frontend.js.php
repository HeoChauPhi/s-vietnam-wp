<?php 
$background = $settings->background_color;
$text = $settings->font_color;
$align = $settings->popup_align;
$position = $settings->popup_position;
?>

jQuery(function() {
    jQuery.Zebra_Tooltips(jQuery('.fl-node-<?php echo $id; ?> a.tooltips'), {
        background_color: '#<?php echo $background; ?>',
        color: '#<?php echo $text; ?>',
        position: '<?php echo $align; ?>',
        default_position: '<?php echo $position; ?>',
    });
});