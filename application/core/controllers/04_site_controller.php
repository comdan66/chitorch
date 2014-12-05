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
         ->set_title ('Lumiere')

         ->_add_css ()
         ->_add_javascript ()
         ->_add_footer ()
         ->add_hidden (array ('id' => '_flash_message', 'value' => identity ()->get_session ('_flash_message', true)))
         ;
  }

  private function _add_css () {
    return $this;
  }
  private function _add_javascript () {
    return $this->add_javascript (base_url (utilitySameLevelPath (REL_PATH_JS, 'jquery_v1.10.2', 'jquery-1.10.2.min.js')))

                ->add_javascript (base_url (utilitySameLevelPath (REL_PATH_JS, 'imgLiquid_v0.9.944', 'imgLiquid-min.js')))
                ->add_javascript (base_url (utilitySameLevelPath (REL_PATH_JS, 'jquery-timeago_v1.3.1', 'jquery.timeago.js')))
                ->add_javascript (base_url (utilitySameLevelPath (REL_PATH_JS, 'jquery-timeago_v1.3.1', 'locales', 'jquery.timeago.zh-TW.js')))

                ->add_javascript (base_url (utilitySameLevelPath (REL_PATH_JS . 'masonry_v3.1.2', 'masonry.pkgd.min.js')))
                ->add_javascript (base_url (utilitySameLevelPath (REL_PATH_JS . 'imagesloaded_v3.1.8', 'imagesloaded.pkgd.min.js')))
                ;
  }
  private function _add_footer () {
    return $this;
  }
}