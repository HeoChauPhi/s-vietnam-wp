<?php
function ct_list_posttype() {
  $wp;

  $checklist = array();
  $args = array(
    'public'  => true,
  );
  $output = 'objects';
  $postTypes = get_post_types( $args, $output );

  foreach ($postTypes as $postType) {
    $postslug = $postType->name;
    $postname = $postType->label;
    $checklist[] = $postslug;
  }

  $checklist = array_diff($checklist, ['page']);

  //print_r($checklist);
  return $checklist;
}

function ct_list_nav_menus() {
  $menu_list = array();

  $menus_obj = wp_get_nav_menus();

  foreach ( $menus_obj as $menu_item) {
    $menu_list[$menu_item->slug] = $menu_item->name;
  }

  return $menu_list;
}

function list_registered_sidebars() {
  global $wp_registered_sidebars;
  $list_sidebar = array(
    'none' => __('None')
  );

  foreach ($wp_registered_sidebars as $sidebar) {
    $sidebarid = $sidebar['id'];
    $list_sidebar[$sidebarid] = $sidebar['name'];
  }

  return $list_sidebar;
}

function media_upload() { ?>
  <script>
    jQuery(document).ready(function($) {
      $('.upload_image').click(function(e) {
        e.preventDefault();

        var custom_uploader = wp.media({
          title: 'Custom Image',
          button: {
            text: 'Upload Image'
          },
          multiple: false  // Set this to true to allow multiple files to be selected
        })
        .on('select', function() {
          var attachment = custom_uploader.state().get('selection').first().toJSON();
          $('.thumbnail_image').attr({'src': attachment.url});
          $('.value_image').val(attachment.url);
        })
        .open();
      });
      $('.remove_image').click(function(e) {
        e.preventDefault();
        $('.thumbnail_image').attr({'src': ''});
        $('.value_image').val('');
      });
    });
  </script>
<?php
}