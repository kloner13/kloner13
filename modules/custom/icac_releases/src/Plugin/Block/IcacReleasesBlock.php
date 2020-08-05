<?php

namespace Drupal\icac_releases\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\file\Entity\File;
use Drupal\icac_releases\Entity\IcacReleases;
use Drupal\media\Entity\Media;
/**
 * Provides a ICAC Releases Block for Plexbasic theme
 *
 * @Block(
 *  id = "Icacreleases_block",
 *  admin_label = @Translation("Comunicados"),
 *  category = @Translation("Destacados"),
 * )
 */
class IcacReleasesBlock extends BlockBase implements BlockPluginInterface {

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
  public function build()
  {
    $icac_releases_ids = \Drupal::entityQuery('icac_releases')
      ->condition('status', 1)
      ->execute();

    $icac_releases_list = IcacReleases::loadMultiple($icac_releases_ids);

    $data = [];

    foreach ($icac_releases_list as $icac_release){
      $icac_realease_array = array(
        'title' => $icac_release->getTitle(),
        'url' => $this->getMediaUrl($icac_release->getPdfDocument())
      );

      array_push($data, $icac_realease_array);
    }

    $build = [
      '#theme' => 'icac_releases_list',
      '#data' => $data
    ];

    return $build;

  }

  /**
   * @param $media_id
   * @return \Drupal\Core\GeneratedUrl|string
   */
  private function getMediaUrl($media_id){
    $media = Media::load($media_id);
    $fid = $media->getSource()->getSourceFieldValue($media);
    $file = File::load($fid);

    return $file->url();
  }

}
