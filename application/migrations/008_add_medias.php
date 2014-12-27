<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
class Migration_Add_medias extends CI_Migration {
  public function up () {
    $sql = "CREATE TABLE `medias` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
              `year` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
              `is_enabled` int(11) NOT NULL DEFAULT '1',
              `created_at` datetime NOT NULL DEFAULT '" . date ('Y-m-d H:i:s') . "',
              `updated_at` datetime NOT NULL DEFAULT '" . date ('Y-m-d H:i:s') . "',
              PRIMARY KEY (`id`),
              KEY `year_is_enabled_index` (`year`, `is_enabled`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
    $this->db->query ($sql);
  }
}