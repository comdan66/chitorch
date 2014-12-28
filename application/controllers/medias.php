<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
class Medias extends Site_controller {
  public function __construct () {
    parent::__construct ();
  }

  public function index ($y = 0) {
    $limit = 5;
    if (!$year = Media::find ('all', array ('group' => 'year', 'select' => 'year', 'order' => 'year ASC', 'limit' => '1', 'conditions' => array ('year = ?', $y ? $y : date ('Y')))))
      $year = Media::find ('all', array ('group' => 'year', 'select' => 'year', 'order' => 'year DESC', 'limit' => '1', 'conditions' => array ('year < ?', $y ? $y : date ('Y'))));
    if ($year) {
      $b = array_reverse (Media::find ('all', array ('group' => 'year', 'select' => 'year', 'order' => 'year DESC', 'limit' => floor ($limit / 2), 'conditions' => array ('year < ?', $year[0]->year))));
      $a = Media::find ('all', array ('group' => 'year', 'select' => 'year', 'order' => 'year ASC', 'limit' => $limit - count ($b) - 1, 'conditions' => array ('year > ?', $year[0]->year)));
      if (count ($a) < floor ($limit / 2)) 
        $b = array_reverse (Media::find ('all', array ('group' => 'year', 'select' => 'year', 'order' => 'year DESC', 'limit' => floor ($limit / 2) + floor ($limit / 2) - count ($a), 'conditions' => array ('year < ?', $year[0]->year))));

      $media_years = array_merge ($b, $year, $a);
      $year = $year[0];

      $medias = Media::find ('all', array ('conditions' => array ('year = ? AND is_enabled = ?', $year->year, 1)));
    } else {
      $a = $b = $media_years = $medias = array ();
      $year = null;
    }
    
    $this->load_view (array ('medias' => $medias, 'media_years' => $media_years, 'year' => $year, 'prev' => $b ? end ($b) : 0, 'next' => $a ? end (array_reverse ($a)) : 0));
  }
}
