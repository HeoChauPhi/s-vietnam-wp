<div class="sw-toolbar-cta fixed">
    
    <p class="cta-title"><?php echo $settings->title; ?></p>
    
    <?php if ($settings->link_type == 'url') { ?>
        <a class="cta-button" href="<?php echo $settings->btn_url_link; ?>"><?php echo $settings->button_text; ?></a>
    <?php }

    if ($settings->link_type == 'file') { ?>
        <a class="cta-button" href="<?php echo $settings->btn_file_link; ?>"><?php echo $settings->button_text; ?></a>
    <?php }

    if ($settings->link_type == 'tel') { ?>
        <a class="cta-button" href="tel:<?php echo $settings->btn_tel_link; ?>"><?php echo $settings->button_text; ?></a>
    <?php } ?>
</div>