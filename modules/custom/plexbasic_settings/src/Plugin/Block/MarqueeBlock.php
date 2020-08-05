<?php

namespace Drupal\plexbasic_settings\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\datetime\Plugin\Field\FieldType\DateTimeItemInterface;
/**
 * Provides a Marquee Block for Plexbasic theme
 *
 * @Block(
 *  id = "Marquee_block",
 *  admin_label = @Translation("Marquee Block"),
 *  category = @Translation("Marquee"),
 * )
 */
class MarqueeBlock extends BlockBase implements BlockPluginInterface
{
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
      'marquee_block_title' => $this->t('Elige datos'),
      'label_display' => FALSE,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state)
  {
    $form = parent::blockForm($form, $form_state);
    $config = $this->configuration;


    //global

    for($index = self::INDEX; $index <= self::MAX_INDEX; $index++ ) {

        $details = 'marquee_details_' . $index;
        $marquee_description = 'marquee_description_' . $index;
        $marquee_link = 'marquee_link_' . $index;
        $marquee_date_ini = 'marquee_date_ini_' . $index;
        $marquee_date_end = 'marquee_date_end_' . $index;

      $form[$details] = [
        '#type' => 'details',
        '#title' => $this->t('Avisos @index', ['@index' => $index]),
        '#Description' => $this->t('Configuración de Avisos'),
        '#open' => $index === 1,
        '#prefix' => '<div id="city-ajax-wrapper">',
        '#suffix' => '</div>',
      ];

      $form[$details][$marquee_description] = [
        '#type' => 'textfield',
        '#title' => $this->t('Texto descriptivo'),
        '#default_value' => !empty($config[$marquee_description]) ? $config[$marquee_description] : '',
        '#required' => FALSE,
      ];

      $form[$details][$marquee_link] = [
        '#type' => 'textfield',
        '#title' => t('Enlace'),
        '#description' => t('Enlace asociado'),
        '#default_value' => !empty($config[$marquee_link]) ? $config[$marquee_link] : '',
      ];

      $form[$details][$marquee_date_ini] = [
        '#type' => 'date',
        '#title' => t('Fecha de inicio'),
        '#description' => t('Fecha'),
        '#required' => FALSE,
        '#default_value' => !empty($config[$marquee_date_ini]) ? $config[$marquee_date_ini] : '',
      ];

      $form[$details][$marquee_date_end] = [
        '#type' => 'date',
        '#title' => t('Fecha final'),
        '#description' => t('Fecha'),
        '#required' => FALSE,
        '#default_value' => !empty($config[$marquee_date_end]) ? $config[$marquee_date_end] : '',
      ];

    }
    return $form;
  }

  public function weightAfterBuild(array $element, FormStateInterface $form_state) {

    if ('Weight' === $element['#title']->getUntranslatedString()) {
      $options = [];
      for ($i = 0; $i <= $element['#delta']; $i++) {
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

    ///Save configuration
    for ($index = self::INDEX; $index <= self::MAX_INDEX; $index++) {

      $details = $form_state->getValue('marquee_details_' . $index);

      $marquee_description = 'marquee_description_' . $index;
      $marquee_link = 'marquee_link_' . $index;
      $marquee_date_ini = 'marquee_date_ini_' . $index;
      $marquee_date_end = 'marquee_date_end_' . $index;
      

      $this->setConfigurationValue($marquee_description, $details[$marquee_description]);
      $this->setConfigurationValue($marquee_link, $details[$marquee_link]);
      $this->setConfigurationValue($marquee_date_ini, $details[$marquee_date_ini]);
      $this->setConfigurationValue($marquee_date_end, $details[$marquee_date_end]);
    }
  }


  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $options = [];
    $config = $this->configuration;

    for ($index = self::INDEX; $index <= self::MAX_INDEX; $index++) {

      $marquee_description = 'marquee_description_' . $index;
      $marquee_link = 'marquee_link_' . $index;
      $marquee_date_ini = 'marquee_date_ini_' . $index;
      $marquee_date_end = 'marquee_date_end_' . $index;
      

      $current_date = date('Y-m-d');
      $start = !empty($config[$marquee_date_ini]) ? $config[$marquee_date_ini] : '';
      $end = !empty($config[$marquee_date_end]) ? $config[$marquee_date_end] : '';
      
      
      if(empty($start) || empty($end)){
        continue;
      }

      $is_in_range = $this->check_in_range($start, $end, $current_date);

      if(!$is_in_range){
        continue;
      }


      $options[$index] = [
        'marquee_description' => !empty($config[$marquee_description]) ? $config[$marquee_description] : '',
        'marquee_link' => !empty($config[$marquee_link]) ? $config[$marquee_link] : ''
      ];
    }

    return (count($options)) ?  [ '#theme' => 'plexbasic_settings_marquee', '#data' => $options ] : NULL;
  }


  public function check_in_range($start_date , $end_date, $current_date){

    //convert to timestamp
    $start_ts = strtotime($start_date);
    $end_ts = strtotime($end_date);
    $current_ts = strtotime($current_date);

    ///check that date is between start and end dates
    return (($current_ts >= $start_ts) && ($current_ts <= $end_ts));

  }


}
