<<?php echo $settings->tag; ?> class="fl-heading">
	<?php if(!empty($settings->link)) : ?>
	<a href="<?php echo $settings->link; ?>" title="<?php echo $settings->heading; ?>" target="<?php echo $settings->link_target; ?>">
	<?php endif; ?>
	<span class="fl-heading-text">
        <?php 
        if ($settings->content_type == 'text') {
            echo $settings->heading; 
        } else { ?>
            <i class="<?php echo $settings->icon; ?>"></i>
        <?php }
        ?>
    </span>
	<?php if(!empty($settings->link)) : ?>
	</a>
	<?php endif; ?>
</<?php echo $settings->tag; ?>>