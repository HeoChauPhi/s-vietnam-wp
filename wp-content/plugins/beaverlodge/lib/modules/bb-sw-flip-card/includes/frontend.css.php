.flip-<?php echo $id; ?> {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    flex-flow: row wrap;
    justify-content: <?php echo $settings->align; ?>;
}
.panel-content {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
}
.card {
    width: <?php echo $settings->width; ?>px;
    height: <?php echo $settings->height; ?>px;
    margin: <?php echo $settings->margin; ?>px <?php echo $settings->gutter; ?>px;
}
.front, .back {
    padding: <?php echo $settings->padding; ?>px;
}
.panel-content <?php echo $settings->title_font; ?> {
    color: #<?php echo $settings->title_font_color; ?> !important;
}
.front .panel-content {
    color: #<?php echo $settings->front_font_color; ?>;
}
.front .panel-content p {
    color: #<?php echo $settings->front_font_color; ?>;
}
.back .panel-content {
    color: #<?php echo $settings->back_font_color; ?>;
}
.back .panel-content p {
    color: #<?php echo $settings->back_font_color; ?>;
    max-width: 100%;
}
a.flip-btn {
    color: #<?php echo $settings->btn_font_color; ?> !important;
    background-color: #<?php echo $settings->btn_bg_color; ?>;
    padding: <?php echo $settings->btn_top_padding; ?>px <?php echo $settings->btn_side_padding; ?>px;
    width: <?php echo $settings->btn_width; ?>px;
    text-decoration: none;
    -webkit-transition: all <?php echo $settings->transition; ?>ms ease-out;
    -moz-transition: all <?php echo $settings->transition; ?>ms ease-out;
    -o-transition: all <?php echo $settings->transition; ?>ms ease-out;
    transition: all <?php echo $settings->transition; ?>ms ease-out;
}
a.flip-btn:hover {
    color: #<?php echo $settings->btn_font_hover_color; ?> !important;
    background-color: #<?php echo $settings->btn_bg_hover_color; ?>;
    text-decoration: none;
}

.back .panel-content *, 
.front .panel-content * { 
    max-width: 100%; 
}