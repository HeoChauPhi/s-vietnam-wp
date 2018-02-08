<?php
$forms = $settings->tabs;
$tabs = $settings->tabs;
$i = 0;
$l = 0;
$p = 0;
?>
    
  <ul class="tabs-<?php echo $id; ?> turbotabs tabs">
      
      <?php foreach ($forms as $form) { 
        
        $tabbg = $form->bg_image_src;
                
            if ($form->icon == 'left') { ?>
      
                <li class="tab-menu tab-menu-<?php echo $id; ?>" style="background-image: url('<?php echo $tabbg; ?>'); background-size:cover; background-position: center center;" rel="tab-<?php echo $id; ?>-<?php echo $i++ ?>"><span class="icon-left <?php echo $form->tab_icon; ?>"></span><?php echo $form->label; ?></a></li>
      
            <?php }
    
            if ($form->icon == 'right') { ?>
      
                <li class="tab-menu tab-menu-<?php echo $id; ?>" style="background-image: url('<?php echo $tabbg; ?>'); background-size:cover; background-position: center center;" rel="tab-<?php echo $id; ?>-<?php echo $i++ ?>"><?php echo $form->label; ?><span class="icon-right <?php echo $form->tab_icon; ?>"></span></a></li>
      
            <?php }
    
    
            if ($form->icon == 'none') { ?>
      
                <li class="tab-menu tab-menu-<?php echo $id; ?>" style="background-image: url('<?php echo $tabbg; ?>'); background-size:cover; background-position: center center;" rel="tab-<?php echo $id; ?>-<?php echo $i++ ?>"><?php echo $form->label; ?></a></li>
      
            <?php }
    
       } 

        $i = 0;

        ?>

  </ul>

<div class="tab-container-<?php echo $id; ?> tab_container">    
    
    <?php foreach ($tabs as $tab) { 
    
            $tabbg = $tab->bg_image_src;
    
    ?>
    
         <h3 class="tab_drawer_heading tab_drawer_heading-<?php echo $id; ?>" rel="tab-<?php echo $id; ?>-<?php echo $p++; ?>" style="background-image: url('<?php echo $tabbg; ?>'); background-size:cover; background-position: center center;"><?php echo $tab->label; ?></h3> 
    
          <div id="tab-<?php echo $id; ?>-<?php echo $l++; ?>" class="tab_content-<?php echo $id; ?> tab_content">

            <?php if ($tab->content_type != 'shortcode') {
                echo $tab->tab_content;
            } else {
                echo '[fl_builder_insert_layout id=" ' . $tab->template_selection . ' " type="fl-builder-template"]';
            } ?>
              
          </div>
    
    <?php } 

    $l = 0; 

    $p = 0; 
    
    ?>
    
</div>