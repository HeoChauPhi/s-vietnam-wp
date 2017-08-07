<div class="sw-callout">

    <?php if ($settings->image_select != 'none' ) { ?>
    
        <div class="sw-callout-hero">
            
            <?php if ($settings->image_select == 'image' ) { ?>
            
                <img class="sw-callout-img" src="<?php echo $settings->image_src; ?>" />
            
            <?php } elseif ($settings->image_select == 'icon' ) { ?>
            
                <i class="sw-callout-icon <?php echo $settings->icon; ?>"></i>
            
            <?php } ?>

        </div>
    
    <?php } ?>  
    
    <div class="sw-callout-content">
        
        <h<?php echo $settings->heading_class; ?> class="sw-callout-heading"><?php echo $settings->heading; ?></h<?php echo $settings->heading_class; ?>>
        <?php echo $settings->excerpt; ?>
        
    </div>
    
    <div class="sw-callout-buttons">
    
        <a class="sw-callout-btn-one" href="<?php echo $settings->button_one_url; ?>" role="button"><?php echo $settings->button_one_text; ?></a>
        <a class="sw-callout-btn-two" href="<?php echo $settings->button_two_url; ?>" role="button"><?php echo $settings->button_two_text; ?></a>
    
    </div>
    
</div>