<?php $inputFont = $settings->input_font; ?>
.fl-node-<?php echo $id; ?> .sw-form-input {
    color: #<?php echo $settings->input_color; ?> !important;
    background-color: #<?php echo $settings->input_bg; ?> !important;
    border-color: #<?php echo $settings->input_border; ?> !important;
    border-radius: <?php echo $settings->input_radius; ?>px !important;
    font-weight: <?php echo $titleFont[weight]; ?> !important;
    font-family: <?php echo $titleFont[family]; ?> !important;
}

<?php $titleFont = $settings->title_font; ?>
.fl-node-<?php echo $id; ?> .sw-form-title {
    color: #<?php echo $settings->title_color; ?>;
    font-size: <?php echo $settings->title_size; ?>px;
    text-transform: <?php echo $settings->title_transform; ?>;
    font-weight: <?php echo $inputFont[weight]; ?>;
    font-family: <?php echo $inputFont[family]; ?>;
    letter-spacing: <?php echo $settings->title_spacing; ?>px;
}

<?php $buttonFont = $settings->button_font; ?>
.fl-node-<?php echo $id; ?> .wpcf7-submit {
    font-weight: <?php echo $buttonFont[weight]; ?> !important;
    font-family: <?php echo $buttonFont[family]; ?> !important;
    font-size: <?php echo $settings->button_font_size; ?>px !important;
    color: #<?php echo $settings->button_color; ?> !important;
    background-color: #<?php echo $settings->button_bg; ?> !important;
    border-color: #<?php echo $settings->button_border; ?> !important;
    border-radius: <?php echo $settings->button_radius; ?>px !important;
    padding: <?php echo $settings->button_top_padding; ?>px <?php echo $settings->button_side_padding; ?>px !important;
<?php if ($settings->button_fullwidth == 'yes') { ?>
    width: 100%;
<?php } ?>
}

.fl-node-<?php echo $id; ?> .wpcf7-form {
    background: #<?php echo $settings->form_bg; ?>;
    padding: <?php echo $settings->form_top_padding; ?>px <?php echo $settings->form_side_padding; ?>px;
    border-color: #<?php echo $settings->form_border; ?>;
    border-size: <?php echo $settings->form_size; ?>px;
    border-radius: <?php echo $settings->form_radius; ?>px;
}

.fl-node-<?php echo $id; ?> input[type=text], .fl-node-<?php echo $id; ?> input[type=password], .fl-node-<?php echo $id; ?> input[type=email], .fl-node-<?php echo $id; ?> input[type=tel], .fl-node-<?php echo $id; ?> input[type=date], .fl-node-<?php echo $id; ?> input[type=month], .fl-node-<?php echo $id; ?> input[type=week], .fl-node-<?php echo $id; ?> input[type=time], .fl-node-<?php echo $id; ?> input[type=number], .fl-node-<?php echo $id; ?> input[type=search] {
    height: <?php echo $settings->input_text_height; ?>px !important;
    width: <?php echo $settings->input_width; ?>% !important;
}

.fl-node-<?php echo $id; ?> textarea.wpcf7-form-control.wpcf7-textarea.sw-form-input {
    height: <?php echo $settings->input_msg_height; ?>px !important;
    width: <?php echo $settings->input_width; ?>% !important;
}