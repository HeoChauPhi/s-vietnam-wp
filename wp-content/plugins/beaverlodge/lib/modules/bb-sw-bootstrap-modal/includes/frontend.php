<div class="sw-modal">

  <!-- Trigger the modal with a button -->
<?php if ($settings->btn_style == 'button') { ?>    
    <div class="<?php echo $module->get_classname(); ?>">
        <a href="#" data-toggle="modal" data-target="#<?php echo $id; ?>-bb-modal" class="fl-button" role="button">      
                <?php if ( ! empty( $settings->icon ) && ( 'before' == $settings->icon_position || ! isset( $settings->icon_position ) ) ) : ?>
                <i class="fl-button-icon fl-button-icon-before fa <?php echo $settings->icon; ?>"></i>
                <?php endif; ?>
                <span class="fl-button-text"><?php echo $settings->text; ?></span>
                <?php if ( ! empty( $settings->icon ) && 'after' == $settings->icon_position ) : ?>
                <i class="fl-button-icon fl-button-icon-after fa <?php echo $settings->icon; ?>"></i>
                <?php endif; ?>
        </a>
    </div>
<?php } else { ?>
    <a href="#" data-toggle="modal" data-target="#<?php echo $id; ?>-bb-modal" role="button">
            <img align="<?php echo $settings->image_align; ?>" class="button-image" src="<?php echo $settings->image_src; ?>" />
    </a>    
<?php } ?>

  <!-- Modal -->
  <div class="modal fade" id="<?php echo $id; ?>-bb-modal" role="dialog">
    <div class="modal-dialog modal-<?php echo $settings->modal_size; ?>">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title"><?php echo $settings->modal_title; ?></h4>
        </div>
        <div class="modal-body">
          <?php echo $settings->content; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-<?php echo $settings->close_btn_type; ?>" data-dismiss="modal"><?php echo $settings->close_btn_text; ?></button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>