<?php 

$flexAlign = $settings->align; 
if ($flexAlign == 'flex-start') {
    $align = 'left';
} elseif ($flexAlign == 'flex-end') {
    $align = 'right';
} else {
    $align = 'center'; 
}

?>

.sw-callout {
    text-align: <?php echo $align; ?>;
}

i.sw-callout-icon {
    text-align: center;
    font-size: <?php echo $settings->icon_size; ?>px;
    color: #<?php echo $settings->icon_colour; ?>;
<?php if ($settings->icon_bg_radius != 'none') { ?>
    background-color: #<?php echo $settings->icon_bg_colour; ?>;
    border-radius: <?php echo $settings->icon_bg_radius; ?>%;
<?php if ($settings->icon_bg_radius == '0') { ?>
    height: <?php echo $settings->icon_padding_top; ?>px;
    width: <?php echo $settings->icon_padding_sides; ?>px;
    line-height: <?php echo $settings->icon_padding_top; ?>px;
<?php } else { ?>
    width: <?php echo $settings->icon_padding_circle; ?>px;
    height: <?php echo $settings->icon_padding_circle; ?>px;
    line-height: <?php echo $settings->icon_padding_circle; ?>px;
<?php } ?>
<?php } ?>
}

h<?php echo $settings->heading_class; ?>.sw-callout-heading {
    color: #<?php echo $settings->heading_colour; ?>;
<?php if ($settings->heading_font != 'default') { ?>
    font-size: <?php echo $settings->heading_fontsize; ?>px;
<?php } ?>
    font-family: <?php echo $settings->heading_font_family[family]; ?>;
    font-weight: <?php echo $settings->heading_font_family[weight]; ?>;
}

.sw-callout-buttons {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    justify-content: <?php echo $flexAlign; ?>;
}

a.sw-callout-btn-one {
<?php if($settings->btn_one_style != 'transparent') { ?>
    background-color: #<?php echo $settings->btn_one_bg_color; ?>;
<?php } ?>
    color: #<?php echo $settings->btn_one_text_color; ?>;
<?php if ($settings->btn_one_width != 'auto') { ?>
    width: <?php echo $settings->btn_one_custom_width; ?>px;
<?php } else { ?>
    width: auto;
<?php } ?>
    font-size: <?php echo $settings->btn_one_font_size; ?>px;
    padding: <?php echo $settings->btn_one_padding; ?>px;
    border: <?php echo $settings->border_size; ?>px solid #<?php echo $settings->btn_one_border_color; ?>;
    border-radius: <?php echo $settings->btn_one_border_radius; ?>px;
    margin: <?php echo $settings->btn_one_margin_top; ?>px <?php echo $settings->btn_one_margin_sides; ?>px;
}

a.sw-callout-btn-one:hover {
    background-color: #<?php echo $settings->btn_one_bg_hover_color; ?>;
    color: #<?php echo $settings->btn_one_text_hover_color; ?>;
    text-decoration: none;
}

a.sw-callout-btn-two {
<?php if($settings->btn_two_style != 'transparent') { ?>
    background-color: #<?php echo $settings->btn_two_bg_color; ?>;
<?php } ?>
    color: #<?php echo $settings->btn_two_text_color; ?>;
<?php if ($settings->btn_two_width != 'auto') { ?>
    width: <?php echo $settings->btn_two_custom_width; ?>px;
<?php } else { ?>
    width: auto;
<?php } ?>
    font-size: <?php echo $settings->btn_two_font_size; ?>px;
    padding: <?php echo $settings->btn_two_padding; ?>px ;
    border: <?php echo $settings->border_size; ?>px solid #<?php echo $settings->btn_two_border_color; ?>;
    border-radius: <?php echo $settings->btn_two_border_radius; ?>px;
    margin: <?php echo $settings->btn_two_margin_top; ?>px <?php echo $settings->btn_two_margin_sides; ?>px;
}

a.sw-callout-btn-two:hover {
    background-color: #<?php echo $settings->btn_two_bg_hover_color; ?>;
    color: #<?php echo $settings->btn_two_text_hover_color; ?>;
    text-decoration: none;
}