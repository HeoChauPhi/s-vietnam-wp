<?php
$zohocrm_custom_posttype = get_zoho_posttype();
//print_r($zohocrm_custom_posttype);
?>

<div class="zoho-tabs-setting">
  <ul>
    <li><a href="#zohocrm-import-content"><?php echo __('Zoho CRM import Content', 'zoho_crm'); ?></a></li>
    <li><a href="#zohocrm-delete-content"><?php echo __('Zoho CRM remove Content', 'zoho_crm'); ?></a></li>
    <li><a href="#zohodocs-import-files"><?php echo __('Zoho Docs import Files', 'zoho_crm'); ?></a></li>
  </ul>

  <div id="zohocrm-import-content">
    <h2><?php echo __('Zoho CRM import Content', 'zoho_crm'); ?></h2>
    <form method="post" action="#" id="zoho-crm-import">
      <p class="form-item">
        <textarea id="zohocrm_productid" name="zohocrm_productids" placeholder="One line for only one ID" rows="8" style="width: 100%;"></textarea></p>
      <p class="form-item">
        <select id="zohocrm_type" name="zohocrm_type">
          <option value="" checked>-- <?php echo __('Select Content Type', 'zoho_crm'); ?> --</option>
          <?php
          if ( !empty($zohocrm_custom_posttype) && $zohocrm_custom_posttype != null ) {
            foreach ($zohocrm_custom_posttype as $key => $posttype) {
              echo '<option value="' . $key . '">' . $posttype . '</option>';
            }
          }
          ?>
        </select>
      </p>
      <p class="form-item">
        <button type="submit" form="zoho-crm-import" value="Submit" class="button button-primary">Submit</button>
      </p>
    </form>
    <?php
      if (!empty($GLOBALS['zohocrm_success'])) {
        echo '<div class="zohocrm-import-meassage">' . $GLOBALS['zohocrm_success'] . '</div>';
      }
    ?>
  </div>

  <div id="zohocrm-delete-content">
    <h2><?php echo __('Zoho CRM remove Content', 'zoho_crm'); ?></h2>
    <form method="post" action="#" id="zoho-crm-remove">
      <p class="form-item">
        <select id="zohocrm_posttype" name="zohocrm_posttype">
          <option value="" checked>-- <?php echo __('Select Content Type', 'zoho_crm'); ?> --</option>
          <?php
          if ( !empty($zohocrm_custom_posttype) && $zohocrm_custom_posttype != null ) {
            foreach ($zohocrm_custom_posttype as $key => $posttype) {
              echo '<option value="' . $key . '">' . $posttype . '</option>';
            }
          }
          ?>
        </select>
      </p>
      <p class="form-item">
        <button type="submit" form="zoho-crm-remove" value="Submit" class="button button-primary">Submit</button>
      </p>
    </form>
  </div>

  <div id="zohodocs-import-files">
    <h2><?php echo __('Zoho Docs import Files', 'zoho_crm'); ?></h2>
    <a href="#" class="get_zohodocs button"><?php echo __('Get Files and Folders from ZohoDocs', 'zoho_crm'); ?></a>
    <br>
    <br>
    <div class="zohodocs_element"></div>
    <br>
    <div class="zohodoc_action_import">
      <div class="zohodocs-meassage"></div>
    </div>

    <script type="text/javascript">
      (function($) {
        var import_zohodocs_to_posts = function() {
          var zohodocs_value = [];
          $.each($("#zohodocs_folders option:selected"), function(){            
            zohodocs_value.push('(' + $(this).parent("optgroup").attr("data-name") + ' = ' + $(this).val() + ' = ' + $(this).text() + ')');
          });
          zohodocs_arr = zohodocs_value.join(" | ");

          $('.zohodocs-meassage').empty();

          $.ajax({
            type : "post",
            dataType : "json",
            url : ajaxurl,
            data : {
              action: "importzohodocstopost",
              zohodocs_value: zohodocs_arr
            },
            beforeSend: function() {
              $('.zohodocs-meassage').append('<div class="zoho-ajax-loader"><span class="ajax-icon"></span></div>');
            },
            success: function(response) {
              //console.log(response.test_request);
              $('.zoho-ajax-loader').remove();
              $('.zohodocs-meassage').html(response.meassage);
            },
            error: function(response) {
                console.log('error');
            }
          });

          return false;
        }

        $(document).ready(function(){
          $('.get_zohodocs').on('click', function() {
            $('.import_zohodocs_to_posts').remove();
            $('.zohodocs-meassage').empty();
            $('.zohodocs_element').empty();

            $.ajax({
              type : "post",
              dataType : "json",
              url : ajaxurl,
              data : {
                action: "getzohodocs"
              },
              beforeSend: function() {
                $('.zohodocs_element').append('<div class="zoho-ajax-loader"><span class="ajax-icon"></span></div>');
              },
              success: function(response) {
                $('.zoho-ajax-loader').remove();
                $('.zohodocs_element').html(response.markup);
                $('#zohodocs_folders').multiSelect({
                  selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='<?php echo __('Search', 'zoho_crm'); ?>'>",
                  selectionHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='<?php echo __('Search', 'zoho_crm'); ?>'>",
                  afterInit: function(ms){
                    var that = this,
                        $selectableSearch = that.$selectableUl.prev(),
                        $selectionSearch = that.$selectionUl.prev(),
                        selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                        selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

                    that.qs1 = $selectableSearch.quicksearch(selectableSearchString).on('keydown', function(e){
                      if (e.which === 40){
                        that.$selectableUl.focus();
                        return false;
                      }
                    });

                    that.qs2 = $selectionSearch.quicksearch(selectionSearchString).on('keydown', function(e){
                      if (e.which == 40){
                        that.$selectionUl.focus();
                        return false;
                      }
                    });
                  },
                  afterSelect: function(){
                    this.qs1.cache();
                    this.qs2.cache();
                  },
                  afterDeselect: function(){
                    this.qs1.cache();
                    this.qs2.cache();
                  }
                });
                $('.zohodocs-select-all').click(function(){
                  $('#zohodocs_folders').multiSelect('select_all');
                  return false;
                });
                $('.zohodocs-deselect-all').click(function(){
                  $('#zohodocs_folders').multiSelect('deselect_all');
                  return false;
                });

                $('.zohodoc_action_import').prepend('<a href="#" class="button button-primary import_zohodocs_to_posts"><?php echo __('Import Files and Folders to Posts', 'zoho_crm'); ?></a>');
                $('.import_zohodocs_to_posts').on('click', import_zohodocs_to_posts);
              },
              error: function(response) {
                console.log('error');
              }
            });

            return false;
          });

        });
      })(jQuery);
    </script>
  </div>
</div>