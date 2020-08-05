<?php

namespace Drupal\icac_releases;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining an icac releases entity type.
 */
interface IcacReleasesInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

  /**
   * Gets the icac releases title.
   *
   * @return string
   *   Title of the icac releases.
   */
  public function getTitle();

  /**
   * Sets the icac releases title.
   *
   * @param string $title
   *   The icac releases title.
   *
   * @return \Drupal\icac_releases\IcacReleasesInterface
   *   The called icac releases entity.
   */
  public function setTitle($title);

  /**
   * Gets the icac releases creation timestamp.
   *
   * @return int
   *   Creation timestamp of the icac releases.
   */
  public function getCreatedTime();

  /**
   * Sets the icac releases creation timestamp.
   *
   * @param int $timestamp
   *   The icac releases creation timestamp.
   *
   * @return \Drupal\icac_releases\IcacReleasesInterface
   *   The called icac releases entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the icac releases status.
   *
   * @return bool
   *   TRUE if the icac releases is enabled, FALSE otherwise.
   */
  public function isEnabled();

  /**
   * Sets the icac releases status.
   *
   * @param bool $status
   *   TRUE to enable this icac releases, FALSE to disable.
   *
   * @return \Drupal\icac_releases\IcacReleasesInterface
   *   The called icac releases entity.
   */
  public function setStatus($status);



}
