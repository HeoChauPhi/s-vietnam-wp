.sb-subtitle p {
    color: #<?php echo $settings->mc_sub_color; ?>;
    font-size: <?php echo $settings->mc_sub_fontsize; ?>px;
<?php if ( $settings->sub_font[family] != 'Default' ) { ?>
    font-family: <?php echo $settings->sub_font[family]; ?>;
    font-weight: <?php echo $settings->sub_font[weight]; ?>
<?php } ?>
}



.sb-heading p{
    color: #<?php echo $settings->mc_header_color; ?>;
    font-size: <?php echo $settings->mc_header_fontsize; ?>px;
<?php if ( $settings->header_font[family] != 'Default' ) { ?>
    font-family: <?php echo $settings->header_font[family]; ?>;
    font-weight: <?php echo $settings->header_font[weight]; ?>
<?php } ?>
}


#mc-embedded-subscribe {
    padding: 5px 10px;
    background: #<?php echo $settings->mc_button_color; ?>;
    color: #<?php echo $settings->mc_button_font_color; ?>;
    border: 1px solid #<?php echo $settings->mc_button_hover_color; ?>;
    text-decoration: none;
    margin: 0;
}
#mc-embedded-subscribe:hover {
    background: #<?php echo $settings->mc_button_hover_color; ?>;
    color: #<?php echo $settings->mc_button_hover_font_color; ?>;
    border: 1px solid #<?php echo $settings->mc_button_color; ?>;
}

<?php

$color = $settings->mc_overlay_color;
$opacity = $settings->mc_overlay_opacity;
$rgba = hex2rgba($color, $opacity);

?>
.sb-overlay {
    background: <?php echo $rgba; ?>;
}

.subs-popup {
	display: none;
	background-color: rgba(0,0,0,0.85);
	position: absolute;
	height: 100%;
	width: 100%;
}
#mc_embed_signup {
	background: url('background.jpg');
	clear:left;
	font:14px Helvetica,Arial,sans-serif; 
	width:500px;
	margin: 200px auto;
	box-shadow: 0px 0px 30px 5px rgb(0,0,0);
	position: relative;
}
#mc-field-group {
    margin-top: -10px;
}
.email-close {
	height: 16px;
	width: 16px;
	position: absolute;
	top: -8px;
	right: -8px;
	background: #FFF;
	border-radius: 50%;
	text-align: center;
	font-weight: bold;
	border: 3px solid #aaa;
	box-shadow: 0px 0px 4px 1px rgb(0,0,0);
	cursor: pointer;
	z-index: 999;
}
.email-close:active {
	top: -7px;
	right: -9px;
}
.sw-mc-img {
	border-radius: 50%;
	border: 4px solid #FFF;
	box-shadow: 0px 0px 4px 1px rgba(0,0,0,0.8);
	float: right;
	margin: 0px 15px;
	height: 100px;
}
.content {
	width: 500px;
	margin: auto;
	padding-top: 50px;
	font-family: Calibri, Arial, sans-serif;
	color: #FFF;
}

.sb-heading, .sb-subtitle, .sb form input[type='text'], .sb form input[type='password'], .sb form input[type='email'], .sb form textarea {
width: 70%;
}

<?php

function hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}

?>