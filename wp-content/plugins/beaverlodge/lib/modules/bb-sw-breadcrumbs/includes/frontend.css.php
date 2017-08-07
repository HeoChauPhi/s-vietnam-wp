.breadcrumbs {
    list-style: none;
    display: flex;
    justify-content: <?php echo $settings->crumb_align; ?>;
    padding-left: none;
}

.breadcrumbs li,
.breadcrumbs li a {
    color: #<?php echo $settings->crumb_color; ?> !important;
<?php if ($settings->crumb_size == 'custom') { ?>
    font-size: <?php echo $settings->crumb_font_size; ?>px;
<?php } ?>
    list-style-type: none !important;
    margin:0 !important;
}

.breadcrumbs li a {
    color: #<?php echo $settings->crumb_color; ?>;
<?php if ($settings->crumb_size == 'custom') { ?>
    font-size: <?php echo $settings->crumb_font_size; ?>px;
<?php } ?>
<?php if ($settings->crumb_underline == 'always') { ?>
    text-decoration: underline;
<?php } else { ?>
    text-decoration: none;
<?php } ?>
}

.breadcrumbs li a:hover {
    color: #<?php echo $settings->crumb_hover_color; ?> !important;
<?php if ($settings->crumb_underline == 'hover' || $settings->crumb_underline == 'always') { ?>
    text-decoration: underline;
<?php } else { ?>
    text-decoration: none;
<?php } ?>
}

.breadcrumbs li:nth-last-child(1) {
    color: #<?php echo $settings->active_crumb_color; ?> !important;
}

.breadcrumbs li:after {
    content: '<?php echo $settings->crumb_divider; ?>';
    color: #<?php echo $settings->divider_color; ?>;
    padding: 0 5px;
}

.breadcrumbs li:nth-last-child(1):after {
    content: '';
    padding: 0 5px;
}