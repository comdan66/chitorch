<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
class Migration_Add_mpics extends CI_Migration {
  public function up () {
    $sql = "CREATE TABLE `mpics` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
              `media_id` int(11) NOT NULL,
              `created_at` datetime NOT NULL DEFAULT '" . date ('Y-m-d H:i:s') . "',
              `updated_at` datetime NOT NULL DEFAULT '" . date ('Y-m-d H:i:s') . "',
              PRIMARY KEY (`id`),
              KEY `media_id_index` (`media_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
    $this->db->query ($sql);
  }
}