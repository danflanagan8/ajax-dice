<?php

namespace Drupal\ajax_dice\Plugin\Block;

use Drupal\Core\Block\BlockBase;
/**
 *
 * @Block(
 *  id = "ajax_dice_block",
 *  admin_label = @Translation("Ajax Dice Block"),
 * )
 */
class AjaxDiceBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build[] = [
      '#type' => 'markup',
      '#theme' => 'ajax_dice_block',
    ];

    return $build;
  }


}
