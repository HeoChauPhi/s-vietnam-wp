.list-<?php echo $id; ?> li,
.list-<?php echo $id; ?> li a {
    color: #<?php echo $settings->text_color; ?>;
    <?php if ($settings->text_size == 'custom') { ?>
    font-size: <?php echo $settings->text_font_size; ?>px;
    <?php } ?>    
}

.list-<?php echo $id; ?> li a {
    <?php if ($settings->text_underline == 'always') { ?>
    text-decoration: underline;
    <?php } else { ?>    
    text-decoration: none;
    <?php } ?>
}

.list-<?php echo $id; ?> li a:hover {
    color: #<?php echo $settings->text_hover_color; ?>;
    <?php if ($settings->text_underline == 'hover' || $settings->text_underline == 'always') { ?>
    text-decoration: underline;
    <?php } else { ?>
    text-decoration: none;
    <?php } ?>
}

.list-<?php echo $id; ?> i.fa-li {
    color: #<?php echo $settings->icon_color; ?>;
}