<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
class Site_controller extends Oa_controller {
  public function __construct () {
    parent::__construct ();
    $this->load->helper ('identity');

    $this->init_component_lists ('meta', 'css', 'javascript', 'hidden', 'footer')
         ->set_componemt_path ('component', 'site')
         ->set_frame_path ('frame', 'site')
         ->set_content_path ('content', 'site')
         ->set_public_path ('public')

         ->add_meta (array ('name' => 'format-detection', 'content' => 'telephone=no'))
         ->add_meta (array ('name' => 'format-detection', 'content' => 'address=no'))
         ->add_meta (array ('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0, maximum-scale=1.0'))
         ->add_meta (array ('name' => 'apple-mobile-web-app-capable', 'content' => 'yes'))
         ->add_meta (array ('name' => 'apple-mobile-web-app-status-bar-style', 'content' => 'black'))
         ->add_meta (array ('charset' => 'ISO-8859-1'))
         ->add_meta (array ('name' => 'description', 'content' => '奇拓'))
         ->add_meta (array ('name' => 'keywords', 'content' => '奇拓,chitorch,台北室內設計,室內裝潢,空間設計,住宅設計,居家裝潢,住家裝潢,設計整合,室內裝修,室內規劃,辦公室設計,裝修工程,商業空間設計'))

         ->set_title ('Lumiere')

         ->add_hidden (array ('id' => '_flash_message', 'value' => identity ()->get_session ('_flash_message', true)))
         ->_add_css ()
         ->_add_javascript ()
         ;
  }

  private function _add_css () {
    return $this
            ->add_css (base_url (array ('resource', 'site', 'css', 'main.css')))
            ->add_css (base_url (array ('resource', 'site', 'css', 'fontawesome.css')))
            ;
  }
  private function _add_javascript () {
    return $this->add_javascript (base_url (array ('resource', 'jquery_v1.10.2', 'jquery-1.10.2.min.js')))
                ->add_javascript (base_url (array ('resource', 'jquery-ui-1.10.3.custom', 'jquery-ui-1.10.3.custom.min.js')))
                ->add_javascript (base_url (array ('resource', 'jquery.jgrowl_v1.3.0', 'jquery.jgrowl.js')))
                ->add_javascript (base_url (array ('resource', 'site', 'js', 'slider.js')))
              
                ;
  }
  private function _add_footer () {
    return $this;
  }
}