.sw-hover-<?php echo $id; ?> .grid{
    display: flex;
    justify-content: <?php echo $settings->panel_align; ?>;
    flex-wrap: wrap;
}

.grid figure {
	position: relative;
	display: inline-block;
	overflow: hidden;
	margin: <?php echo $settings->panel_margin; ?>px <?php echo $settings->panel_gutter; ?>px;
	width: <?php echo $settings->panel_width; ?>px;
	height: <?php echo $settings->panel_height; ?>px;
    text-align: center;
}


.grid figure img {
	position: relative;
	display: block;
	object-fit: <?php echo $settings->image_crop; ?>;
    object-position: <?php echo $settings->image_align; ?>;
	opacity: 0.8;
}

.effect-title {
    color: #<?php echo $settings->title_font_color; ?>;
    font-size: <?php echo $settings->title_font_size; ?>px;
    font-family: <?php echo $settings->title_font[family]; ?>;
    font-weight: <?php echo $settings->title_font[weight]; ?>;
    text-transform: <?php echo $settings->title_style; ?>;
    letter-spacing: <?php echo $settings->title_spacing; ?>;
}

.grid figure p {
	font-size: <?php echo $settings->excerpt_font_size; ?>px;
    font-family: <?php echo $settings->excerpt_font[family]; ?>;
    font-weight: <?php echo $settings->excerpt_font[weight]; ?>;
	color: #<?php echo $settings->excerpt_font_color; ?>;
    text-transform: <?php echo $settings->excerpt_style; ?>;
    letter-spacing: <?php echo $settings->excerpt_spacing; ?>;
}

.grid figure figcaption {
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
}

.grid figure figcaption::before,
.grid figure figcaption::after {
	pointer-events: none;
}

.grid figure figcaption,
.grid figure figcaption > a {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}

.grid figure figcaption > a {
	z-index: 1000;
	text-indent: 200%;
	white-space: nowrap;
	font-size: 0;
	opacity: 0;
}