.sw-toolbar-cta {
    padding: 0;
    margin: 0;
    list-style: none;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    justify-content: space-around;
    font-size: <?php echo $settings->font_size; ?>px;
    font-family: <?php echo $settings->font[family]; ?>;
    font-weight: <?php echo $settings->font[weight]; ?>;
    color: #<?php echo $settings->title_color; ?>;
    background-color: #<?php echo $settings->bg_color; ?>;
    width: 100%;
    align-items: center;
}

.cta-title,
.cta-button {
    padding: 0;
    margin: 0;
}

a.cta-button {
    border: 1px solid #<?php echo $settings->btn_border_color; ?>;
    color: #<?php echo $settings->btn_color; ?>;
    background-color: #<?php echo $settings->btn_bg_color; ?>;
    text-decoration: none;
    padding: 10px 20px;
    margin: 10px 0;
}

a.cta-button:hover {
    border: 1px solid #<?php echo $settings->btn_hover_border_color; ?>;
    color: #<?php echo $settings->btn_hover_color; ?>;
    background-color: #<?php echo $settings->btn_hover_bg_color; ?>;
    text-decoration: none;
    padding: 10px 20px;
    margin: 10px 0;
}