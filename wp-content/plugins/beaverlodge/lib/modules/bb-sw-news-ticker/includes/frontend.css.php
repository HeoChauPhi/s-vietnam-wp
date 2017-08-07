.article {
    display: flex;
    flex-wrap: no-wrap;
    align-items: center;
}

<?php $width = $settings->image_size + 20; ?>
.post-thumbnail {
    width: <?php echo $width; ?>px;
}

.post-thumbnail img {
    width: <?php echo $settings->image_size; ?>px;
    height: auto;
}

.content {
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    margin-left: <?php echo $settings->post_column_gutter; ?>px;
}

.ticker-list {
    list-style: none;
    width: 100%;
    font-size: <?php echo $settings->excerpt_size; ?>px;
    color: #<?php echo $settings->excerpt_color; ?>;
}

.ticker-list li {
    padding: <?php echo $settings->post_padding_top; ?>px <?php echo $settings->post_padding_sides; ?>px;
    border-bottom: <?php echo $settings->bottom_border_size; ?>px <?php echo $settings->bottom_border_select; ?> #<?php echo $settings->bottom_border_color; ?>;
}

.ticker-list a {
    font-size: <?php echo $settings->title_size; ?>px;
    line-height: <?php echo $settings->title_line; ?>%;
    color: #<?php echo $settings->title_color; ?>;
}