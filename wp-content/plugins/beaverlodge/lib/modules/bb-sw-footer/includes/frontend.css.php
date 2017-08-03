.toTop {
    float: right;
}

a.scrollup:hover, a.scrollup:active {
    text-decoration: none;
}

p.copyright {
    font-family: <?php echo $settings->copyrightFont[family]; ?>;
    font-weight: <?php echo $settings->copyrightFont[weight]; ?>;
    font-size: <?php echo $settings->copyrightSize; ?>px;
    color: #<?php echo $settings->copyrightColor; ?>;
}

p.copyright a {
    font-family: <?php echo $settings->copyrightFont[family]; ?>;
    font-weight: <?php echo $settings->copyrightFont[weight]; ?>;
    font-size: <?php echo $settings->copyrightSize; ?>px;
    color: #<?php echo $settings->copyrightLink; ?>;
}

p.copyright a:hover {
    font-family: <?php echo $settings->copyrightFont[family]; ?>;
    font-weight: <?php echo $settings->copyrightFont[weight]; ?>;
    font-size: <?php echo $settings->copyrightSize; ?>px;
    color: #<?php echo $settings->copyrightHover; ?>;
}

a.scrollup,
a.scrollup i {
    color: #<?php echo $settings->scrollColor; ?>;
    font-size: <?php echo $settings->scrollSize; ?>px;
}