.sw-legend {
    text-align: center;
}

.sw-chart {
<?php if ($settings->graph_style == 'pie') { ?>
    width: <?php echo $settings->height; ?>px;
<?php } else { ?>
    width: <?php echo $settings->width; ?>px;
<?php } ?>
}

<?php
    if ($settings->align == 'left') { ?>

    <?php }

    if ($settings->align == 'center') { ?>
        .sw-chart {
            margin: 0 auto;
        }
    <?php }
   
    if ($settings->align == 'right') { ?>
        .sw-chart {
            float: right;
        }
    <?php } 
?>
