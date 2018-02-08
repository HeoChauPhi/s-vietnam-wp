.fl-node-<?php echo $id; ?> .header-text a { 
    color: #<?php echo $settings->font_color; ?>;
    text-decoration: <?php echo $settings->font_underline; ?>;
    font-size: <?php echo $settings->font_size; ?>px;
<?php 
$font = $settings->font_family;

if ($font[family] != 'Default') { ?>
    font-family: "<?php echo $font[family]; ?>";
    font-weight: <?php echo $font[weight]; ?>;
<?php } ?>
    line-height: <?php echo $settings->font_size; ?>px;
}
.fl-node-<?php echo $id; ?> .header-text .no-animate { 
    color: #<?php echo $settings->plain_color; ?>;
    text-decoration: <?php echo $settings->font_underline; ?>;
    font-size: <?php echo $settings->font_size; ?>px;
<?php 
$font = $settings->font_family;

if ($font[family] != 'Default') { ?>
    font-family: "<?php echo $font[family]; ?>";
    font-weight: <?php echo $font[weight]; ?>;
<?php } ?>
    line-height: <?php echo $settings->font_size; ?>px;
}

.fl-node-<?php echo $id; ?> .header-text a:hover { 
    color: #<?php echo $settings->font_color_hover; ?>;
    text-decoration: <?php echo $settings->font_underline_hover; ?>;
}

.fl-node-<?php echo $id; ?> .header-text { 
    
    text-align: <?php echo $settings->align; ?>;
}


.typed-cursor{
    opacity: 1;
    -webkit-animation: blink 0.7s infinite;
    -moz-animation: blink 0.7s infinite;
    animation: blink 0.7s infinite;
    color: #<?php echo $settings->font_color; ?>;
    font-size: <?php echo $settings->font_size; ?>px;
}
.typed-cursor:hover,
.fl-node-<?php echo $id; ?> .header-text a:hover .typed-cursor{
    opacity: 1;
    -webkit-animation: blink 0.7s infinite;
    -moz-animation: blink 0.7s infinite;
    animation: blink 0.7s infinite;
    color: #<?php echo $settings->font_color_hover; ?>;
}
@keyframes blink{
    0% { opacity:1; }
    50% { opacity:0; }
    100% { opacity:1; }
}
@-webkit-keyframes blink{
    0% { opacity:1; }
    50% { opacity:0; }
    100% { opacity:1; }
}
@-moz-keyframes blink{
    0% { opacity:1; }
    50% { opacity:0; }
    100% { opacity:1; }
}