<?php
namespace Drupal\ajax_dice\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Ajax\InsertCommand;
use Drupal\Core\Ajax\AjaxResponse;

/**
 * Class AjaxDiceController.
 *
 * @package Drupal\ajax_dice\Controller
 */
class AjaxDiceController extends ControllerBase {
  public function rollCallback(){
    $roll = $this->rollDice();
    $response = new AjaxResponse();
    $content = [
      '#type' => 'markup',
      '#theme' => 'ajax_dice_roll',
      '#roll' => $roll,
    ];
    $response->addCommand( new InsertCommand('#ajax-dice-value', $content));
    return $response;
  }

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
