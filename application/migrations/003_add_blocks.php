<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
class Migration_Add_blocks extends CI_Migration {
  public function up () {
    $sql = "CREATE TABLE `blocks` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
              `product_id` int(11) NOT NULL,
              `created_at` datetime NOT NULL DEFAULT '" . date ('Y-m-d H:i:s') . "',
              `updated_at` datetime NOT NULL DEFAULT '" . date ('Y-m-d H:i:s') . "',
              `type` int(11) NOT NULL DEFAULT '1',
              PRIMARY KEY (`id`),
              KEY `product_id_index` (`product_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
    $this->db->query ($sql);
  }
}