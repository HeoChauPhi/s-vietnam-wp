<?php if ($settings->image_align == 'middle') { ?>
    img.button-image {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
<?php } ?>

.modal {
  text-align: center;
}

@media screen and (min-width: 768px) { 
  .modal:before {
    display: inline-block;
    vertical-align: middle;
    content: " ";
    height: 100%;
  }
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}

<?php if ( 'false' == $settings->modal_title_text ) { ?>
h4.modal-title {
    display: none;
}

.modal-header {
    border-bottom: 0px solid rgba(0,0,0,0);
}
<?php } ?>

<?php if ( 'false' == $settings->close_btn ) { ?>
.modal-footer button {
    display: none;
    border-top: 0px solid rgba(0,0,0,0);
}
<?php } ?>

<?php if ( 'custom' == $settings->modal_size ) { ?>
.modal-content {
    height: <?php echo $settings->modal_height; ?>px;
    width: <?php echo $settings->modal_width; ?>px;
}
<?php } ?>
	
<?php
	
// Background Color
if ( ! empty( $settings->bg_color ) && empty( $settings->bg_hover_color ) ) {
	$settings->bg_hover_color = $settings->bg_color;
}

// Old Background Gradient Setting
if ( isset( $settings->three_d ) && $settings->three_d ) {
	$settings->style = 'gradient';
}

// Background Gradient
if ( ! empty( $settings->bg_color ) ) {
	$bg_grad_start = FLBuilderColor::adjust_brightness( $settings->bg_color, 30, 'lighten' );
}
if ( ! empty( $settings->bg_hover_color ) ) {
	$bg_hover_grad_start = FLBuilderColor::adjust_brightness( $settings->bg_hover_color, 30, 'lighten' );
}

// Border Size
if ( 'transparent' == $settings->style ) {
	$border_size = $settings->border_size;
}
else {
	$border_size = 1;
}

// Border Color
if ( ! empty( $settings->bg_color ) ) {
	$border_color = FLBuilderColor::adjust_brightness( $settings->bg_color, 12, 'darken' );
}
if ( ! empty( $settings->bg_hover_color ) ) {
	$border_hover_color = FLBuilderColor::adjust_brightness( $settings->bg_hover_color, 12, 'darken' );
}

?>
.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button,
.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button:visited {

	font-size: <?php echo $settings->font_size; ?>px;
	line-height: <?php echo $settings->font_size + 2; ?>px;
	padding: <?php echo $settings->padding . 'px ' . ($settings->padding * 2) . 'px'; ?>;
	border-radius: <?php echo $settings->border_radius; ?>px;
	-moz-border-radius: <?php echo $settings->border_radius; ?>px;
	-webkit-border-radius: <?php echo $settings->border_radius; ?>px;
	
	<?php if ( 'custom' == $settings->width ) : ?>
	width: <?php echo $settings->custom_width; ?>px;
	<?php endif; ?>

	<?php if ( ! empty( $settings->bg_color ) ) : ?>
	background: #<?php echo $settings->bg_color; ?>;
	border: <?php echo $border_size; ?>px solid #<?php echo $border_color; ?>;
	
		<?php if ( 'transparent' == $settings->style ) : // Transparent ?>
		background-color: rgba(<?php echo implode( ',', FLBuilderColor::hex_to_rgb( $settings->bg_color ) ) ?>, <?php echo $settings->bg_opacity/100; ?>);
		<?php endif; ?>

		<?php if( 'gradient' == $settings->style ) : // Gradient ?>
		background: -moz-linear-gradient(top,  #<?php echo $bg_grad_start; ?> 0%, #<?php echo $settings->bg_color; ?> 100%); /* FF3.6+ */
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#<?php echo $bg_grad_start; ?>), color-stop(100%,#<?php echo $settings->bg_color; ?>)); /* Chrome,Safari4+ */
		background: -webkit-linear-gradient(top,  #<?php echo $bg_grad_start; ?> 0%,#<?php echo $settings->bg_color; ?> 100%); /* Chrome10+,Safari5.1+ */
		background: -o-linear-gradient(top,  #<?php echo $bg_grad_start; ?> 0%,#<?php echo $settings->bg_color; ?> 100%); /* Opera 11.10+ */
		background: -ms-linear-gradient(top,  #<?php echo $bg_grad_start; ?> 0%,#<?php echo $settings->bg_color; ?> 100%); /* IE10+ */
		background: linear-gradient(to bottom,  #<?php echo $bg_grad_start; ?> 0%,#<?php echo $settings->bg_color; ?> 100%); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#<?php echo $bg_grad_start; ?>', endColorstr='#<?php echo $settings->bg_color; ?>',GradientType=0 ); /* IE6-9 */
		<?php endif; ?>
	
	<?php endif; ?>
}

<?php if ( ! empty( $settings->text_color ) ) : ?>
.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button,
.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button:visited,
.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button *,
.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button:visited * {
	color: #<?php echo $settings->text_color; ?>;
}
<?php endif; ?>

<?php if ( ! empty( $settings->bg_hover_color ) ) : ?>
.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button:hover,
.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button:focus {

	background: #<?php echo $settings->bg_hover_color; ?>;
	border: <?php echo $border_size; ?>px solid #<?php echo $border_hover_color; ?>;
	
	<?php if ( 'transparent' == $settings->style ) : // Transparent ?>
	background-color: rgba(<?php echo implode( ',', FLBuilderColor::hex_to_rgb( $settings->bg_hover_color ) ) ?>, <?php echo $settings->bg_opacity/100; ?>);
	<?php endif; ?>

	<?php if ( 'gradient' == $settings->style ) : // Gradient ?>
	background: -moz-linear-gradient(top,  #<?php echo $bg_hover_grad_start; ?> 0%, #<?php echo $settings->bg_hover_color; ?> 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#<?php echo $bg_hover_grad_start; ?>), color-stop(100%,#<?php echo $settings->bg_hover_color; ?>)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #<?php echo $bg_hover_grad_start; ?> 0%,#<?php echo $settings->bg_hover_color; ?> 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #<?php echo $bg_hover_grad_start; ?> 0%,#<?php echo $settings->bg_hover_color; ?> 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #<?php echo $bg_hover_grad_start; ?> 0%,#<?php echo $settings->bg_hover_color; ?> 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #<?php echo $bg_hover_grad_start; ?> 0%,#<?php echo $settings->bg_hover_color; ?> 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#<?php echo $bg_hover_grad_start; ?>', endColorstr='#<?php echo $settings->bg_hover_color; ?>',GradientType=0 ); /* IE6-9 */
	<?php endif; ?>
}
<?php endif; ?>

<?php if ( ! empty( $settings->text_hover_color ) ) : ?>
.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button:hover,
.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button:focus,
.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button:hover *,
.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button:focus * {
	color: #<?php echo $settings->text_hover_color; ?>;
}
<?php endif; ?>

.modal-backdrop {
    background-color: #<?php echo $settings->overlay_bg_color; ?>;
}
.modal-content {
    background-color: #<?php echo $settings->modal_bg_color; ?>;
}
.modal-title, .close {
    color: #<?php echo $settings->modal_header_color; ?>;
}
.modal-body {
    color: #<?php echo $settings->modal_font_color; ?>;
}

<?php if ($settings->show_borders == 'false') { ?>
    
    .modal-footer {
        border-top: 0px solid rgba(0,0,0,0);
    }

    .modal-header {
        border-bottom: 0px solid rgba(0,0,0,0);
    }
    
<?php }