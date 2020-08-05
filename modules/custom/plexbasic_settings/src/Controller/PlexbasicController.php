<?php
/**
 * @file
 * Contains \Drupal\plexbasic_settings\Controller\PlexbasicController.
 */
namespace Drupal\plexbasic_settings\Controller;

class PlexbasicController {
  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello, World!'),
    );
  }
}