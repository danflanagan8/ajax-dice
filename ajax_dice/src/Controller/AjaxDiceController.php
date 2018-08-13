<?php
namespace Drupal\ajax_dice\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Ajax\AppendCommand;
use Drupal\Core\Ajax\AjaxResponse;

/**
 * Class AjaxDiceController.
 *
 * @package Drupal\ajax_dice\Controller
 */
class AjaxDiceController extends ControllerBase {

  public function rollCallback(){
    $roll = $this->rollDice();
    $content = [
      '#type' => 'markup',
      '#theme' => 'ajax_dice_roll',
      '#roll' => $roll,
    ];
    $response = new AjaxResponse();
    $response->addCommand( new AppendCommand('#ajax-dice-rolls', $content));
    return $response;
  }

  /**
   * Returns a random number between 1 and 6 using the random.org API
   */
  protected function rollDice(){
    try {
      $number = file_get_contents('https://www.random.org/integers/?num=1&min=1&max=6&col=1&base=10&format=plain&rnd=new');
      if ($number === false) {
        return NULL;
      }
    } catch (Exception $e) {
      return NULL;
    }
    return $number;
  }

}
