.fl-node-<?php echo $id; ?> .woocommerce .products .star-rating span:before, .fl-node-<?php echo $id; ?> .woocommerce .star-rating span:before, .fl-node-<?php echo $id; ?> .woocommerce-page .products .star-rating span:before, .fl-node-<?php echo $id; ?> .woocommerce-page .star-rating span:before {
    color: #<?php echo $settings->stars; ?> !important;
}

.fl-node-<?php echo $id; ?> .woocommerce ul.products li.product .star-rating {
    font-size: <?php echo $settings->star_size; ?>px !important;
}

.fl-node-<?php echo $id; ?> .woocommerce ul.products li.product h3 {
    color: #<?php echo $settings->title; ?>!important;
    font-size: <?php echo $settings->title_size; ?>px !important;
    font-family: <?php echo $settings->title_font[family]; ?> !important;
    font-weight: <?php echo $settings->title_font[weight]; ?> !important;
}

.fl-node-<?php echo $id; ?> .woocommerce ul.products li.product .price, .fl-node-<?php echo $id; ?> .woocommerce .woocommerce-breadcrumb, .fl-node-<?php echo $id; ?> .woocommerce div.product span.price, .fl-node-<?php echo $id; ?> .woocommerce div.product p.price, .fl-node-<?php echo $id; ?> .woocommerce div.product .stock, .fl-node-<?php echo $id; ?> .woocommerce-page ul.products li.product .price, .fl-node-<?php echo $id; ?> .woocommerce-page .woocommerce-breadcrumb, .fl-node-<?php echo $id; ?> .woocommerce-page div.product span.price, .fl-node-<?php echo $id; ?> .woocommerce-page div.product p.price, .fl-node-<?php echo $id; ?> .woocommerce-page div.product .stock {
    color: #<?php echo $settings->price_color; ?> !important;
    font-size: <?php echo $settings->price_size; ?>px !important;
    font-family: <?php echo $settings->price_font[family]; ?> !important;
    font-weight: <?php echo $settings->price_font[weight]; ?> !important;
}

.fl-node-<?php echo $id; ?> .woocommerce ul.products li.product .onsale, .fl-node-<?php echo $id; ?> .woocommerce span.onsale, .fl-node-<?php echo $id; ?> .woocommerce-page ul.products li.product .onsale, .fl-node-<?php echo $id; ?> .woocommerce-page span.onsale {
    color: #<?php echo $settings->sale_font_color; ?>!important;
    background: #<?php echo $settings->sale_bg_color; ?> !important;
    font-size: <?php echo $settings->sale_size; ?>px !important;
    font-family: <?php echo $settings->sale_font[family]; ?> !important;
    font-weight: <?php echo $settings->sale_font[weight]; ?> !important;
}