<?php

$countwidth = $settings->sw_counter_width;
$countfont = $settings->font;
$countfontsize = $settings->font_size;
$countcustfontsize = $settings->custom_font_size;
$countletter = $settings->sw_counter_letter_spacing;
$countbg = $settings->sw_counter_bg_color;
$countcolor = $settings->sw_counter_font_color;
$countradius = $settings->sw_counter_radius;


if ( $countfontsize == 'custom' ) {
    $clockfontsize = $countcustfontsize;
} else {
    $clockfontsize = '40';
}

if ( $countfont[family] == 'Default') {
    $clockfamily = 'Open Sans Condensed';
} else {
    $clockfamily = $countfont[family];
}

if ( $countbg == '' ) {
    $countbg = '444444';
}

if ( $countcolor == '' ) {
    $countcolor = 'ffffff';
}

?>

.sw-counter-note {
    text-align: center;
}

.countdownHolder{
	width:100%;
	margin:0 auto;
	font: <?php echo $clockfontsize; ?>px/1.5 <?php echo $clockfamily; ?>,sans-serif;
	text-align:center;
	letter-spacing:<?php echo $countletter; ?>px;
}

.position{
	display: inline-block;
	height: 1.6em;
	overflow: hidden;
	position: relative;
	width: 1.05em;
}

.digit, .digit.static{
	position:absolute;
	display:block;
	width:1em;
	background-color:#<?php echo $countbg; ?>;
    background-image: none !important;
	border-radius:<?php echo $countradius; ?>px;
	text-align:center;
	color:#<?php echo $countcolor; ?>;
	letter-spacing:<?php echo $countletter; ?>px;
    box-shadow:1px 1px 1px rgba(4, 4, 4, 0);
}

.alert {
    font-weight: 900;
    font-size: 200%;
}

<!--
.digit.static{
	box-shadow:1px 1px 1px rgba(4, 4, 4, 0);
	
	background-image: linear-gradient(bottom, #3A3A3A 50%, #444444 50%);
	background-image: -o-linear-gradient(bottom, #3A3A3A 50%, #444444 50%);
	background-image: -moz-linear-gradient(bottom, #3A3A3A 50%, #444444 50%);
	background-image: -webkit-linear-gradient(bottom, #3A3A3A 50%, #444444 50%);
	background-image: -ms-linear-gradient(bottom, #3A3A3A 50%, #444444 50%);
	
	background-image: -webkit-gradient(
		linear,
		left bottom,
		left top,
		color-stop(0.5, #3A3A3A),
		color-stop(0.5, #444444)
	);
}
-->

/**
 * You can use these classes to hide parts
 * of the countdown that you don't need.
 */

<?php 

if ( $settings->sw_counter_days == 'no' ) { ?>
.countDays{ display:none !important; }
.countDiv0{ display:none !important; }
<?php } 

if ( $settings->sw_counter_hrs == 'no' ) { ?>
.countHours{ display:none !important; }
.countDiv1{ display:none !important; }
<?php } 

if ( $settings->sw_counter_mins == 'no' ) { ?>
.countMinutes{ display:none !important; }
.countDiv2{ display:none !important; }
<?php } 

if ( $settings->sw_counter_secs == 'no' ) { ?>
.countSeconds{ display:none !important; }
<?php }

if ( $settings->sw_counter_text == 'no' ) { ?>
.counter-text{ display:none !important; }
<?php } ?>

<?php if ( $settings->sw_counter_hrs == 'no' && $settings->sw_counter_mins == 'no'  && $settings->sw_counter_secs == 'no' ) { ?>
    span.countDiv.countDiv0{ display:none; }
<?php } ?>

<?php if ( $settings->sw_counter_mins == 'no' && $settings->sw_counter_secs == 'no' ) { ?>
    span.countDiv.countDiv1{ display:none; }
<?php } ?>


<?php if ( $settings->sw_counter_secs == 'no' ) { ?>
    span.countDiv.countDiv2{ display:none; }
<?php } ?>

<?php if ($settings->sw_counter_divider_color != '') { ?>
    span.countDiv.countDiv0:before,
    span.countDiv.countDiv0:after,
    span.countDiv.countDiv1:before,
    span.countDiv.countDiv1:after,
    span.countDiv.countDiv2:before,
    span.countDiv.countDiv2:after {
        background-color: #<?php echo $settings->sw_counter_divider_color; ?>;
    }
<?php } ?>

.countDiv{
	display:inline-block;
	width:16px;
	height:1.6em;
	position:relative;
}

.countDiv:before,
.countDiv:after{
	position:absolute;
	width:5px;
	height:5px;
	background-color:#<?php echo $countbg; ?>;
	border-radius:50%;
	left:50%;
	margin-left:-3px;
	top:0.5em;
	box-shadow:1px 1px 1px rgba(4, 4, 4, 0);
	content:'';
}

.countDiv:after{
	top:0.9em;
}

<?php $alertFont = $settings->alertFont; ?>
.alert {
    font-weight: <?php echo $alertFont[weight]; ?>;
    color: #<?php echo $settings->alertFont_color; ?>;
    letter-spacing: <?php echo $settings->alertLetter_spacing; ?>px;

    <?php if ($alertFont[family] != 'Default') { ?>

        font-family: <?php echo $alertFont[family]; ?>;

    <?php } ?>
    <?php if ($settings->alertFont_size != 'Default') { ?>

        font-size: <?php echo $settings->alertCustom_font_size; ?>px;

    <?php } ?>
}

<?php $counterFont = $settings->counterFont; ?>
.counter-text {
    font-weight: <?php echo $counterFont[weight]; ?>;
    color: #<?php echo $settings->counterFont_color; ?>;
    letter-spacing: <?php echo $settings->counterLetter_spacing; ?>px;

    <?php if ($counterFont[family] != 'Default') { ?>

        font-family: <?php echo $counterFont[family]; ?>;

    <?php } ?>
    <?php if ($settings->counterFont_size != 'Default') { ?>

        font-size: <?php echo $settings->counterCustom_font_size; ?>px;

    <?php } ?>
}