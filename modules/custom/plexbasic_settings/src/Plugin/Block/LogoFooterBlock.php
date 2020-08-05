<?php
namespace Drupal\plexbasic_settings\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;

/**
 * Provides a Logo Footer Block for Plexbasic theme
 * 
 * @Block(
 *  id = "logo_footer_block",
 *  admin_label = @Translation("Logo Footer Block"),
 *  category = @Translation("Logo Footer"),
 * )
 */

class LogoFooterBlock extends BlockBase implements BlockPluginInterface {

   /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {

    $form = parent::blockForm($form, $form_state);

    $form['footer_logo'] = array(
        '#type' => 'managed_file',
        '#upload_location' => 'public://logo',
        '#title' => t('Footer Logo'),
        '#upload_validators' => [
            'file_validate_extensions' => ['png svg jpg jpeg gif']
        ],
        '#default_value' => isset($this->configuration['footer_logo']) ? $this->configuration['footer_logo'] : '',
        '#description' => $this->t('The Footer Logo to display'),
        '#required' => true
    );

    $form['footer_logo_title'] = [
        '#type' => 'textfield',
        '#title' => 'Title',
        '#default_value' => !empty($config['footer_logo_title']) ? $config['footer_logo_title'] : '',
        '#required' => false 
    ];

    $form['footer_logo_url'] = [
        '#type' => 'textfield',
        '#title' => 'URL',
        '#default_value' => !empty($config['footer_logo_url']) ? $config['footer_logo_url'] : '',
        '#required' => false 
    ];



    return $form;
  }

   /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    
    // Save Logo's as permanent
    $footer_logo = $form_state->getValue('footer_logo');
    if($footer_logo != $this->configuration['footer_logo']){
        if(!empty($footer_logo[0])){
            $file = File::load($footer_logo[0]);
            $file->setPermanent();
            $file->save();
        }
    }
    
    //Save configurations.
    $this->configuration['footer_logo'] = $form_state->getValue('footer_logo');
    $this->configuration['footer_logo_title'] = $form_state->getValue('footer_logo_title');
    $this->configuration['footer_logo_url'] = $form_state->getValue('footer_logo_url');
  }

    /**
     * {@inheritdoc}
     */
    public function build() {
        $config = $this->configuration;


        $footer_logo = $config['footer_logo'];
        if (!empty($footer_logo[0])) {
            if ($file = File::load($footer_logo[0])) {
                $logo_image_url = $file->url();
            }
        }
        if(!empty($logo_image_url )){
            
            return [
                '#theme' => 'plexbasic_settings_logo_footer',
                '#logo' => $logo_image_url,
                '#title' => !empty($config['footer_logo_title']) ? $config['footer_logo_title'] : '',
                '#url' => !empty($config['footer_logo_url']) ? $config['footer_logo_url'] : '',
            ];

        }else{
            return '';
        }
        

        return $build;
    }
  
}