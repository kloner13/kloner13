<?php
namespace Drupal\plexbasic_settings\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;

/**
 * Provides a Links of Interests Block for Plexbasic theme
 * 
 * @Block(
 *  id = "links_interest_block",
 *  admin_label = @Translation("Links of Interest Block"),
 *  category = @Translation("Links of Interest"),
 * )
 */

class LinksInterestBlock extends BlockBase implements BlockPluginInterface {
    /**
   * Initial index to create fields.
   */
  const INDEX = 0;

  /**
   * Define limit to repeat fields.
   */
  const MAX_INDEX = 2;

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
        $details = 'links_interest_details_' . $index;
        $logo_image = 'links_interest_image_' . $index;
        $logo_url = 'links_interest_url_' . $index;
        $logo_title = 'links_interest_title_' . $index;
        $weight = 'links_interest_weight_' . $index;

        $form[$details] = [
            '#type' => 'details',
            '#title' => $this->t('Link @item', [ '@item' => $item]),
            '#Description' => $this->t('Display Link @item', ['@item' => $item]),
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
            '#title' => t('Link image'),
            '#upload_validators' => [
                'file_validate_extensions' => ['png svg jpg jpeg gif']
            ],
            '#default_value' => !empty($config[$logo_image]) ? $config[$logo_image] : '',
            '#description' => $this->t('The Link @item to display', ['@item' => $item]),
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

        $details = $form_state->getValue('links_interest_details_' . $index);
        $logo_image = 'links_interest_image_' . $index;
        $logo_url = 'links_interest_url_' . $index;
        $weight = 'links_interest_weight_' . $index;
        $logo_title = 'links_interest_title_' . $index;

        $image_logo = $form_state->getValue($details[$logo_image]);

        if($image_logo != $this->configuration[$logo_image]){
          if(!empty($image_logo[0])){
            $file = File::load($image_logo[0]);
            $file->setPermanent();
            $file->save();
          }
        }

        $this->setConfigurationValue($logo_url, $details[$logo_url]);
        $this->setConfigurationValue($logo_title, $details[$logo_title]);
        $this->setConfigurationValue($logo_image, $details[$logo_image]);
        $this->setConfigurationValue($weight, $details[$weight]);

    }
  }

    /**
     * {@inheritdoc}
     */
    public function build() {
        $options = [];
        $config = $this->configuration;

        for ($index = self::INDEX; $index <= self::MAX_INDEX; $index++) {
            $logo_image = 'links_interest_image_' . $index;
            $logo_url = 'links_interest_url_' . $index;
            $logo_title = 'links_interest_title_' . $index;
            $weight = 'links_interest_weight_' . $index;

            $logo = $config[$logo_image];
            if (!empty($logo[0])) {
              if ($file = File::load($logo[0])) {
                  $logo_image_url = $file->url();
              }
            }


            $options[$index] = [
                'title' => !empty($config[$logo_title]) ? $config[$logo_title] : '',
                'image_url' => $logo_img_url,
                'url' => !empty($config[$logo_url]) ? $config[$logo_url] : '',
                'weight' => !empty($config[$weight]) ? $config[$weight] : '',
            ];
        }

        usort($options, function($a, $b) {
            return $a['weight'] <=> $b['weight'];
        });

        return [
            '#theme' => 'plexbasic_settings_links_interest',
            '#data' => $options,
        ];
    }
  
}