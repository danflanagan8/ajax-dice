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
      //'#markup' => $this->getSvg($roll),
      '#type' => 'inline_template',
      '#template' => $this->getSvg($roll),
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

  protected function getSvg($num){
    switch($num){
      case 1:
        return '<svg class="ajax-dice" viewBox="0 0 200 200" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <rect x="3" y="3" width="194" height="194" stroke="black" fill="transparent" stroke-width="3"/>
          <circle cx="100" cy="100" r="15" />
        </svg>';
      case 2:
        return '<svg class="ajax-dice" viewBox="0 0 200 200" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <rect x="3" y="3" width="194" height="194" stroke="black" fill="transparent" stroke-width="3"/>
          <circle cx="70" cy="70" r="15"  />
          <circle cx="130" cy="130" r="15"  />
        </svg>';
      case 3:
        return '<svg class="ajax-dice" viewBox="0 0 200 200" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <rect x="3" y="3" width="194" height="194" stroke="black" fill="transparent" stroke-width="3"/>
          <circle cx="50" cy="50" r="15" />
          <circle cx="100" cy="100" r="15" />
          <circle cx="150" cy="150" r="15" />
        </svg>';
      case 4:
        return '<svg class="ajax-dice" viewBox="0 0 200 200" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <rect x="3" y="3" width="194" height="194" stroke="black" fill="transparent" stroke-width="3"/>
          <circle cx="50" cy="50" r="15" />
          <circle cx="150" cy="50" r="15" />
          <circle cx="50" cy="150" r="15" />
          <circle cx="150" cy="150" r="15" />
        </svg>';
      case 5:
        return '<svg class="ajax-dice" viewBox="0 0 200 200" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <rect x="3" y="3" width="194" height="194" stroke="black" fill="transparent" stroke-width="3"/>
          <circle cx="50" cy="50" r="15" />
          <circle cx="150" cy="50" r="15" />
          <circle cx="100" cy="100" r="15" />
          <circle cx="50" cy="150" r="15" />
          <circle cx="150" cy="150" r="15" />
        </svg>';
      default:
        return '<svg class="ajax-dice" viewBox="0 0 200 200" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <rect x="3" y="3" width="194" height="194" stroke="black" fill="transparent" stroke-width="3"/>
          <circle cx="50" cy="50" r="15" />
          <circle cx="50" cy="100" r="15" />
          <circle cx="50" cy="150" r="15" />
          <circle cx="150" cy="50" r="15" />
          <circle cx="150" cy="100" r="15" />
          <circle cx="150" cy="150" r="15" />
        </svg>';

    }
  }
}
