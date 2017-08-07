(function() {
  tinymce.PluginManager.add('pdj_social_mce_button', function(editor, url) {
    editor.addButton('pdj_social_mce_button', {
      icon: false,
      text: "Social",
      onclick: function() {
        editor.windowManager.open({
          title: "Insert Social",
          body: [{
            type: 'checkbox',
            name: 'facebook',
            label: 'Facebook',
            value: ''
          },
          {
            type: 'checkbox',
            name: 'twitter',
            label: 'Twitter',
            value: ''
          },
          {
            type: 'checkbox',
            name: 'linkedin',
            label: 'Linkedin',
            value: ''
          }],
          onsubmit: function(e) {
            editor.insertContent(
              '[share_buttons facebook="'+e.data.facebook+'" twitter="'+e.data.twitter+'" linkedin="'+e.data.linkedin+'"]'
            );
          }
        });
      }
    });
  });
})();
