(function ($, Drupal, drupalSettings) {

  Drupal.behaviors.ajaxDice = {
    attach: function (context, settings) {
      $('#ajax-dice-value', context).click(function(){
        var rollDice = Drupal.ajax({
          url: Drupal.url('ajax_dice/roll'),
        });
        rollDice.execute();
      });
    },
  }

})(jQuery, Drupal, drupalSettings);
