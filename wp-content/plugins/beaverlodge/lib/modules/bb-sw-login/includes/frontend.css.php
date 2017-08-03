.fl-node-<?php echo $id; ?> label {
    margin-bottom: <?php echo $settings->label_margin; ?>px !important;
    font-family: <?php echo $settings->label_font[family]; ?> !important;
    font-weight: <?php echo $settings->label_font[weight]; ?> !important;
    color: #<?php echo $settings->label_color; ?> !important;  
    line-height: 120% !important;
}

.fl-node-<?php echo $id; ?> input#pass, 
.fl-node-<?php echo $id; ?> input#user {
    height: <?php echo $settings->input_height; ?>px !important;
    padding: <?php echo $settings->input_top_padding; ?>px <?php echo $settings->input_side_padding; ?>px !important;
    font-size: <?php echo $settings->input_size; ?>px !important;
    color: #<?php echo $settings->input_color; ?> !important;
    background-color: #<?php echo $settings->input_bg_color; ?> !important;
    border: 1px solid #<?php echo $settings->input_border_color; ?> !important;
    -moz-border-radius: <?php echo $settings->input_border_radius; ?>px !important;
    -webkit-border-radius: <?php echo $settings->input_border_radius; ?>px !important;
    border-radius: <?php echo $settings->input_border_radius; ?>px !important;
}

.fl-node-<?php echo $id; ?> input#wp-submit {
    background: #<?php echo $settings->submit_bg_color; ?> !important;
    color: #<?php echo $settings->submit_color; ?> !important;
    font-family: <?php echo $settings->submit_font[family]; ?> !important;
    font-weight: <?php echo $settings->submit_font[weight]; ?> !important;
    font-size: <?php echo $settings->submit_size; ?>px !important;
    line-height: 120% !important;
    padding: <?php echo $settings->submit_top_padding; ?>px <?php echo $settings->submit_side_padding; ?>px !important;
    border: 1px solid #<?php echo $settings->submit_border_color; ?> !important;
    -moz-border-radius: <?php echo $settings->submit_border_radius; ?>px !important;
    -webkit-border-radius: <?php echo $settings->submit_border_radius; ?>px !important;
    border-radius: <?php echo $settings->submit_border_radius; ?>px !important;
}