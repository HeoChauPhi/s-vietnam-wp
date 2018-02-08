<?php 
$values = $settings->values;
?>

<div class="sw-chart">

        <ul class="sw-<?php echo $settings->graph_style; ?>-chart">
            
            <?php foreach ($values as $value) { ?>
            
                <li class="visualize" data-value="<?php echo $value->value; ?>" data-color="#<?php echo $value->colour; ?>"><?php echo $value->title; ?></li>
            
            <?php } ?>
            
        </ul>
    
</div>
