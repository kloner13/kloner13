<?php
namespace Drupal\plexbasic_settings\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
/**
 * Provides a Logo Header Block for Plexbasic theme
 * 
 * @Block(
 *  id = "social_network_block",
 *  admin_label = @Translation("Social Network Block"),
 *  category = @Translation("Social Network"),
 * )
 */

class SocialNetworkBlock extends BlockBase implements BlockPluginInterface {
  
   /**
   * Initial index to create fields.
   */
  const INDEX = 0;

  /**
   * Define limit to repeat fields.
   */
  const MAX_INDEX = 4;


  /**
   * Define Social Networks
   */

  private $social_items = [
    'facebook',
    'twitter',
    'mail',
    'linkedin',
    'rss'
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

    for($index= self::INDEX; $index <= self::MAX_INDEX; $index++){
        $details = 'social_network_details_' . $index;
        $url = 'social_network_url'. $index;
        $weight = 'social_network_weight_' . $index;

        $item = $this->t('@item', ['@item' => ucfirst($this->social_items[$index])]);

        $form[$details] = [
            '#type' => 'details',
            '#title' => $this->t('@item', ['@item' => $item]),
            '#Description' => $this->t('Display @item URL', ['@item' => $item]),
            '#open' => $index === 0
        ];

        $form[$details][$url] = [
            '#type' => 'textfield',
            '#title' => 'URL',
            '#default_value' => !empty($config[$url]) ? $config[$url] : '',
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
    
    //Save configurations.

    for ($index = self::INDEX; $index <= self::MAX_INDEX; $index++) {

        $details = $form_state->getValue('social_network_details_' . $index);
        $url = 'social_network_url'. $index;
        $weight = 'social_network_weight_' . $index;
  
        $this->setConfigurationValue($url, $details[$url]);
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
            $url = 'social_network_url'. $index;
            $weight = 'social_network_weight_' . $index;

            if(empty($config[$url])) continue;
            
            $url_link  = $config[$url];

            if($this->social_items[$index] == 'mail'){
              $this->social_items[$index] = $this->social_items[$index] . "_outline";
              $url_link = 'mailto:' . $url_link;
            }

            $options[$index] = [
                'title' => $this->social_items[$index],
                'url' => $url_link,
                'weight' => !empty($config[$weight]) ? $config[$weight] : '',
            ];

        }
        
        $options = $this->usort($options);

        return [
            '#theme' => 'plexbasic_settings_social_networks',
            '#social_networks' => $options,
          ];
    }

    /**
     * Reorder by weight of the field
     */

     private function usort(array $options) : array {
        usort($options, function($a, $b) {
            return $a['weight'] <=> $b['weight'];
        });

        return $options;
     }
  
}