<?php 

$font= $settings->font_family; 

$tabopacity = ($settings->overlay_opacity / 100);

$tabcolor = '#' . $settings->tab_color;
$tabrgb = sw_tab_opacity($tabcolor);
$tabrgba = sw_tab_opacity($tabcolor, $tabopacity);

$activecolor = '#' . $settings->active_tab_color;
$activergb = sw_tab_opacity($activecolor);
$activergba = sw_tab_opacity($activecolor, $tabopacity);

?>

.fl-node-<?php echo $id; ?> .turbotabs {
	margin: 0;
	padding: 0;
	float: left;
	list-style: none;
	width: 100%;
}

.fl-node-<?php echo $id; ?> .turbotabs .tab-menu {
	float: left;
	margin: 0;
	cursor: pointer;
	padding: 0px 21px;	
	line-height: <?php echo $settings->tab_height; ?>px;
	border-top: 1px solid #<?php echo $settings->tab_border; ?>;
	border-left: 1px solid #<?php echo $settings->tab_border; ?>;
	background: #<?php echo $settings->tab_color; ?>;
	color: #<?php echo $settings->tab_font_color; ?>;
    font-family: <?php echo $font[family]; ?>;
    font-family: <?php echo $font[weight]; ?>;
    font-size: <?php echo $settings->font_size; ?>px;
	overflow: hidden;
	position: relative;
}

.fl-node-<?php echo $id; ?> .icon-left { 
    margin-right: 6px; 
}

.fl-node-<?php echo $id; ?> .icon-right { 
    margin-left: 6px; 
}

.fl-node-<?php echo $id; ?> .tab_last:hover { 
    border-right: 1px solid #<?php echo $settings->active_tab_border; ?>; 
}

.fl-node-<?php echo $id; ?> .tab_last { 
    border-right: 1px solid #<?php echo $settings->tab_border; ?>; 
}

.fl-node-<?php echo $id; ?> .turbotabs .tab-menu:hover {
	background: #<?php echo $settings->active_tab_color; ?>;
	color: #<?php echo $settings->active_tab_font_color; ?>;
    border-top: 1px solid #<?php echo $settings->active_tab_border; ?>;
	border-left: 1px solid #<?php echo $settings->active_tab_border; ?>;
<?php if ($settings->overlay == 'yes') { ?>
    box-shadow: inset 0 0 0 1000px <?php echo $tabrgba; ?>;
<?php } ?>
}

.fl-node-<?php echo $id; ?> .turbotabs .tab-menu.active {
	background: #<?php echo $settings->active_tab_color; ?>;
	color: #<?php echo $settings->active_tab_font_color; ?>;
	display: block;
    border-top: 1px solid #<?php echo $settings->active_tab_border; ?>;
	border-left: 1px solid #<?php echo $settings->active_tab_border; ?>;
<?php if ($settings->active_overlay == 'yes') { ?>
    box-shadow: inset 0 0 0 1000px <?php echo $activergba; ?>;
<?php } ?>
}

.fl-node-<?php echo $id; ?> .tab_container {
	border: 1px solid #<?php echo $settings->border_color; ?>;
	clear: both;
	float: left;
	width: 100%;
	background: #<?php echo $settings->background_color; ?>;
	overflow: auto;
    color: #<?php echo $settings->font_color; ?>;
    text-align: <?php echo $settings->font_align; ?>;
}

.fl-node-<?php echo $id; ?> .tab_content {
	padding: 20px;
	display: none;
}


.fl-node-<?php echo $id; ?> .tab_drawer_heading { display: none; }

@media screen and (max-width: <?php echo $settings->breakpoint; ?>px) {
	.fl-node-<?php echo $id; ?> .tabs {
		display: none;
	}
	.fl-node-<?php echo $id; ?> .tab_drawer_heading {
		background-color: #<?php echo $settings->tab_color; ?>;
		color: #<?php echo $settings->tab_font_color; ?>;
		border-top: 1px solid #<?php echo $settings->tab_border; ?>;
		margin: 0;
		padding: 5px 20px;
		display: block;
		cursor: pointer;
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}
	.fl-node-<?php echo $id; ?> .d_active {
		background-color: #<?php echo $settings->active_tab_color; ?>;
		color: #<?php echo $settings->active_tab_font_color; ?>;
        border-top: 1px solid #<?php echo $settings->active_tab_border; ?>;
	}
}