<?php

class m150311_123200_cms22 extends CDbMigration
{
	public function up()
	{
		$this->getDbConnection()->createCommand(
		"CREATE TABLE IF NOT EXISTS `catalog_attribute` (
    	  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    	  `title` varchar(256) NOT NULL,
    	  `id_attribute_kind` int(11) unsigned NOT NULL,
    	  `required` int(1) NOT NULL,
    	  `name` varchar(255) DEFAULT NULL,
    	  `alphasort` int(11) DEFAULT NULL,
    	  `sort_order` int(11) DEFAULT NULL,
    	  `on_filter` int(1) NOT NULL,
    	  `on_table` int(1) NOT NULL,
		  PRIMARY KEY (`id`),
		  KEY `FK_catalog_attribute` (`id_attribute_kind`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		")->execute();

		$this->getDbConnection()->createCommand(
		"CREATE TABLE IF NOT EXISTS `catalog_attribute_kind` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
		")->execute();

		$this->getDbConnection()->createCommand(
		"INSERT INTO `catalog_attribute_kind` (`id`, `title`) VALUES
			(1, 'Значение'),
			(2, 'Текстовое поле'),
			(3, 'Список'),
			(4, 'Множественный выбор'),
			(5, 'Флаг'),
			(6, 'Текст+картинка');
		")->execute();

		$this->getDbConnection()->createCommand(
		"CREATE TABLE IF NOT EXISTS `catalog_attribute_value` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `id_attribute` int(11) unsigned NOT NULL,
		  `value` varchar(256) NOT NULL,
		  `sort_order` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`),
		  KEY `FK_catalog_attribute_value` (`id_attribute`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		")->execute();

		$this->getDbConnection()->createCommand(
		"CREATE TABLE IF NOT EXISTS `catalog_brands` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(255) DEFAULT NULL,
		  `link` varchar(255) NOT NULL,
		  `image` varchar(255) NOT NULL,
		  `country` varchar(255) NOT NULL,
		  `text` varchar(1500) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
		")->execute();

		$this->getDbConnection()->createCommand(
		"CREATE TABLE IF NOT EXISTS `catalog_brands_collections` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(255) NOT NULL,
		  `link` varchar(255) NOT NULL,
		  `brand_id` int(11) NOT NULL,
		  `text` varchar(1500) NOT NULL,
		  `sort_order` int(11) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		")->execute();

		$this->getDbConnection()->createCommand(
		"CREATE TABLE IF NOT EXISTS `catalog_category` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `parent_id` int(11) unsigned NOT NULL DEFAULT '0',
		  `title` varchar(256) NOT NULL,
		  `long_title` varchar(256) NOT NULL,
		  `link` varchar(256) NOT NULL,
		  `image` varchar(256) DEFAULT NULL,
		  `layout` varchar(255) DEFAULT NULL,
		  `product_view` int(1) NOT NULL,
		  `keywords` varchar(1000) DEFAULT NULL,
		  `description` varchar(1000) DEFAULT NULL,
		  `text` text,
		  `sort_order` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`),
		  KEY `FK_catalog_category` (`parent_id`),
		  KEY `title` (`title`(255)),
		  KEY `link` (`link`(255))
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		")->execute();

		$this->getDbConnection()->createCommand(
		"CREATE TABLE IF NOT EXISTS `catalog_category_attribute` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `id_category` int(11) DEFAULT NULL,
		  `id_attribute` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		")->execute();

		$this->getDbConnection()->createCommand(
		"CREATE TABLE IF NOT EXISTS `catalog_category_existparam` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `category_id` int(11) DEFAULT NULL,
		  `existparam` text,
		  PRIMARY KEY (`id`),
		  KEY `category_id` (`category_id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
		")->execute();

		$this->getDbConnection()->createCommand(
		"CREATE TABLE IF NOT EXISTS `catalog_config` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `title` varchar(255) DEFAULT NULL,
		  `keywords` varchar(1000) DEFAULT NULL,
		  `description` varchar(1000) DEFAULT NULL,
		  `text` text,
		  `layout` varchar(255) DEFAULT NULL,
		  `cat_perpage` int(11) DEFAULT NULL,
		  `product_perpage` int(11) DEFAULT NULL,
		  `c_image_small_w` int(11) DEFAULT NULL,
		  `c_image_small_h` int(11) DEFAULT NULL,
		  `p_image_middle_w` int(11) DEFAULT NULL,
		  `p_image_middle_h` int(11) DEFAULT NULL,
		  `p_image_small_w` int(11) DEFAULT NULL,
		  `p_image_small_h` int(11) DEFAULT NULL,
		  `watermark_image` varchar(1000) DEFAULT NULL,
		  `watermark_x` int(11) DEFAULT NULL,
		  `watermark_y` int(11) DEFAULT NULL,
		  `no_watermark` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		")->execute();

		/* Set default catalog config */
		$this->getDbConnection()->createCommand(
		"INSERT INTO `catalog_config` 
		(`id`, `title`, `keywords`, `description`,
		 `text`, `layout`, `cat_perpage`, `product_perpage`, 
		 `c_image_small_w`, `c_image_small_h`, `p_image_middle_w`, 
		 `p_image_middle_h`, `p_image_small_w`, `p_image_small_h`, 
		 `watermark_image`, `watermark_x`, `watermark_y`, `no_watermark`) 
		VALUES
		(1, 'Каталог продукции', 'Ключевые слова', 'Описание общее', '',
		 '//layouts/main', 20, 20, 200, 200, 270, 270, 150, 150,
		  'a716f49112379c4e237e5a224eb3b55f.png', 50, 50, 1);
		")->execute();

		$this->getDbConnection()->createCommand(
		"CREATE TABLE IF NOT EXISTS `catalog_image` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `id_product` int(11) unsigned NOT NULL,
		  `image` varchar(256) NOT NULL,
		  PRIMARY KEY (`id`),
		  KEY `FK_catalog_image` (`id_product`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		")->execute();

		$this->getDbConnection()->createCommand(
		"CREATE TABLE IF NOT EXISTS `catalog_priceprofile` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(255) DEFAULT NULL,
		  `factor` float DEFAULT NULL,
		  `corrector` float DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8;
		")->execute();

		$this->getDbConnection()->createCommand(
		"CREATE TABLE IF NOT EXISTS `catalog_pricetypes` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(255) NOT NULL,
		  `ident_field` varchar(10) NOT NULL,
		  `price_field` varchar(10) NOT NULL,
		  `brand_id` int(11) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		")->execute();

		$this->getDbConnection()->createCommand(
		"CREATE TABLE IF NOT EXISTS `catalog_product` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `number` varchar(64) NOT NULL,
		  `link` varchar(255) NOT NULL,
		  `title` varchar(256) NOT NULL,
		  `keywords` text NOT NULL,
		  `photo` varchar(256) DEFAULT NULL,
		  `description` text,
		  `id_category` int(11) unsigned NOT NULL,
		  `sort_order` int(11) NOT NULL,
		  `date_added` int(11) NOT NULL,
		  `on_main` int(1) DEFAULT NULL,
		  `recomended` int(1) DEFAULT NULL,
		  `hit` int(1) DEFAULT NULL,
		  `price` float DEFAULT '0',
		  `currency` int(11) NOT NULL,
		  `priceprofile` int(11) DEFAULT NULL,
		  `article` varchar(255) DEFAULT NULL,
		  `old_price` float DEFAULT NULL,
		  `views` int(11) DEFAULT NULL,
		  `brand` int(11) DEFAULT NULL,
		  `brand_collection` int(11) DEFAULT NULL,
		  `hide` int(11) DEFAULT NULL,
		  `noyml` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`),
		  KEY `FK_catalog_product` (`id_category`),
		  KEY `brand` (`brand`),
		  KEY `hide` (`hide`),
		  KEY `title` (`title`(255))
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		")->execute();

		$this->getDbConnection()->createCommand(
		"CREATE TABLE IF NOT EXISTS `catalog_product_attribute` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `id_product` int(11) unsigned NOT NULL,
		  `id_attribute` int(11) unsigned NOT NULL,
		  `value` varchar(256) NOT NULL,
		  `image` varchar(256) DEFAULT NULL,
		  PRIMARY KEY (`id`),
		  KEY `FK_catalog_product_attribute` (`id_attribute`),
		  KEY `FK_catalog_product_attributes` (`id_product`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		")->execute();

		$this->getDbConnection()->createCommand(
		"CREATE TABLE IF NOT EXISTS `catalog_relatedproducts` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `product_id` int(11) DEFAULT NULL,
		  `related_product` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8;
		")->execute();

		$this->getDbConnection()->createCommand(
		"CREATE TABLE IF NOT EXISTS `catalog_reviews` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `product_id` int(11) DEFAULT NULL,
		  `user_id` int(11) DEFAULT NULL,
		  `text` varchar(1000) DEFAULT NULL,
		  `rating` float DEFAULT NULL,
		  `date` int(11) DEFAULT NULL,
		  `published` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`),
		  KEY `product_id` (`product_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8;
		")->execute();


	}

	public function down()
	{
		$this->getDbConnection()->createCommand(
		"DROP TABLE `catalog_attribute`;
		")->execute();

		$this->getDbConnection()->createCommand(
		"DROP TABLE `catalog_attribute_kind`;
		")->execute();

		$this->getDbConnection()->createCommand(
		"DROP TABLE `catalog_attribute_value`;
		")->execute();

		$this->getDbConnection()->createCommand(
		"DROP TABLE `catalog_brands`;
		")->execute();

		$this->getDbConnection()->createCommand(
		"DROP TABLE `catalog_brands_collections`;
		")->execute();

		$this->getDbConnection()->createCommand(
		"DROP TABLE `catalog_category`;
		")->execute();

		$this->getDbConnection()->createCommand(
		"DROP TABLE `catalog_category_attribute`;
		")->execute();

		$this->getDbConnection()->createCommand(
		"DROP TABLE `catalog_category_existparam`;
		")->execute();

		$this->getDbConnection()->createCommand(
		"DROP TABLE `catalog_config`;
		")->execute();

		$this->getDbConnection()->createCommand(
		"DROP TABLE `catalog_image`;
		")->execute();

		$this->getDbConnection()->createCommand(
		"DROP TABLE `catalog_priceprofile`;
		")->execute();

		$this->getDbConnection()->createCommand(
		"DROP TABLE `catalog_pricetypes`;
		")->execute();

		$this->getDbConnection()->createCommand(
		"DROP TABLE `catalog_product`;
		")->execute();

		$this->getDbConnection()->createCommand(
		"DROP TABLE `catalog_product_attribute`;
		")->execute();

		$this->getDbConnection()->createCommand(
		"DROP TABLE `catalog_relatedproducts`;
		")->execute();

		$this->getDbConnection()->createCommand(
		"DROP TABLE `catalog_reviews`;
		")->execute();
	}
}