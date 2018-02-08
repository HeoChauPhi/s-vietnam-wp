.container {
    width:  100%; /* width of the entire container for the wall */
    margin-bottom: 10px;
}
 
.brick {
    padding: <?php echo $settings->top_padding; ?>px <?php echo $settings->side_padding; ?>px;
    margin-bottom: <?php echo $settings->top_padding; ?>px;
    background-color: #<?php echo $settings->item_bg_color; ?>;
    -webkit-box-shadow: <?php echo $settings->hor_shadow; ?>px <?php echo $settings->ver_shadow; ?>px <?php echo $settings->shadow_spread; ?>px 0px #<?php echo $settings->item_shadow; ?>;
    -moz-box-shadow: <?php echo $settings->hor_shadow; ?>px <?php echo $settings->ver_shadow; ?>px <?php echo $settings->shadow_spread; ?>px 0px #<?php echo $settings->item_shadow; ?>;
    box-shadow: <?php echo $settings->hor_shadow; ?>px <?php echo $settings->ver_shadow; ?>px <?php echo $settings->shadow_spread; ?>px 0px #<?php echo $settings->item_shadow; ?>;
}
 
.brick_header{
    border-bottom: solid 1px #<?php echo $settings->title_border_color; ?>;
    padding-bottom: 10px;
    padding-top: 10px;
}

.brick_header a{
    color: #<?php echo $settings->title_color; ?>;
}
.brick_header a:hover{
    color: #<?php echo $settings->title_color_hover; ?>;
}

h<?php echo $settings->title_class; ?> {
    text-align: <?php echo $settings->title_align; ?>;
}

.brick_featured_image{
    width: 100%;
    margin-top: 10px;
    margin-bottom: 10px;
}

.brick_featured_image img{
    width: 100%;
    height: auto;
}

.brick p {
    text-align: <?php echo $settings->excerpt_align; ?>;
    color: #<?php echo $settings->excerpt_color; ?>;
}

.more-btn {
    text-align: <?php echo $settings->more_align; ?>;
}

.brick a.read_more_link {
    color: #<?php echo $settings->more_color; ?>;
    background-color: #<?php echo $settings->more_bg_color; ?>;
    background-color: #<?php echo $settings->more_bg_color; ?>;
    padding: <?php echo $settings->more_padding_top; ?>px <?php echo $settings->more_padding_side; ?>px;
    margin: <?php echo $settings->more_margin_top; ?>px <?php echo $settings->more_margin_side; ?>px;
}