<div class="header-text">
    
    <?php if ($settings->nonanimated == 'no') { ?>
        <a href="<?php echo $settings->url; ?>" class="<?php echo $id; ?>_head_title"></a>
    <?php } else { ?>
        <span class="no-animate"><?php echo $settings->plaintext; ?></span><a href="<?php echo $settings->url; ?>" class="<?php echo $id; ?>_head_title"></a>
    <?php } ?>
    
</div>