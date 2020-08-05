<?php
namespace Drupal\plexbasic_settings\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;

/**
 * Provides a Logo Header Block for Plexbasic theme
 * 
 * @Block(
 *  id = "logo_header_block",
 *  admin_label = @Translation("Logo Header Block"),
 *  category = @Translation("Logo Header"),
 * )
 */

class LogoHeaderBlock extends BlockBase implements BlockPluginInterface {
    /**
   * Initial index to create fields.
   */
  const INDEX = 0;

  /**
   * Define limit to repeat fields.
   */
  const MAX_INDEX = 1;


  /**
   * Define Social Networks
   */

  private $items = [
    'main_logo',
    'sub_logo'
  ];

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return ['label_display' => FALSE];
  }

   /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    
    $form = parent::blockForm($form, $form_state);
    
    $config = $this->configuration;

    for($index = self::INDEX; $index <= self::MAX_INDEX; $index++ ){

        $details = 'logo_header_details_' . $index;
        $logo_image = 'logo_header_image_' . $index;
        $logo_url = 'logo_header_url_' . $index;
        $logo_title = 'logo_header_title_' . $index;
        $weight = 'logo_header_weight_' . $index;

        $item = ucfirst(str_replace('_', ' ', $this->items[$index]));

        $form[$details] = [
            '#type' => 'details',
            '#title' => $this->t('@item', [ '@item' => $item]),
            '#Description' => $this->t('Display @item Logo', ['@item' => $item]),
            '#open' => $index === 0
        ];

        $form[$details][$logo_title] = [
            '#type' => 'textfield',
            '#title' => 'Title',
            '#default_value' => !empty($config[$logo_title]) ? $config[$logo_title] : '',
            '#required' => false 
        ];

        $form[$details][$logo_image] = [
            '#type' => 'managed_file',
            '#upload_location' => 'public://logo',
            '#title' => t('Main Logo'),
            '#upload_validators' => [
                'file_validate_extensions' => ['png svg jpg jpeg gif']
            ],
            '#default_value' => isset($config[$logo_image]) ? $config[$logo_image] : '',
            '#description' => $this->t('The @item to display', ['@item' => $item]),
            '#required' => true
        ];

        $form[$details][$logo_url] = [
            '#type' => 'textfield',
            '#title' => 'URL',
            '#default_value' => !empty($config[$logo_url]) ? $config[$logo_url] : '',
            '#required' => false 
        ];

        $form[$details][$weight] = [
            '#type' => 'weight',
            '#title' => $this->t('Weight'),
            '#default_value' => !empty($config[$weight]) ? $config[$weight] : '',
            '#required' => FALSE,
            '#delta' => 5,
            '#after_build' => [[$this, 'weightAfterBuild']],
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

        $details = $form_state->getValue('logo_header_details_' . $index);

        $logo_image = 'logo_header_image_' . $index;
        $logo_url = 'logo_header_url_' . $index;
        $weight = 'logo_header_weight_' . $index;
        $logo_title = 'logo_header_title_' . $index;

        $image_logo = $details[$logo_image];

        if($image_logo != $this->configuration[$logo_image]){
          if(!empty($image_logo[0])){
            $file = File::load($image_logo[0]);
            $file->setPermanent();
            $file->save();
          }
        }
        
        $this->setConfigurationValue($logo_url, $details[$logo_url]);
        $this->setConfigurationValue($logo_title, $details[$logo_title]);
        $this->setConfigurationValue($weight, $details[$weight]);
        $this->setConfigurationValue($logo_image, $details[$logo_image]);

    }
  }

    /**
     * {@inheritdoc}
     */
    public function build() {
        $options = [];
        $config = $this->configuration;

        for ($index = self::INDEX; $index <= self::MAX_INDEX; $index++) {
            $logo_image = 'logo_header_image_' . $index;
            $logo_url = 'logo_header_url_' . $index;
            $logo_title = 'logo_header_title_' . $index;
            $weight = 'logo_header_weight_' . $index;

            $logo_image_url = '';
            $logo = $config[$logo_image];
            if (!empty($logo[0])) {
              if ($file = File::load($logo[0])) {
                  $logo_image_url = $file->url();
              }
            }

            $options[$index] = [
                'logo_title' => !empty($config[$logo_title]) ? $config[$logo_title] : '',
                'logo_image_url' => $logo_image_url,
                'logo_url' => !empty($config[$logo_url]) ? $config[$logo_url] : '',
                'weight' => !empty($config[$weight]) ? $config[$weight] : '',
            ];
        }

        usort($options, function($a, $b) {
            return $a['weight'] <=> $b['weight'];
        });

        return [
            '#theme' => 'plexbasic_settings_logo_header',
            '#logos' => $options,
        ];
    }
  
}