<?php 
$date = date('Y/m/d h:i', time());
$dateinput = $settings->sw_counter_date; 

if ($date >= $dateinput) { ?>
    
    <div class="finished-content"><?php echo $settings->sw_end_msg; ?></div>
                         
<?php } else { ?>

    <div class="sw-counter-clock"></div>
    
    <p class="sw-counter-note"></p>

<?php } ?>