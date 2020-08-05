<?php

namespace Drupal\plexbasic_settings\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;
/**
 * Provides a Featured Block for Plexbasic theme
 *
 * @Block(
 *  id = "Featured_block",
 *  admin_label = @Translation("Featured Block"),
 *  category = @Translation("Destacados"),
 * )
 */
class FeaturedBlock extends BlockBase implements BlockPluginInterface {
  /**
   * Initial index to create fields.
   */
  const INDEX = 1;

  /**
   * Define limit to repeat fields.
   */
  const MAX_INDEX = 3;

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'featured_block_title' => $this->t('Elige datos'),
      'label_display' => FALSE,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state)
  {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();

    for ($index = self::INDEX; $index <= self::MAX_INDEX; $index++) {
      $details = 'options_details_' . $index;
      $title = 'options_title_' . $index;
      $link = 'options_featured_link_' . $index;
      $image = 'options_featured_imagen_' . $index;
      $weight = 'options_featured_weight_' . $index;

      $form[$details] = [
        '#type' => 'details',
        '#title' => $this->t('Destacado @index', ['@index' => $index]),
        '#description' => t('Campos configurables del bloque.'),
        '#open' => $index === 1,
      ];

      $form[$details][$title] = [
        '#type' => 'textfield',
        '#title' => t('Titulo'),
        '#description' => t('Titulo de la sección'),
        '#default_value' => (isset($config[$title])) ? $config[$title] : '',
      ];

      $form[$details][$link] = array(
        '#type' => 'textfield',
        '#title' => t('Enlace'),
        '#description' => t('Enlace asociado'),
        '#default_value' => (isset($config[$link])) ? $config[$link] : '',
      );

      $form[$details][$image] = [
        '#type' => 'managed_file',
        '#upload_location' => 'public://logo/',
        '#title' => $this->t('Imagen'),
        '#upload_validators' => [
          'file_validate_extensions' => ['png svg jpg jpeg'],
        ],
        '#default_value' => isset($config[$image]) ? $config[$image] : '',
        '#description' => t('Imagen a mostrar'),
        '#required' => FALSE,
      ];

      $form[$details][$weight] = [
        '#type' => 'weight',
        '#title' => $this->t('Peso'),
        '#default_value' => !empty($config[$weight]) ? $config[$weight] : '',
        '#required' => FALSE,
        '#delta' => 3,
        '#after_build' => [[$this, 'weightAfterBuild']],
      ];
    }
    return $form;
  }
  public function weightAfterBuild(array $element, FormStateInterface $form_state) {

    if ('Peso' === $element['#title']->getUntranslatedString()) {
      $options = [];
      for ($i = 1; $i <= $element['#delta']; $i++) {
        $options[$i] = $i;
      }
      $element['#options'] = $options;
    }

    return $element;

  }
  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    for ($index = self::INDEX; $index <= self::MAX_INDEX; $index++) {

      $details = $form_state->getValue('options_details_' . $index);
      $title = 'options_title_' . $index;
      $link = 'options_featured_link_' . $index;
      $image = 'options_featured_imagen_' . $index;
      $weight = 'options_featured_weight_' . $index;

      $imagene = $details[$image];

      if($imagene != $this->configuration[$image]){
        if(!empty($imagene[0])){
          $file = File::load($imagene[0]);
          $file->setPermanent();
          $file->save();
        }
      }

      $this->setConfigurationValue($title, $details[$title]);
      $this->setConfigurationValue($link, $details[$link]);
      $this->setConfigurationValue($image, $details[$image]);
      $this->setConfigurationValue($weight, $details[$weight]);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $items = [];
    $options = [];
    $config = $this->getConfiguration();

    for ($index = self::INDEX; $index <= self::MAX_INDEX; $index++) {

        $title = 'options_title_' . $index;
        $link = 'options_featured_link_' . $index;
        $image = 'options_featured_imagen_' . $index;
        $weight = 'options_featured_weight_' . $index;

        $logo = $config[$image];
        $logo_image_url = '';
        if (!empty($logo[0])) {
          if ($file = File::load($logo[0])) {
            $logo_image_url = $file->url();
          }
        }


        if (!empty($this->configuration[$title])) {
          $items['title'] = $this->configuration[$title];
        }
        if (!empty($this->configuration[$link])) {
          $items['link'] = $this->configuration[$link];
        }
        if (!empty($config[$image])) {
         // $items['file_uri'] = \Drupal::entityTypeManager()->getStorage('file')->load($config[$image])->getFileUri();
        }
        if (!empty($this->configuration[$weight])) {
          $items['posicion'] = $this->configuration[$weight];
        }

      $options[$index] = [
        'title' => !empty($config[$title]) ? $config[$title] : '',
        'link' => !empty($config[$link]) ? $config[$link] : '',
        'logo_image_url' => $logo_image_url,
        'weight' => !empty($config[$weight]) ? $config[$weight] : '',
      ];
    }

    usort($options, function($a, $b) {
      return $a['weight'] <=> $b['weight'];
    });

    $build = [
      '#theme' => 'plexbasic_settings_featured',
      '#data' => $options,
      '#ext' => 'valor de prueba'
    ];

    return $build;

  }

}
