<?php
$panels = $settings->panel;
//var_dump($panels);
?>
<div class="flip-<?php echo $id; ?>"> 
    
    <?php foreach ($panels as $panel) { ?>
    
    <div class="card">

        <?php if ($panel->bg_type == 'bg_image') { ?>
        
            <div class="front" style="background-image: url(<?php echo $panel->front_photo_src; ?>);background-size:cover;background-position:center center;">
                
        <?php } else { ?>
                
            <div class="front" style="background-color:#<?php echo $panel->bg_color; ?>;"> 
                
        <?php } ?>
                
                <div class="panel-content">
                    
                    <?php if ($settings->title_font != 'none') { ?>
                    
                        <<?php echo $settings->title_font; ?>><?php echo $panel->label; ?></<?php echo $settings->title_font; ?>>  
                    
                    <?php } ?>
                    
                    <?php echo $panel->front_text; ?>
                    
                </div>

        </div>

        <?php if ($panel->back_bg_type == 'back_bg_image') { ?>
                
                <div class="back" style="background-image: url(<?php echo $panel->back_photo_src; ?>);background-size:cover;background-position:center center;">
                    
        <?php } else { ?>
                    
            <div class="back" style="background-color:#<?php echo $panel->back_bg_color; ?>;"> 
                
        <?php } ?>
            
            <div class="panel-content">
                
                <?php echo $panel->back_text; ?>
            
                <?php if ($panel->url != '') { ?>

                    <a class="flip-btn" href="<?php echo $panel->url; ?>"><?php echo $panel->button; ?></a>

                <?php } ?>
                
            </div>
                
        </div>
        
    </div>
    
    <?php } ?>

</div>