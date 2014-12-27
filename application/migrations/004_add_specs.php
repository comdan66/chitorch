<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
class Migration_Add_specs extends CI_Migration {
  public function up () {
    $sql = "CREATE TABLE `specs` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
              `content` text,
              `block_id` int(11) NOT NULL,
              `created_at` datetime NOT NULL DEFAULT '" . date ('Y-m-d H:i:s') . "',
              `updated_at` datetime NOT NULL DEFAULT '" . date ('Y-m-d H:i:s') . "',
              PRIMARY KEY (`id`),
              KEY `block_id_index` (`block_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
    $this->db->query ($sql);
  }
}