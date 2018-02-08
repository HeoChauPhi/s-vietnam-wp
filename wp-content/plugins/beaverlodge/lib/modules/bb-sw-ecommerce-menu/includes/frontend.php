
<div class="mi-slider sw-ecommmerce-menu-<?php echo $id; ?>">
    
    <ul>
        <?php foreach ($settings->sub_catergories as $subcat) {
            
            if ($subcat->label == $settings->title[0]) { ?>
        
		      <li><a href="<?php echo $subcat->url; ?>"><img src="<?php echo $subcat->image_src; ?>" alt="<?php echo $subcat->image; ?>"><h4><?php echo $subcat->sub; ?></h4></a></li>
        
            <?php }
            
        } ?>
        
	</ul>
    
    <ul>
        <?php foreach ($settings->sub_catergories as $subcat) {
    
            if ($subcat->label == $settings->title[1]) { ?>
        
		      <li><a href="<?php echo $subcat->url; ?>"><img src="<?php echo $subcat->image_src; ?>" alt="<?php echo $subcat->image; ?>"><h4><?php echo $subcat->sub; ?></h4></a></li>
        
            <?php }
            
        } ?>
        
	</ul>    
    
    <ul>
        <?php foreach ($settings->sub_catergories as $subcat) {
    
            if ($subcat->label == $settings->title[2]) { ?>
        
		      <li><a href="<?php echo $subcat->url; ?>"><img src="<?php echo $subcat->image_src; ?>" alt="<?php echo $subcat->image; ?>"><h4><?php echo $subcat->sub; ?></h4></a></li>
        
            <?php }
            
        } ?>
        
	</ul>       
    
    <ul>
        <?php foreach ($settings->sub_catergories as $subcat) {
    
            if ($subcat->label == $settings->title[3]) { ?>
        
		      <li><a href="<?php echo $subcat->url; ?>"><img src="<?php echo $subcat->image_src; ?>" alt="<?php echo $subcat->image; ?>"><h4><?php echo $subcat->sub; ?></h4></a></li>
        
            <?php }
            
        } ?>
        
	</ul>
    
	<nav>
        <?php foreach ($settings->title as $item) { ?>
		  <a href="#"><?php echo $item; ?></a>
        <?php } ?>
	</nav>
</div>