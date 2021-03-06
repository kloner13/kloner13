<?php

namespace Drupal\webform_content_creator;

use Drupal\Core\Config\Entity\ConfigEntityInterface;
use Drupal\webform\WebformSubmissionInterface;

/**
 * Provides an interface defining an Webform content creator entity.
 */
interface WebformContentCreatorInterface extends ConfigEntityInterface {
  const WEBFORM = 'webform';

  const WEBFORM_CONTENT_CREATOR = 'webform_content_creator';

  const FIELD_TITLE = 'field_title';

  const WEBFORM_FIELD = 'webform_field';

  const CUSTOM_CHECK = 'custom_check';

  const CUSTOM_VALUE = 'custom_value';

  const ELEMENTS = 'elements';

  const TYPE = 'type';

  const SYNC_CONTENT = 'sync_content';

  const SYNC_CONTENT_DELETE = 'sync_content_delete';

  const SYNC_CONTENT_FIELD = 'sync_content_node_field';

  const USE_ENCRYPT = 'use_encrypt';

  const ENCRYPTION_PROFILE = 'encryption_profile';

  /**
   * Returns the entity title.
   *
   * @return string
   *   The entity title.
   */
  public function getTitle();

  /**
   * Sets the entity title.
   *
   * @param string $title
   *   Node title.
   *
   * @return $this
   *   The Webform Content Creator entity.
   */
  public function setTitle($title);

  /**
   * Returns the entity content type id.
   *
   * @return string
   *   The entity content type.
   */
  public function getContentType();

  /**
   * Sets the content type entity.
   *
   * @param string $contentType
   *   Content type entity.
   *
   * @return $this
   *   The Webform Content Creator entity.
   */
  public function setContentType($contentType);

  /**
   * Returns the entity webform id.
   *
   * @return string
   *   The entity webform.
   */
  public function getWebform();

  /**
   * Sets the entity webform id.
   *
   * @param string $webform
   *   Webform id.
   *
   * @return $this
   *   The Webform Content Creator entity.
   */
  public function setWebform($webform);

  /**
   * Returns the entity attributes as an associative array.
   *
   * @return array
   *   The entity attributes mapping.
   */
  public function getAttributes();

  /**
   * Check if synchronization between nodes and webform submissions is used.
   *
   * @return bool
   *   true, when the synchronization is used. Otherwise, returns false.
   */
  public function getSyncEditContentCheck();

  /**
   * Check if synchronization is used in deletion.
   *
   * @return bool
   *   true, when the synchronization is used. Otherwise, returns false.
   */
  public function getSyncDeleteContentCheck();

  /**
   * Get node field in which the webform submission id will be stored.
   *
   * @return string
   *   Field machine name.
   */
  public function getSyncContentField();

  /**
   * Returns the encryption method.
   *
   * @return bool
   *   true, when an encryption profile is used. Otherwise, returns false.
   */
  public function getEncryptionCheck();

  /**
   * Returns the encryption profile.
   *
   * @return string
   *   The encryption profile name.
   */
  public function getEncryptionProfile();

  /**
   * Check if the content type entity exists.
   *
   * @return bool
   *   True, if content type entity exists. Otherwise, returns false.
   */
  public function existsContentType();

  /**
   * Check if the content type id is equal to the configured content type.
   *
   * @param string $ct
   *   Content type id.
   *
   * @return bool
   *   True, if the parameter is equal to the content type id of Webform
   *   content creator entity. Otherwise, returns false.
   */
  public function equalsContentType($ct);

  /**
   * Check if the webform id is equal to the configured webform id.
   *
   * @param string $webform
   *   Webform id.
   *
   * @return bool
   *   True, if the parameter is equal to the webform id of Webform
   *   content creator entity. Otherwise, returns false.
   */
  public function equalsWebform($webform);

  /**
   * Show a message accordingly to status, after creating/updating an entity.
   *
   * @param int $status
   *   Status int, returned after creating/updating an entity.
   */
  public function statusMessage($status);

  /**
   * Create node from webform submission.
   *
   * @param \Drupal\webform\WebformSubmissionInterface $webform_submission
   *   Webform submission.
   */
  public function createNode(WebformSubmissionInterface $webform_submission);

  /**
   * Update node from webform submission.
   *
   * @param \Drupal\webform\WebformSubmissionInterface $webform_submission
   *   Webform submission.
   * @param string $op
   *   Operation.
   *
   * @return bool
   *   True, if succeeded. Otherwise, return false.
   */
  public function updateNode(WebformSubmissionInterface $webform_submission, $op);

  /**
   * Check if field maximum size is exceeded.
   *
   * @param array $fields
   *   Content type fields.
   * @param string $k
   *   Field machine name.
   * @param string $decValue
   *   Decrypted value.
   *
   * @return int
   *   1 if maximum size is exceeded, otherwise return 0.
   */
  public function checkMaxFieldSizeExceeded(array $fields, $k, $decValue);

}
