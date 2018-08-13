(function ($, Drupal, drupalSettings) {

  Drupal.behaviors.ajaxDice = {
    attach: function (context, settings) {
      $('#ajax-dice-roller', context).click(function(){
        var rollDice = Drupal.ajax({
          url: Drupal.url('ajax_dice/roll'),
          element: $('#ajax-dice-rolls'), //so that the throbber appears
        });
        rollDice.execute();
      });
    },
  }

})(jQuery, Drupal, drupalSettings);
