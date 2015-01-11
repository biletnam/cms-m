<?php

class m150429_122353_cms48 extends CDbMigration
{
	public function up()
	{
        $this->dbConnection->createCommand("
            RENAME TABLE `bannerarea` TO `banner_area`;
        ")->execute();
        $this->dbConnection->createCommand("
            DROP TABLE IF EXISTS `catalog_brands`;
            DROP TABLE IF EXISTS `catalog_brands_collections`;
            ALTER TABLE `catalog_product` DROP COLUMN `brand`;
            ALTER TABLE `catalog_product` DROP COLUMN `brand_collection`;
            ALTER TABLE `catalog_pricetypes` DROP COLUMN `brand_id`;
        ")->execute();
        $this->dbConnection->createCommand("
            DELETE FROM `catalog_attribute_kind` WHERE `title` = 'Текст+картинка';
        ")->execute();
        $this->dbConnection->createCommand("
            CREATE TABLE IF NOT EXISTS `articles` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `title` varchar(256) NOT NULL,
              `annotation` varchar(512) NOT NULL,
              `content` text NOT NULL,
              `image` varchar(256) NOT NULL,
              `rubr_id` int(11) DEFAULT NULL,
              `sort_order` int(11) DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
            INSERT INTO `articles` (`title`, `annotation`, `content`, `image`, `rubr_id`, `sort_order`) VALUES
                ('Перевозка в условиях сильной бури', 'Мороженое поставляется в герметичной посуде, которая не боится температурных перепадов, а сайт-магазин - конкуренции.', '<p>Мороженое поставляется в герметичной посуде, которая не боится температурных перепадов, а сайт-магазин - конкуренции.</p>\r\n', '', NULL, 10),
                ('Правильный выбор вкуса', 'Ассортимент любой компании постоянно пополняется, а сайт поможет показать это эффективно.', '<p>Ассортимент любой компании постоянно пополняется, а сайт поможет показать это эффективно.</p>\r\n', '', NULL, 20),
                ('Выбор ингридиентов', 'Самый лучший подход к выбору - это начать разбираться в качестве продуктов и их составе.', '<p>Самый лучший подход к выбору - это начать разбираться в качестве продуктов и их составе.</p>\r\n', '', NULL, 30);
            CREATE TABLE IF NOT EXISTS `articles_config` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `feed_name` varchar(255) CHARACTER SET cp1251 DEFAULT NULL,
              `perpage` int(11) DEFAULT NULL,
              `imagesize_medium_x` int(11) DEFAULT NULL,
              `imagesize_medium_y` int(11) DEFAULT NULL,
              `imagesize_small_x` int(11) DEFAULT NULL,
              `imagesize_small_y` int(11) DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
            INSERT INTO `articles_config` (`id`, `feed_name`, `perpage`, `imagesize_medium_x`, `imagesize_medium_y`, `imagesize_small_x`, `imagesize_small_y`) VALUES
              (1, 'Статьи', 10, 200, 200, 100, 100);
            CREATE TABLE IF NOT EXISTS `articles_rubr` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `title` varchar(255) DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ")->execute();
        $this->dbConnection->createCommand("
            CREATE TABLE IF NOT EXISTS `area_block` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `name` varchar(255) DEFAULT NULL,
              `title` varchar(255) DEFAULT NULL,
              `area_id` int(11) DEFAULT NULL,
              `visible` tinyint(1) DEFAULT NULL,
              `content` text,
              `view` varchar(255) DEFAULT NULL,
              `sort_order` int(11) DEFAULT NULL,
              PRIMARY KEY (`id`),
              KEY `AREA` (`area_id`)
            ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
            DELETE FROM `area_block` WHERE `area_id` = 10;
            DELETE FROM `area_block` WHERE `area_id` = 12;
            DELETE FROM `area_block` WHERE `area_id` = 13;
            DELETE FROM `area` WHERE `id` = 13;
            INSERT INTO `area_block` (`name`, `title`, `area_id`, `visible`, `content`, `view`, `sort_order`) VALUES
                ('vk', 'vk', 10, 1, '<p><a href=\"#\"><img alt=\"\" src=\"/images/icon-vk.png\" style=\"height:41px; width:42px\" /></a></p>\r\n', 'areablocknotitle', 170),
                ('fb', 'fb', 10, 1, '<p><a href=\"#\"><img alt=\"\" src=\"/images/icon-fb.png\" style=\"height:41px; width:42px\" /></a></p>\r\n', 'areablocknotitle', 180),
                ('in', 'in', 10, 1, '<p><a href=\"#\"><img alt=\"\" src=\"/images/icon-in.png\" style=\"height:41px; width:42px\" /></a></p>\r\n', 'areablocknotitle', 190),
                ('tw', 'tw', 10, 1, '<p><a href=\"#\"><img alt=\"\" src=\"/images/icon-tw.png\" style=\"height:41px; width:42px\" /></a></p>\r\n', 'areablocknotitle', 200),
                ('o-kompanii-while-market', 'О компании \"While Market\"', 12, 1, '<div>\r\n<hr />\r\n<img alt=\"\" src=\"/images/icon-about.png\" style=\"height:68px; width:69px\" />\r\n<hr /></div>\r\n\r\n<p><a href=\"#\">О компании &quot;Whale Market&quot;</a></p>\r\n\r\n<p>Компания &quot;Whale Market&quot; создана для того, чтобы вы смогли в полной мере оценить информационное наполнение и функциональные возможности вашего будущего сайта. Созданный визуальный образ и предлагаемые товары на данной демонстрационной версии приведены для примера.</p>\r\n', 'areablocknotitle', 330),
                ('samoe-svezhee-i-vkusnoe-menju', 'Самое свежее и вкусное меню', 12, 1, '<div>\r\n<hr /><img alt=\"\" src=\"/images/icon-menu.png\" style=\"height:68px; width:69px\" />\r\n<hr /></div>\r\n\r\n<p><a href=\"#\">Самое свежее и вкусное меню</a></p>\r\n\r\n<p>Главное в любом магазине - качество. Но, не стоит забывать про такие нюансы как: красивая подача и актуальность. В нашем магазине море вкуса и разнообразного мороженого на любого капризного покупателя.</p>\r\n', 'areablocknotitle', 340),
                ('bystraja-i-besplatnaja-dostavka', 'Быстрая и бесплатная доставка', 12, 1, '<div><hr><img alt=\"\" src=\"/images/icon-delivery.png\" style=\"height:68px; width:69px\" /><hr></div>\r\n\r\n<p><a href=\"#\">Быстрая и бесплатная доставка</a></p>\r\n\r\n<p>Доставка осуществляется ежедневно и без перерывов на обед. Наша курьерская служба доставит заказ в любую точку океанских просторов.</p>\r\n', 'areablocknotitle', 350);
        ")->execute();
        $this->dbConnection->createCommand("
          TRUNCATE TABLE `banner_area`;
          INSERT INTO `banner_area` (`name`, `title`, `mode`, `queue`) VALUES
            ('slider-to-firstpage', 'slider-to-firstpage', 5, NULL);
          TRUNCATE TABLE `banners`;
        ")->execute();
        $this->dbConnection->createCommand("
            UPDATE `menu_item` SET `link` = '/callback' WHERE `link` = '/contacts';
        ")->execute();

	}

	public function down()
	{
        $this->dbConnection->createCommand("
            RENAME TABLE `banner_area` TO `bannerarea`;
        ")->execute();

        $this->dbConnection->createCommand("
        CREATE TABLE IF NOT EXISTS `catalog_brands` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) DEFAULT NULL,
            `link` varchar(255) NOT NULL,
            `image` varchar(255) NOT NULL,
            `country` varchar(255) NOT NULL,
            `text` varchar(1500) NOT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
        ")->execute();
        $this->dbConnection->createCommand("
        CREATE TABLE IF NOT EXISTS `catalog_brands_collections` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `link` varchar(255) NOT NULL,
            `brand_id` int(11) NOT NULL,
            `text` varchar(1500) NOT NULL,
            `sort_order` int(11) NOT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ")->execute();
            $this->dbConnection->createCommand("
            ALTER TABLE `catalog_product` ADD (
              `brand` int(11) DEFAULT NULL,
              `brand_collection` int(11) DEFAULT NULL
              );
            ALTER TABLE `catalog_pricetypes` ADD `brand_id` int(11) NOT NULL;
            ")->execute();
        $this->dbConnection->createCommand("
            INSERT INTO `catalog_attribute_kind` (`title`) VALUES ('Текст+картинка');
        ")->execute();
        $this->dbConnection->createCommand("
            DELETE FROM `articles`;
        ")->execute();
        $this->dbConnection->createCommand("
            UPDATE `menu_item` SET `link` = '/contacts' WHERE `link` = '/callback';
        ")->execute();
	}
}