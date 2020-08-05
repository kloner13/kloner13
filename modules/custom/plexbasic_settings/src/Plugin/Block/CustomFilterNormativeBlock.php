<?php

namespace Drupal\plexbasic_settings\Plugin\Block;


use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "filter_normative_block",
 *   admin_label = @Translation("Filtro Normativas"),
 *   category = @Translation("Filtro normativas"),
 * )
 */
class CustomFilterNormativeBlock extends BlockBase implements BlockPluginInterface {
  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'label_display' => FALSE,
    ];
  }
  /**
   * {@inheritdoc}
   */
  public function build() {
    
    $build = [
      '#theme' => 'plexbasic_custom_filters_normative'
    ];
    
    return $build;
  }

}
