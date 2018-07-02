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
    $response = new AjaxResponse();
    $content = [
      '#markup' => '<div id="ajax-dice-roll">' . $this->rollDice() . '</div>',
    ];
    $response->addCommand( new InsertCommand('#ajax-dice-value', $content));
    return $response;
  }

  protected function rollDice(){
    try {
      $number = file_get_contents('https://www.random.org/integers/?num=1&min=1&max=6&col=1&base=10&format=plain&rnd=new');
      if ($content === false) {
        return NULL;
      }
    } catch (Exception $e) {
      return NULL;
    }
    return $number;
  }
}
