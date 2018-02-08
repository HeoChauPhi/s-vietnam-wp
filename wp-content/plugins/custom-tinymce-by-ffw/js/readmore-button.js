(function() {
  tinymce.PluginManager.add('pdj_readmore_mce_button', function(editor, url) {
    content_style : ".block-content__link{color: #888; display: block; text-align: center; position: relative;}.js-link-more{background-color: #fff; position: relative; z-index: 9; display: inline-block; padding: 0 20px;}hr{position: absolute; top: 50%; width: 100%; margin: 0;}";
    editor.addButton('pdj_readmore_mce_button', {
      icon: false,
      text: "Read More",
      onclick: function() {
        editor.windowManager.open({
          title: "Insert Read More",
          body: [{
            type: 'textbox',
            name: 'readmore',
            label: 'Read More text',
            value: 'Read More'
          }],
          onsubmit: function(e) {
            /*editor.insertContent(
              '<div class="readmore" style="color: #888; display: block; text-align: center; position: relative;"><span style="background-color: #fff; position: relative; z-index: 9; display: inline-block; padding: 0 20px;">'+e.data.readmore+'</span><hr style="position: absolute; top: 50%; width: 100%; margin: 0;"></div>'
            );*/
            var readmore = '<div class="block-content__link link-more"><span class="cl--blue js-link-more">'+e.data.readmore+'</span></div>'
            editor.focus();
            editor.selection.setContent(readmore + '<div class="paragraph-readmore">' + editor.selection.getContent() + '</div>');
          }
        });
      }
    });
  });
})();
