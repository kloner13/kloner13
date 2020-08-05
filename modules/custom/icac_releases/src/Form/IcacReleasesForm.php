<?php

namespace Drupal\icac_releases\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\media_entity\Entity\Media;
use Drupal\Core\File\File;
/**
 * Form controller for the icac releases entity edit forms.
 */
class IcacReleasesForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {

    $entity = $this->getEntity();
    $result = $entity->save();
    $link = $entity->toLink($this->t('View'))->toRenderable();

    $message_arguments = ['%label' => $this->entity->label()];
    $logger_arguments = $message_arguments + ['link' => render($link)];

    if ($result == SAVED_NEW) {
      $this->messenger()->addStatus($this->t('New icac releases %label has been created.', $message_arguments));
      $this->logger('icac_releases')->notice('Created new icac releases %label', $logger_arguments);
    }
    else {
      $this->messenger()->addStatus($this->t('The icac releases %label has been updated.', $message_arguments));
      $this->logger('icac_releases')->notice('Updated new icac releases %label.', $logger_arguments);
    }

    $form_state->setRedirect('entity.icac_releases.canonical', ['icac_releases' => $entity->id()]);
  }

}
