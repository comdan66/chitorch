<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
class Admin_controller extends Oa_controller {
  public function __construct () {
    parent::__construct ();
    $this->load->helper ('identity');
  
    $this->init_component_lists ('meta', 'css', 'javascript', 'hidden', 'footer')
         ->set_componemt_path ('component', 'admin')
         ->set_frame_path ('frame', 'admin')
         ->set_content_path ('content', 'admin')
         ->set_public_path ('public')
         
         ->add_meta (array ('http-equiv' => 'X-UA-Compatible', 'content' => 'IE=edge,chrome=1'))
         ->add_meta (array ('name' => 'viewport', 'content' => 'width=device-width'))
         ->add_meta (array ('name' => 'description', 'content' => 'Designa Studio, a HTML5 / CSS3 template.'))
         ->add_meta (array ('name' => 'author', 'content' => 'Sylvain Lafitte, Web Designer, sylvainlafitte.com'))

         ->set_title ('奇拓室內裝修設計 CHI-TORCH')

         ->add_hidden (array ('id' => '_flash_message', 'value' => identity ()->get_session ('_flash_message', true)))
         ->_add_css ()
         ->_add_javascript ()
         ;
  }

  private function _add_css () {
    return $this
            ->add_css ('http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700')
            ->add_css (base_url (array ('resource', 'admin', 'css', 'style.css')))
            ->add_css (base_url (array ('resource', 'admin', 'css', 'form.css')))
            ->add_css (base_url (array ('resource', 'admin', 'css', 'DropMenu05.css')))
            ->add_css (base_url (array ('resource', 'jquery.jgrowl_v1.3.0', 'jquery.jgrowl.css')))
            ;
  }
  private function _add_javascript () {
    return $this->add_javascript (base_url (array ('resource', 'jquery_v1.10.2', 'jquery-1.10.2.min.js')))
                ->add_javascript (base_url (array ('resource', 'jquery-ui-1.10.3.custom', 'jquery-ui-1.10.3.custom.min.js')))
                ->add_javascript (base_url (array ('resource', 'jquery.jgrowl_v1.3.0', 'jquery.jgrowl.js')))
                ->add_javascript (base_url (array ('resource', 'underscore_v1.7.0', 'underscore-min.js')))
                ;
  }
  private function _add_footer () {
    return $this;
  }
}