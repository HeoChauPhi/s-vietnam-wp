<div class="next-page-<?php echo $id; ?>">
    
    <?php if ($settings->prev_btn == 'yes' ) { ?>
        <?php previous_link(); ?>
    <?php } 
    
    if ($settings->parent_btn == 'yes' ) { ?>
        <?php parent_link(); ?>
    <?php } 
    
    if ($settings->next_btn == 'yes' ) { ?>
        <?php next_link(); ?>
     <?php }
    
    ?>
    
</div>