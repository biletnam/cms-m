<?php

class m150608_122438_cmd48a extends CDbMigration
{
	public function up()
	{
		$this->dbConnection->createCommand("
		-- phpMyAdmin SQL Dump
		-- version 3.4.9
		-- http://www.phpmyadmin.net
		--
		-- Хост: localhost
		-- Время создания: Июн 08 2015 г., 15:26
		-- Версия сервера: 5.5.41
		-- Версия PHP: 5.6.7-1

		SET SQL_MODE=\"NO_AUTO_VALUE_ON_ZERO\";
		SET time_zone = \"+00:00\";

		--
		-- База данных: `eremin-stand4`
		--

		-- --------------------------------------------------------

		--
		-- Структура таблицы `area`
		--

		DROP TABLE IF EXISTS `area`;
		CREATE TABLE IF NOT EXISTS `area` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(255) DEFAULT NULL,
		  `title` varchar(255) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

		--
		-- Дамп данных таблицы `area`
		--

		INSERT INTO `area` (`id`, `name`, `title`) VALUES
		(3, 'telefony-v-shapke', 'Телефоны в шапке'),
		(7, 'preimuschestva-na-glavnoj', 'Преимущества на главной'),
		(8, 'dostupy-na-glavnoj', 'Доступы на главной'),
		(9, 'uslugi-na-glavnoj', 'Услуги на главной'),
		(10, 'sotsseti-v-podvale-shablona', 'Соцсети в подвале шаблона'),
		(11, 'zagolovok-v-shapke', 'Заголовок в шапке'),
		(12, 'o-kompanii', 'О компании'),
		(14, 'slogan', 'Слоган');

		-- --------------------------------------------------------

		--
		-- Структура таблицы `area_block`
		--

		DROP TABLE IF EXISTS `area_block`;
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
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=97 ;

		--
		-- Дамп данных таблицы `area_block`
		--

		INSERT INTO `area_block` (`id`, `name`, `title`, `area_id`, `visible`, `content`, `view`, `sort_order`) VALUES
		(45, 'vozmozhnost-zarekomendovat-sebja-dlja-naibolshego-chisla-potentsialnyh-klientov', 'Возможность зарекомендовать себя для наибольшего числа потенциальных клиентов', 7, 1, '<p>\r\n	Возможность зарекомендовать себя для наибольшего числа потенциальных клиентов</p>\r\n', 'areablocknotitle', 270),
		(46, 'sozdanie-progressivnogo-imidzha-dlja-kompanii', 'Создание прогрессивного имиджа для компании', 7, 1, '<p>\r\n	Создание прогрессивного имиджа для компании</p>\r\n', 'areablocknotitle', 280),
		(17, 'telefony', 'Телефоны', 3, 1, '<p><span>+7(8412)</span> 25 04 04</p>\r\n<p><span>+7(499)</span> 674 76 44</p>', 'areablocknotitle', 10),
		(38, 'fishpangram', 'Fishpangram', 11, 1, '<p>\r\n	Лучшая &ldquo;рыба&rdquo; для вашего бизнеса!</p>\r\n', 'areablock', 210),
		(96, 'bystraja-i-besplatnaja-dostavka', 'Быстрая и бесплатная доставка', 12, 1, '<div><hr><img alt=\"\" src=\"/images/icon-delivery.png\" style=\"height:68px; width:69px\" /><hr></div>\r\n\r\n<p><a href=\"#\">Быстрая и бесплатная доставка</a></p>\r\n\r\n<p>Доставка осуществляется ежедневно и без перерывов на обед. Наша курьерская служба доставит заказ в любую точку океанских просторов.</p>\r\n', 'areablocknotitle', 350),
		(90, 'vk', 'vk', 10, 1, '<p><a href=\"#\"><img alt=\"\" src=\"/images/icon-vk.png\" style=\"height:41px; width:42px\" /></a></p>\r\n', 'areablocknotitle', 170),
		(91, 'fb', 'fb', 10, 1, '<p><a href=\"#\"><img alt=\"\" src=\"/images/icon-fb.png\" style=\"height:41px; width:42px\" /></a></p>\r\n', 'areablocknotitle', 180),
		(92, 'in', 'in', 10, 1, '<p><a href=\"#\"><img alt=\"\" src=\"/images/icon-in.png\" style=\"height:41px; width:42px\" /></a></p>\r\n', 'areablocknotitle', 190),
		(93, 'tw', 'tw', 10, 1, '<p><a href=\"#\"><img alt=\"\" src=\"/images/icon-tw.png\" style=\"height:41px; width:42px\" /></a></p>\r\n', 'areablocknotitle', 200),
		(94, 'o-kompanii-while-market', 'О компании \"While Market\"', 12, 1, '<div>\r\n<hr />\r\n<img alt=\"\" src=\"/images/icon-about.png\" style=\"height:68px; width:69px\" />\r\n<hr /></div>\r\n\r\n<p><a href=\"#\">О компании &quot;Whale Market&quot;</a></p>\r\n\r\n<p>Компания &quot;Whale Market&quot; создана для того, чтобы вы смогли в полной мере оценить информационное наполнение и функциональные возможности вашего будущего сайта. Созданный визуальный образ и предлагаемые товары на данной демонстрационной версии приведены для примера.</p>\r\n', 'areablocknotitle', 330),
		(47, 'effektivnoe-prodvizhenie-predlagaemyh-uslug', 'Эффективное продвижение предлагаемых услуг', 7, 1, '<p>\r\n	Эффективное продвижение предлагаемых услуг</p>\r\n', 'areablocknotitle', 290),
		(48, 'uvelichenie-rynka-sbyta', 'Увеличение рынка сбыта', 7, 1, '<p>\r\n	Увеличение рынка сбыта</p>\r\n', 'areablocknotitle', 300),
		(49, 'rasshirenie-geografii-kompanii', 'Расширение географии компании', 7, 1, '<p>\r\n	Расширение географии компании</p>\r\n', 'areablocknotitle', 310),
		(50, 'slogan', 'Слоган', 14, 1, '<p>Образец вкуса в океане выбора!</p>\r\n', 'areablocknotitle', 320),
		(95, 'samoe-svezhee-i-vkusnoe-menju', 'Самое свежее и вкусное меню', 12, 1, '<div>\r\n<hr /><img alt=\"\" src=\"/images/icon-menu.png\" style=\"height:68px; width:69px\" />\r\n<hr /></div>\r\n\r\n<p><a href=\"#\">Самое свежее и вкусное меню</a></p>\r\n\r\n<p>Главное в любом магазине - качество. Но, не стоит забывать про такие нюансы как: красивая подача и актуальность. В нашем магазине море вкуса и разнообразного мороженого на любого капризного покупателя.</p>\r\n', 'areablocknotitle', 340);

		-- --------------------------------------------------------

		--
		-- Структура таблицы `articles`
		--

		DROP TABLE IF EXISTS `articles`;
		CREATE TABLE IF NOT EXISTS `articles` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `title` varchar(256) NOT NULL,
		  `annotation` varchar(512) NOT NULL,
		  `content` text NOT NULL,
		  `image` varchar(256) NOT NULL,
		  `rubr_id` int(11) DEFAULT NULL,
		  `sort_order` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

		--
		-- Дамп данных таблицы `articles`
		--

		INSERT INTO `articles` (`id`, `title`, `annotation`, `content`, `image`, `rubr_id`, `sort_order`) VALUES
		(8, 'Перевозка в условиях сильной бури', 'Мороженое поставляется в герметичной посуде, которая не боится температурных перепадов, а сайт-магазин - конкуренции.', '<p>Мороженое поставляется в герметичной посуде, которая не боится температурных перепадов, а сайт-магазин - конкуренции.</p>\r\n', '', NULL, 10),
		(9, 'Правильный выбор вкуса', 'Ассортимент любой компании постоянно пополняется, а сайт поможет показать это эффективно.', '<p>Ассортимент любой компании постоянно пополняется, а сайт поможет показать это эффективно.</p>\r\n', '', NULL, 20),
		(10, 'Выбор ингридиентов', 'Самый лучший подход к выбору - это начать разбираться в качестве продуктов и их составе.', '<p>Самый лучший подход к выбору - это начать разбираться в качестве продуктов и их составе.</p>\r\n', '', NULL, 30),
		(11, 'Тестовая статья 1', 'Тестовая статья 1 Тестовая статья 1', '<p>Тестовая статья 1&nbsp;Тестовая статья 1&nbsp;Тестовая статья 1&nbsp;Тестовая статья 1&nbsp;Тестовая статья 1 м&nbsp;Тестовая статья 1&nbsp;Тестовая статья 1</p>\r\n', '', NULL, 40),
		(12, 'Тестовая статья 2', 'Тестовая статья 2 Тестовая статья 2', '<p>Тестовая статья 2&nbsp;Тестовая статья 2&nbsp;Тестовая статья 2&nbsp;Тестовая статья 2&nbsp;Тестовая статья 2&nbsp;Тестовая статья 2</p>\r\n', '', NULL, 50),
		(13, 'Тестовая статья 3', 'Тестовая статья 3 Тестовая статья 3 Тестовая статья 3', '<p>Тестовая статья 3&nbsp;Тестовая статья 3&nbsp;Тестовая статья 3&nbsp;Тестовая статья 3&nbsp;Тестовая статья 3 м&nbsp;Тестовая статья 3</p>\r\n', '', NULL, 60),
		(14, 'Тестовая статья 4', 'Тестовая статья 4 Тестовая статья 4', '<p>Тестовая статья4Тестовая стат44м&nbsp;Тестовая статья 3&nbsp;Тес444товая ст4ья 3&nbsp;Тестовая статья 3&nbsp;Тестовая статья 3&nbsp;Тестовая статья 3</p>\r\n', '', NULL, 70),
		(15, 'Тестовая статья 5', 'Тестовая статья 5 Тестовая статья 5 Тестовая статья 5 м', '<p>Тестовая статья 5&nbsp;Тестовая статья 5&nbsp;Тестовая статья 5&nbsp;Тестовая статья 5&nbsp;Тестовая статья 5&nbsp;Тестовая статья 5</p>\r\n', '', NULL, 80),
		(16, 'Тестовая статья 6', 'Тестовая статья 6 Тестовая статья 6 Тестовая статья 6 Тестовая статья 6', '<p>Тестовая статья 6&nbsp;Тестовая статья 6&nbsp;Тестовая статья 6&nbsp;Тестовая статья 6&nbsp;Тестовая статья 6&nbsp;Тестовая статья 6&nbsp;Тестовая статья 6&nbsp;Тестовая статья 6&nbsp;Тестовая статья 6&nbsp;Тестовая статья 6&nbsp;Тестовая статья 6&nbsp;Тестовая статья 6</p>\r\n', '', NULL, 90);

		-- --------------------------------------------------------

		--
		-- Структура таблицы `articles_config`
		--

		DROP TABLE IF EXISTS `articles_config`;
		CREATE TABLE IF NOT EXISTS `articles_config` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `feed_name` varchar(255) CHARACTER SET cp1251 DEFAULT NULL,
		  `perpage` int(11) DEFAULT NULL,
		  `imagesize_medium_x` int(11) DEFAULT NULL,
		  `imagesize_medium_y` int(11) DEFAULT NULL,
		  `imagesize_small_x` int(11) DEFAULT NULL,
		  `imagesize_small_y` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

		--
		-- Дамп данных таблицы `articles_config`
		--

		INSERT INTO `articles_config` (`id`, `feed_name`, `perpage`, `imagesize_medium_x`, `imagesize_medium_y`, `imagesize_small_x`, `imagesize_small_y`) VALUES
		(1, 'Статьи', 7, 200, 200, 100, 100);

		-- --------------------------------------------------------

		--
		-- Структура таблицы `articles_rubr`
		--

		DROP TABLE IF EXISTS `articles_rubr`;
		CREATE TABLE IF NOT EXISTS `articles_rubr` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `title` varchar(255) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

		-- --------------------------------------------------------

		--
		-- Структура таблицы `banners`
		--

		DROP TABLE IF EXISTS `banners`;
		CREATE TABLE IF NOT EXISTS `banners` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(255) DEFAULT NULL,
		  `title` varchar(255) DEFAULT NULL,
		  `image` varchar(255) DEFAULT NULL,
		  `link` varchar(255) DEFAULT NULL,
		  `code` text,
		  `content_type` int(11) DEFAULT NULL,
		  `views` int(11) DEFAULT NULL,
		  `clicks` int(11) DEFAULT NULL,
		  `notactive` tinyint(1) DEFAULT NULL,
		  `sort_order` int(11) DEFAULT NULL,
		  `bannerarea` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

		-- --------------------------------------------------------

		--
		-- Структура таблицы `banner_area`
		--

		DROP TABLE IF EXISTS `banner_area`;
		CREATE TABLE IF NOT EXISTS `banner_area` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(255) DEFAULT NULL,
		  `title` varchar(255) DEFAULT NULL,
		  `mode` int(11) DEFAULT NULL,
		  `widget` varchar(255) DEFAULT NULL,
		  `queue` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

		--
		-- Дамп данных таблицы `banner_area`
		--

		INSERT INTO `banner_area` (`id`, `name`, `title`, `mode`, `widget`, `queue`) VALUES
		(1, 'slider-to-firstpage', 'slider-to-firstpage', 5, NULL, NULL);

		-- --------------------------------------------------------

		--
		-- Структура таблицы `callback_config`
		--

		DROP TABLE IF EXISTS `callback_config`;
		CREATE TABLE IF NOT EXISTS `callback_config` (
		  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
		  `enabled` tinyint(1) NOT NULL,
		  `type` varchar(255) NOT NULL,
		  `host` varchar(255) NOT NULL,
		  `username` varchar(255) NOT NULL,
		  `password` varchar(255) NOT NULL,
		  `port` varchar(255) NOT NULL,
		  `encryption` varchar(255) NOT NULL,
		  `sender` varchar(255) NOT NULL,
		  `verify_code` tinyint(1) DEFAULT '0',
		  `email` varchar(255) NOT NULL,
		  `timeout` varchar(255) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

		--
		-- Дамп данных таблицы `callback_config`
		--

		INSERT INTO `callback_config` (`id`, `enabled`, `type`, `host`, `username`, `password`, `port`, `encryption`, `sender`, `verify_code`, `email`, `timeout`) VALUES
		(1, 1, 'php', '', '', '', '', '', 'Сайт Визитка', 1, 'eremin10093@yandex.ru', '');

		-- --------------------------------------------------------

		--
		-- Структура таблицы `catalog_attribute`
		--

		DROP TABLE IF EXISTS `catalog_attribute`;
		CREATE TABLE IF NOT EXISTS `catalog_attribute` (
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
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

		--
		-- Дамп данных таблицы `catalog_attribute`
		--

		INSERT INTO `catalog_attribute` (`id`, `title`, `id_attribute_kind`, `required`, `name`, `alphasort`, `sort_order`, `on_filter`, `on_table`) VALUES
		(1, 'атрибут1', 1, 0, 'atribut1', 0, 30, 1, 1),
		(2, 'атрибут2', 1, 0, 'atribut2', 0, 20, 1, 1),
		(3, 'атрибут3', 1, 0, 'atribut3', 0, 10, 1, 1);

		-- --------------------------------------------------------

		--
		-- Структура таблицы `catalog_attribute_kind`
		--

		DROP TABLE IF EXISTS `catalog_attribute_kind`;
		CREATE TABLE IF NOT EXISTS `catalog_attribute_kind` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

		--
		-- Дамп данных таблицы `catalog_attribute_kind`
		--

		INSERT INTO `catalog_attribute_kind` (`id`, `title`) VALUES
		(1, 'Значение'),
		(2, 'Текстовое поле'),
		(3, 'Список'),
		(4, 'Множественный выбор'),
		(5, 'Флаг');

		-- --------------------------------------------------------

		--
		-- Структура таблицы `catalog_attribute_value`
		--

		DROP TABLE IF EXISTS `catalog_attribute_value`;
		CREATE TABLE IF NOT EXISTS `catalog_attribute_value` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `id_attribute` int(11) unsigned NOT NULL,
		  `value` varchar(256) NOT NULL,
		  `sort_order` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`),
		  KEY `FK_catalog_attribute_value` (`id_attribute`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

		-- --------------------------------------------------------

		--
		-- Структура таблицы `catalog_category`
		--

		DROP TABLE IF EXISTS `catalog_category`;
		CREATE TABLE IF NOT EXISTS `catalog_category` (
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
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

		--
		-- Дамп данных таблицы `catalog_category`
		--

		INSERT INTO `catalog_category` (`id`, `parent_id`, `title`, `long_title`, `link`, `image`, `layout`, `product_view`, `keywords`, `description`, `text`, `sort_order`) VALUES
		(1, 0, 'Мороженое', '', 'morozhenoe', 'add72b7babd2a8fbabe39afeb0a31e70.png', 'morozhenoe', 0, '', '', '', 10),
		(4, 0, 'Сорбет', '', 'sorbet', 'ebfdd67bb615e7061b6e878e84cf14d7.png', 'sorbet', 0, '', '', '', 20),
		(5, 0, 'Торты', '', 'torty', '527b4cd974f63eb18836a6d12b81e07e.png', 'torty', 0, '', '', '', 30),
		(6, 1, 'Развесное', '', 'razvesnoe', 'add72b7babd2a8fbabe39afeb0a31e70.png', 'razvesnoe', 0, '', '', '', 40),
		(7, 1, 'В рожке', '', 'v-rozhke', 'add72b7babd2a8fbabe39afeb0a31e70.png', 'v-rozhke', 0, '', '', '', 50),
		(8, 1, 'На палочке', '', 'na-palochke', 'add72b7babd2a8fbabe39afeb0a31e70.png', 'na-palochke', 0, '', '', '', 60);

		-- --------------------------------------------------------

		--
		-- Структура таблицы `catalog_category_attribute`
		--

		DROP TABLE IF EXISTS `catalog_category_attribute`;
		CREATE TABLE IF NOT EXISTS `catalog_category_attribute` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `id_category` int(11) DEFAULT NULL,
		  `id_attribute` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

		-- --------------------------------------------------------

		--
		-- Структура таблицы `catalog_category_existparam`
		--

		DROP TABLE IF EXISTS `catalog_category_existparam`;
		CREATE TABLE IF NOT EXISTS `catalog_category_existparam` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `category_id` int(11) DEFAULT NULL,
		  `existparam` text,
		  PRIMARY KEY (`id`),
		  KEY `category_id` (`category_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

		-- --------------------------------------------------------

		--
		-- Структура таблицы `catalog_config`
		--

		DROP TABLE IF EXISTS `catalog_config`;
		CREATE TABLE IF NOT EXISTS `catalog_config` (
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
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

		--
		-- Дамп данных таблицы `catalog_config`
		--

		INSERT INTO `catalog_config` (`id`, `title`, `keywords`, `description`, `text`, `layout`, `cat_perpage`, `product_perpage`, `c_image_small_w`, `c_image_small_h`, `p_image_middle_w`, `p_image_middle_h`, `p_image_small_w`, `p_image_small_h`, `watermark_image`, `watermark_x`, `watermark_y`, `no_watermark`) VALUES
		(1, 'Каталог продукции', 'Ключевые слова', 'Описание общее', '', '//layouts/main', 6, 6, 200, 200, 270, 270, 150, 150, 'a716f49112379c4e237e5a224eb3b55f.png', 50, 50, 1);

		-- --------------------------------------------------------

		--
		-- Структура таблицы `catalog_image`
		--

		DROP TABLE IF EXISTS `catalog_image`;
		CREATE TABLE IF NOT EXISTS `catalog_image` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `id_product` int(11) unsigned NOT NULL,
		  `image` varchar(256) NOT NULL,
		  PRIMARY KEY (`id`),
		  KEY `FK_catalog_image` (`id_product`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

		-- --------------------------------------------------------

		--
		-- Структура таблицы `catalog_priceprofile`
		--

		DROP TABLE IF EXISTS `catalog_priceprofile`;
		CREATE TABLE IF NOT EXISTS `catalog_priceprofile` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(255) DEFAULT NULL,
		  `factor` float DEFAULT NULL,
		  `corrector` float DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

		-- --------------------------------------------------------

		--
		-- Структура таблицы `catalog_pricetypes`
		--

		DROP TABLE IF EXISTS `catalog_pricetypes`;
		CREATE TABLE IF NOT EXISTS `catalog_pricetypes` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(255) NOT NULL,
		  `ident_field` varchar(10) NOT NULL,
		  `price_field` varchar(10) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

		--
		-- Дамп данных таблицы `catalog_pricetypes`
		--

		INSERT INTO `catalog_pricetypes` (`id`, `name`, `ident_field`, `price_field`) VALUES
		(1, 'Type', '55555', '55555'),
		(2, '0g', '0', '0'),
		(3, 'dgvdfv', 'B', 'C');

		-- --------------------------------------------------------

		--
		-- Структура таблицы `catalog_product`
		--

		DROP TABLE IF EXISTS `catalog_product`;
		CREATE TABLE IF NOT EXISTS `catalog_product` (
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
		  `hide` int(11) DEFAULT NULL,
		  `noyml` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`),
		  KEY `FK_catalog_product` (`id_category`),
		  KEY `hide` (`hide`),
		  KEY `title` (`title`(255))
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

		--
		-- Дамп данных таблицы `catalog_product`
		--

		INSERT INTO `catalog_product` (`id`, `number`, `link`, `title`, `keywords`, `photo`, `description`, `id_category`, `sort_order`, `date_added`, `on_main`, `recomended`, `hit`, `price`, `currency`, `priceprofile`, `article`, `old_price`, `views`, `hide`, `noyml`) VALUES
		(9, '', 'dfgdfg', 'dfgdfg', '', '', '<p>dgdfgdfg</p>\r\n', 2, 90, 1430316532, 0, NULL, NULL, 98790000000, 0, NULL, '', NULL, NULL, 0, 0),
		(12, '', 'dobryj-pingvin-razvesnoe', '«Добрый пингвин» развесное', '', '5c54a188936e386af3ac18501094ad1b.png', '', 1, 120, 1430990985, 1, NULL, NULL, 100, 0, NULL, '', NULL, 175, 0, 0),
		(13, '', 'morskaja-feerija-v-rozhke', '«Морская феерия» в рожке', '', 'f5f727695b18b0f5e5718356754296b0.png', '', 1, 130, 1430991039, 1, NULL, NULL, 150, 0, NULL, '', NULL, 44, 0, 0),
		(14, '', 'fruktovaja-volna-na-palochke', '«Фруктовая волна» на палочке', '', '295f242c5000561dd94fbee9dcdd911d.png', '', 1, 140, 1430991089, 1, NULL, NULL, 150, 0, NULL, '', NULL, 26, 0, 0),
		(15, '', 'okeanskij-briz-na-palochke', '«Океанский Бриз» на палочке', '', '28a95cba0c38978ec33e0b900fd3e27e.png', '', 1, 150, 1430991108, 1, NULL, NULL, 160, 0, NULL, '', NULL, 8, 0, 0),
		(16, '', 'koralovyj-rif-razvesnoe', '«Кораловый риф» развесное', '', 'ea6951ca5af23c0b6c02b5ddd2276075.png', '', 1, 160, 1430991126, 1, NULL, NULL, 120, 0, NULL, '', NULL, 12, 0, 0),
		(17, '', 'rajskij-pljazh-v-rozhke', '«Райский пляж»  в рожке', '', '784fe45083b84c62aca1b8a95cc8503b.png', '', 1, 170, 1430991146, 1, NULL, NULL, 170, 0, NULL, '', NULL, 9, 0, 0),
		(18, '', 'sorbet-sorbet-razvesnoe', 'Сорбет-сорбет развесное', '', 'a168e3cf7333066efcb594cb8e6d4dca.png', '<p>Сорбет сорбет сорбет</p>\r\n', 1, 180, 1432203438, 0, NULL, NULL, 150, 0, NULL, '', NULL, 3, 0, 0);

		-- --------------------------------------------------------

		--
		-- Структура таблицы `catalog_product_attribute`
		--

		DROP TABLE IF EXISTS `catalog_product_attribute`;
		CREATE TABLE IF NOT EXISTS `catalog_product_attribute` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `id_product` int(11) unsigned NOT NULL,
		  `id_attribute` int(11) unsigned NOT NULL,
		  `value` varchar(256) NOT NULL,
		  `image` varchar(256) DEFAULT NULL,
		  PRIMARY KEY (`id`),
		  KEY `FK_catalog_product_attribute` (`id_attribute`),
		  KEY `FK_catalog_product_attributes` (`id_product`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

		-- --------------------------------------------------------

		--
		-- Структура таблицы `catalog_relatedproducts`
		--

		DROP TABLE IF EXISTS `catalog_relatedproducts`;
		CREATE TABLE IF NOT EXISTS `catalog_relatedproducts` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `product_id` int(11) DEFAULT NULL,
		  `related_product` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

		--
		-- Дамп данных таблицы `catalog_relatedproducts`
		--

		INSERT INTO `catalog_relatedproducts` (`id`, `product_id`, `related_product`) VALUES
		(1, 6, 4),
		(2, 4, 6),
		(3, 6, 5),
		(4, 5, 6),
		(5, 10, 2),
		(6, 2, 10),
		(7, 10, 1),
		(8, 1, 10),
		(9, 10, 3),
		(10, 3, 10);

		-- --------------------------------------------------------

		--
		-- Структура таблицы `catalog_reviews`
		--

		DROP TABLE IF EXISTS `catalog_reviews`;
		CREATE TABLE IF NOT EXISTS `catalog_reviews` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `product_id` int(11) DEFAULT NULL,
		  `user_id` int(11) DEFAULT NULL,
		  `text` varchar(1000) DEFAULT NULL,
		  `rating` float DEFAULT NULL,
		  `date` int(11) DEFAULT NULL,
		  `published` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`),
		  KEY `product_id` (`product_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

		-- --------------------------------------------------------

		--
		-- Структура таблицы `config`
		--

		DROP TABLE IF EXISTS `config`;
		CREATE TABLE IF NOT EXISTS `config` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `sitename` varchar(255) DEFAULT NULL,
		  `author` varchar(255) DEFAULT NULL,
		  `adminonly` int(11) DEFAULT NULL,
		  `mainpage_id` int(11) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

		--
		-- Дамп данных таблицы `config`
		--

		INSERT INTO `config` (`id`, `sitename`, `author`, `adminonly`, `mainpage_id`) VALUES
		(1, 'Интернет Магазин', 'plusodin-web', 0, 16);

		-- --------------------------------------------------------

		--
		-- Структура таблицы `menu`
		--

		DROP TABLE IF EXISTS `menu`;
		CREATE TABLE IF NOT EXISTS `menu` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `title` varchar(128) NOT NULL,
		  `name` varchar(128) NOT NULL,
		  `items_template` varchar(255) DEFAULT NULL,
		  `activeitem_class` varchar(255) DEFAULT NULL,
		  `firstitem_class` varchar(255) DEFAULT NULL,
		  `lastitem_class` varchar(255) DEFAULT NULL,
		  PRIMARY KEY (`id`),
		  UNIQUE KEY `NAME` (`name`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

		--
		-- Дамп данных таблицы `menu`
		--

		INSERT INTO `menu` (`id`, `title`, `name`, `items_template`, `activeitem_class`, `firstitem_class`, `lastitem_class`) VALUES
		(1, 'Главное меню', 'main', '<div class=\"item-layout\"><span class=\"bullet\"></span>{menu}</div>', '', 'home', '');

		-- --------------------------------------------------------

		--
		-- Структура таблицы `menu_item`
		--

		DROP TABLE IF EXISTS `menu_item`;
		CREATE TABLE IF NOT EXISTS `menu_item` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `title` varchar(128) NOT NULL DEFAULT '',
		  `link` varchar(128) NOT NULL DEFAULT '',
		  `parent_id` int(11) NOT NULL,
		  `menu_id` int(11) unsigned NOT NULL,
		  `sort_order` int(11) unsigned NOT NULL DEFAULT '0',
		  PRIMARY KEY (`id`),
		  KEY `PARENT` (`parent_id`),
		  KEY `MENU` (`menu_id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

		--
		-- Дамп данных таблицы `menu_item`
		--

		INSERT INTO `menu_item` (`id`, `title`, `link`, `parent_id`, `menu_id`, `sort_order`) VALUES
		(22, 'О компании', '/about', 0, 1, 80),
		(27, 'Статьи', '/articles', 0, 1, 110),
		(29, 'Каталог', '/catalog', 0, 1, 90),
		(32, 'Доставка и оплата', '/payments', 0, 1, 100),
		(33, 'Контакты', '/callback', 0, 1, 120);

		-- --------------------------------------------------------

		--
		-- Структура таблицы `news`
		--

		DROP TABLE IF EXISTS `news`;
		CREATE TABLE IF NOT EXISTS `news` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `title` varchar(255) NOT NULL,
		  `link` varchar(255) NOT NULL,
		  `date` datetime NOT NULL,
		  `annotation` varchar(255) NOT NULL,
		  `description` text NOT NULL,
		  `meta_keywords` text NOT NULL,
		  `meta_description` text NOT NULL,
		  `public` tinyint(1) NOT NULL,
		  `cover_id` int(11) NOT NULL,
		  PRIMARY KEY (`id`),
		  UNIQUE KEY `link` (`link`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

		--
		-- Дамп данных таблицы `news`
		--

		INSERT INTO `news` (`id`, `title`, `link`, `date`, `annotation`, `description`, `meta_keywords`, `meta_description`, `public`, `cover_id`) VALUES
		(1, 'Первая новость', 'pervaja-novost', '2015-01-28 21:36:18', 'Первая новость! Первая новость!', '<div>\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit veritatis reprehenderit perspiciatis, corporis recusandae velit nisi natus maxime reiciendis, obcaecati, quis dignissimos. Magnam, accusantium, quaerat! Voluptatibus dolores cupiditate nihil doloribus amet, minima necessitatibus a quasi recusandae. Est quibusdam ducimus minus ex delectus eius consequuntur laborum doloremque a? Aliquam illo modi quasi laborum ea numquam totam facere voluptatibus at quas? Facilis at labore voluptatum aperiam magnam nostrum, eos culpa cupiditate odio distinctio unde, porro ullam quas enim, accusamus suscipit velit. Quis corporis nostrum debitis, incidunt mollitia alias, non adipisci quas eum. Praesentium blanditiis nam qui minus ratione dolorum ab aut architecto maxime aperiam culpa a dolores sint maiores fugit officia, mollitia sed dolore necessitatibus quas excepturi ut optio facilis? Delectus, illo, enim. Non possimus quaerat eum reiciendis inventore perspiciatis nemo ad maxime nulla quae. In placeat pariatur fugit. Soluta labore hic adipisci eius repellat fugit natus, ex quod dolorum expedita, facere non veritatis accusamus animi minima exercitationem omnis voluptatibus illum suscipit impedit. Earum quod, nihil sint quam voluptatem a in provident. Expedita ab recusandae culpa velit deserunt cum maiores quod, soluta dolorem assumenda commodi beatae. Deleniti neque necessitatibus dolores non omnis excepturi magnam, beatae, aut mollitia esse voluptatibus maxime! Harum numquam doloremque assumenda officiis optio. Ratione illum ut harum excepturi mollitia iure vero esse modi, laudantium, praesentium eligendi neque possimus animi, sint non reprehenderit fuga vel dolores nemo. Repellat rem esse maiores veniam pariatur deleniti vero distinctio sequi non tempora ab quis repudiandae quaerat recusandae minima quibusdam totam suscipit molestias nulla, modi porro nisi reprehenderit cum quisquam. Facilis, ullam. Incidunt voluptate molestias quisquam, consectetur laboriosam excepturi quis numquam aliquam exercitationem similique inventore voluptates quibusdam accusantium voluptatibus esse nulla sapiente itaque doloribus, obcaecati tempore animi, praesentium asperiores. Deserunt tempora, ratione laboriosam fugit ex cum fugiat sed culpa temporibus totam dicta eius, alias!</div>\r\n<div>\r\n	&nbsp;</div>\r\n', 'one news', 'one news', 1, 4),
		(2, 'Вторая новость', 'vtoraja-novost', '2015-01-28 21:39:17', 'Вторая новость! Вторая новость', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, a facilis tenetur. Hic quam placeat optio dolores esse facilis quis eius aspernatur iusto dolor, aut quos est. Enim inventore officia alias incidunt quis magni molestiae, consectetur vel, dolore, cum quibusdam, itaque ipsam architecto illo qui reprehenderit officiis numquam quisquam natus. Quia culpa eaque esse! Expedita officia cum incidunt doloremque, explicabo, harum delectus a nostrum. Ipsam reprehenderit adipisci, provident ipsum voluptate optio quibusdam vel necessitatibus dignissimos repudiandae officiis cupiditate velit quo consequuntur eos mollitia deserunt nesciunt asperiores cum quisquam? Repellat vel officiis architecto eius voluptatum perspiciatis sit. Quasi consequuntur vitae vel officiis quam voluptatem suscipit sunt, animi asperiores quidem, placeat ipsa odio consequatur minima voluptatum nulla amet ad libero. Quod praesentium incidunt, odio inventore. Reiciendis illum repudiandae eligendi fugiat explicabo dolor rerum adipisci natus vero eius obcaecati quam, distinctio, neque dolore dicta eaque suscipit numquam hic! Consectetur aspernatur vel reiciendis quisquam hic odit saepe nemo, voluptatem totam tenetur, sunt harum ratione neque eius vero dolorum, exercitationem nesciunt accusamus veritatis quod laborum ab error debitis quibusdam repudiandae. Eius perspiciatis fuga quis, autem, excepturi aliquam dolore rerum ullam. Recusandae quaerat odio atque sed, ipsam est assumenda, tenetur. Illum nisi ullam iusto dignissimos saepe.</p>\r\n', 'second news', 'second news', 1, 7),
		(3, 'Третья новость', 'tretja-novost', '2015-01-28 21:41:40', 'Третья новость! Третья новость!', '<div>\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum corporis sit odit hic consequuntur eaque pariatur tenetur possimus sunt quaerat, accusantium unde sapiente aut! Natus id explicabo, perspiciatis sapiente ad, ratione, fuga fugiat velit illo numquam quos. Magni error nisi eveniet fugiat magnam dicta accusamus nulla repellendus cum possimus quam ex sint repudiandae unde labore cumque blanditiis, soluta, porro culpa amet quod! Earum aspernatur alias quas vero adipisci temporibus sint maiores, pariatur placeat debitis dolorem atque soluta doloribus est, sequi quae facere minus cum laudantium. Vero, ipsam cumque nihil, ut sequi, pariatur repellendus tempora, eaque laborum libero voluptas ex! Vero tempore quod quos, qui pariatur beatae dolorem. Laudantium impedit sed assumenda, accusamus recusandae tenetur possimus pariatur nisi quia iure vero, voluptatum ipsum eius, maiores blanditiis eaque. Unde velit quis quas nulla totam possimus itaque dolore! Neque exercitationem, fugiat sapiente facilis repellat natus! Aspernatur sequi labore velit asperiores ipsa aliquam, veritatis.</div>\r\n<div>\r\n	&nbsp;</div>\r\n', 'third news', 'third news', 1, 10),
		(4, 'Четвертая новость', 'chetvertaja-novost', '2015-01-28 21:43:58', 'Четвертая новость! Четвертая новость!', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto ratione molestiae eos minus veniam excepturi! Veniam perferendis itaque atque blanditiis. Ipsa, sed autem veniam pariatur, quibusdam voluptatem totam dolor nesciunt corporis aut nemo laboriosam odio a perspiciatis unde iusto laudantium asperiores consequatur! Esse neque sunt facilis aliquam saepe voluptatum, adipisci magnam earum quos eos dolor, quo itaque quaerat, quasi vitae voluptates. Ipsum rerum hic distinctio doloribus quibusdam officiis dolores laborum magni iure sapiente repellendus eius praesentium consectetur minus nihil atque, ut repudiandae, debitis eveniet commodi. Dignissimos suscipit minus voluptatibus. Dolor, pariatur ab, debitis dicta, similique beatae alias quibusdam, necessitatibus magnam nam officia. Quia, sapiente, necessitatibus. Facere sit pariatur aspernatur quas corporis ratione quam libero, nam, reiciendis a, ad rem illum modi. Dolorem totam sapiente odio non perspiciatis eaque, assumenda temporibus minus, placeat autem quod recusandae illo molestiae alias, possimus voluptatum nobis, mollitia dolor iste sequi cumque. Ratione veniam fuga id corporis voluptatibus illo, laboriosam dolor est, laudantium voluptatem, distinctio modi dolores, dicta mollitia itaque fugit ipsam quae eos. Earum, molestiae, qui? Temporibus dolor laboriosam illum unde dicta eligendi debitis nulla dignissimos veniam libero, ratione eveniet pariatur quod sint doloribus? Maiores aspernatur molestias error tempora fugit libero tenetur nam atque in!</p>\r\n', 'fourth news', 'fourth news', 1, 13),
		(5, 'Пятая новость', 'pjataja-novost', '2015-01-28 21:45:40', 'Пятая новость! Пятая новость!', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita nostrum odit voluptates, iste reiciendis fugiat cupiditate perspiciatis eos, possimus officiis sint sapiente rem. Neque labore cupiditate aut harum voluptates asperiores? Fuga laboriosam nostrum, necessitatibus tempora, in omnis tenetur adipisci nemo. Numquam amet qui, ipsum, aut quidem nihil accusantium laudantium cum tempore soluta ab at? Distinctio similique vel iste, officiis velit accusamus dolorem neque ea esse necessitatibus sunt consequuntur nulla ab deleniti fuga! Quae cumque repudiandae id a suscipit incidunt consectetur deserunt quas molestiae, accusantium ea itaque perferendis libero neque quia maiores debitis explicabo placeat, laudantium similique! Eum placeat reiciendis quisquam, sapiente. Voluptatem rerum eligendi quos velit, laboriosam deserunt maxime architecto placeat consequuntur sint enim, inventore omnis iste numquam assumenda odio a temporibus voluptatum animi, ducimus eveniet nam doloremque repudiandae! Asperiores ratione suscipit libero nemo vel, neque porro incidunt eum recusandae a. Est suscipit a quam vel. Maxime animi sunt officia!</p>\r\n', 'fifth news', 'fifth news', 1, 19);

		-- --------------------------------------------------------

		--
		-- Структура таблицы `news_config`
		--

		DROP TABLE IF EXISTS `news_config`;
		CREATE TABLE IF NOT EXISTS `news_config` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `title` varchar(255) NOT NULL,
		  `view_count` int(11) NOT NULL,
		  `widget_count` int(11) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

		--
		-- Дамп данных таблицы `news_config`
		--

		INSERT INTO `news_config` (`id`, `title`, `view_count`, `widget_count`) VALUES
		(1, 'Новости', 4, 4);

		-- --------------------------------------------------------

		--
		-- Структура таблицы `news_images`
		--

		DROP TABLE IF EXISTS `news_images`;
		CREATE TABLE IF NOT EXISTS `news_images` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `news_id` int(11) NOT NULL,
		  `filename` varchar(255) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

		--
		-- Дамп данных таблицы `news_images`
		--

		INSERT INTO `news_images` (`id`, `news_id`, `filename`) VALUES
		(1, 1, '08aa843bb2a6ec8b31cda93500eef93e.jpg'),
		(2, 1, '53b6cd0934c2747a54a774b20b36cb68.jpg'),
		(3, 1, '1369201584fb888d2f58048788f6ff56.jpg'),
		(4, 1, 'fe04fe509b043636ba496efdf46ea9c8.jpg'),
		(5, 1, '47de74c3ff9782f885f05ac5b4bb0e75.jpg'),
		(6, 1, '8cc296ad24afdedb079f263c8c112b3c.jpg'),
		(7, 2, '0178125257b6cfd5f263cdefe958d0ed.jpg'),
		(8, 2, 'b8838269e2c778a3a2468b829de55149.jpg'),
		(9, 2, '0e2f6cc285afae0a145548d4b3375c3d.jpg'),
		(10, 3, '0eddc119608bd2cd09be6167687c2c18.jpg'),
		(11, 3, 'be478c9793fc8b963c0a3497a198d665.jpg'),
		(12, 3, '57c7c56d01739b59bc0d432512be3376.jpg'),
		(13, 4, '6e55a5e707ffb377f1ae743f4778ebe3.jpg'),
		(14, 4, '55854c893b5e56239a17b059ccd4fd49.jpg'),
		(15, 4, 'dfa677166f66975aef25e733cc4dc5c7.jpg'),
		(16, 4, 'f08d3674b8b0d0fd2dbdd5d90c7217fd.jpg'),
		(17, 4, 'e8904df57c6fe11ea1b3926265e3f468.jpg'),
		(18, 4, '14e212c35a15d72c3f47d4aaac2255dc.jpg'),
		(19, 5, '0b77edb288605d9be794eee960f2c44f.jpg'),
		(20, 5, '1100677950a0f8bf7451960defbc6ca1.jpg'),
		(21, 5, 'c724cd0717e0ebe4e7da6cb225c7b032.jpg'),
		(22, 5, '65ca6e578db6aecde58c2ff7f2852fe2.jpg');

		-- --------------------------------------------------------

		--
		-- Структура таблицы `orders`
		--

		DROP TABLE IF EXISTS `orders`;
		CREATE TABLE IF NOT EXISTS `orders` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `number` varchar(255) DEFAULT NULL,
		  `date` datetime DEFAULT NULL,
		  `customer` int(11) DEFAULT NULL,
		  `status` int(11) DEFAULT NULL,
		  `delivery` int(11) DEFAULT NULL,
		  `comments` text,
		  `sum` float DEFAULT NULL,
		  `admin_remark` text,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

		--
		-- Дамп данных таблицы `orders`
		--

		INSERT INTO `orders` (`id`, `number`, `date`, `customer`, `status`, `delivery`, `comments`, `sum`, `admin_remark`) VALUES
		(11, NULL, '2015-03-23 17:34:02', 14, 0, NULL, '12312', 53, NULL);

		-- --------------------------------------------------------

		--
		-- Структура таблицы `order_cart`
		--

		DROP TABLE IF EXISTS `order_cart`;
		CREATE TABLE IF NOT EXISTS `order_cart` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `session_id` varchar(255) DEFAULT NULL,
		  `product_id` int(11) DEFAULT NULL,
		  `price` float DEFAULT NULL,
		  `quantity` int(11) DEFAULT NULL,
		  `date` datetime DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

		--
		-- Дамп данных таблицы `order_cart`
		--

		INSERT INTO `order_cart` (`id`, `session_id`, `product_id`, `price`, `quantity`, `date`) VALUES
		(32, '8b5pq7apko4g080n2asn3q0de6', 15, 160, 5, '2015-06-03 17:41:39'),
		(30, 'tl0fibr9tqh0o9rqm40kehi6u2', 12, 100, 10, '2015-06-03 16:56:25'),
		(31, '8b5pq7apko4g080n2asn3q0de6', 16, 120, 2, '2015-06-03 17:38:55'),
		(33, '8b5pq7apko4g080n2asn3q0de6', 13, 150, 2, '2015-06-03 18:05:31'),
		(26, 'tl0fibr9tqh0o9rqm40kehi6u2', 17, 170, 24, '2015-06-03 15:15:43');

		-- --------------------------------------------------------

		--
		-- Структура таблицы `order_config`
		--

		DROP TABLE IF EXISTS `order_config`;
		CREATE TABLE IF NOT EXISTS `order_config` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `notice_email` varchar(255) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

		--
		-- Дамп данных таблицы `order_config`
		--

		INSERT INTO `order_config` (`id`, `notice_email`) VALUES
		(1, 'dispetcher.bikow@yandex.ru');

		-- --------------------------------------------------------

		--
		-- Структура таблицы `order_customers`
		--

		DROP TABLE IF EXISTS `order_customers`;
		CREATE TABLE IF NOT EXISTS `order_customers` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(255) DEFAULT NULL,
		  `email` varchar(255) DEFAULT NULL,
		  `adress` varchar(1000) DEFAULT NULL,
		  `phone` varchar(255) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

		--
		-- Дамп данных таблицы `order_customers`
		--

		INSERT INTO `order_customers` (`id`, `name`, `email`, `adress`, `phone`) VALUES
		(3, 'name', 'dispetcher.bikow@yandex.ru', '', '435345345'),
		(14, '123123', '123123@mail.ru', '123123', '123123'),
		(5, 'sadfsdfvsdf', 'sfsfs@mail.ru', '', '123213123'),
		(10, 'jtju', 'eremin_100_93@mail.ru', '', '123213123');

		-- --------------------------------------------------------

		--
		-- Структура таблицы `order_delivery`
		--

		DROP TABLE IF EXISTS `order_delivery`;
		CREATE TABLE IF NOT EXISTS `order_delivery` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `title` varchar(255) DEFAULT NULL,
		  `price` float DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

		-- --------------------------------------------------------

		--
		-- Структура таблицы `order_positions`
		--

		DROP TABLE IF EXISTS `order_positions`;
		CREATE TABLE IF NOT EXISTS `order_positions` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `order_id` int(11) DEFAULT NULL,
		  `title` varchar(255) DEFAULT NULL,
		  `fullLink` varchar(1000) NOT NULL,
		  `article` varchar(255) DEFAULT NULL,
		  `price` float DEFAULT NULL,
		  `quantity` int(11) DEFAULT NULL,
		  `product_id` int(11) DEFAULT NULL,
		  `attributes` text,
		  `complectation` text,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

		--
		-- Дамп данных таблицы `order_positions`
		--

		INSERT INTO `order_positions` (`id`, `order_id`, `title`, `fullLink`, `article`, `price`, `quantity`, `product_id`, `attributes`, `complectation`) VALUES
		(12, 11, 'Новый товар', '/catalog/hhjk/novyj-tovar.html', '55555', 53, 1, 1, NULL, NULL);

		-- --------------------------------------------------------

		--
		-- Структура таблицы `page`
		--

		DROP TABLE IF EXISTS `page`;
		CREATE TABLE IF NOT EXISTS `page` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `parent_id` int(11) unsigned NOT NULL,
		  `link` varchar(128) NOT NULL DEFAULT '',
		  `title` varchar(512) NOT NULL DEFAULT '',
		  `content` longtext,
		  `keywords` varchar(1000) DEFAULT NULL,
		  `description` varchar(1000) DEFAULT NULL,
		  `layout` varchar(255) DEFAULT NULL,
		  `view` varchar(255) DEFAULT NULL,
		  PRIMARY KEY (`id`),
		  UNIQUE KEY `LINK` (`link`),
		  KEY `PARENT` (`parent_id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

		--
		-- Дамп данных таблицы `page`
		--

		INSERT INTO `page` (`id`, `parent_id`, `link`, `title`, `content`, `keywords`, `description`, `layout`, `view`) VALUES
		(16, 0, 'main', 'Главная', '', 'Главная', 'Главная', 'first_page', 'notitle'),
		(28, 0, 'about', 'О компании', '<p>Данный текст предназначен для того, чтобы было хорошо и ясно видно, как будут выглядеть стили текста. Делается это для того, чтобы заказчик, дизайнер и верстальщик правильно поняли друг друга и не было потом никаких вопросов и претензий типа &laquo;я думал, что это будет выглядеть по-другому&raquo; и так далее...</p>\r\n\r\n<p>Здесь, например, можно увидеть, каким будет абзац основного текста. Просим обратить внимание на межстрочное расстояние, отступ первой строки, выравнивание, расстояние между абзацами. Также важна сама гарнитура основного шрифта, кегль (размер).</p>\r\n\r\n<h2>Заголовок 2</h2>\r\n\r\n<p>Заголовок, который Вы видите выше имеет стиль заголовка 2. Такова будет его гарнитура, начертание, отступы, размер.</p>\r\n\r\n<h3>Заголовок 3</h3>\r\n\r\n<p>Внутри текста могут быть фразы, выделенные&nbsp;<strong>жирным шрифтом</strong>. Также могут быть&nbsp;<em>слова и целые предложения выделенные курсивом</em>. В тексте могут встречаться&nbsp;<a href=\"#\">ссылки</a>.</p>\r\n\r\n<p><img alt=\"\" src=\"/upload/userfiles/images/5db3e490174425bbc83cc2b5087eeb33.png\" style=\"float:left; height:180px; width:180px\" />Текст может содержать рисунки. Они могут быть помещены в текст с обтеканием или без, иметь выравнивание влево, вправо или по центру. Имеет значение рамка вокруг рисунка, ее цвет, толщина, и начертание (сплошная, пунктирная и т. д.), отступ картинки от рамки и отстсупы. рамки от обрамляющего текста.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Также текст может содержать таблицы:</p>\r\n\r\n<table style=\"background-color:rgb(231, 222, 196); border-collapse:collapse; border-spacing:0px; border:1px solid rgb(233, 141, 64); color:rgb(101, 62, 43); font-family:arial; font-size:14px; font-stretch:inherit; line-height:14px; margin:0px 0px 10px; padding:0px; vertical-align:baseline; width:634px\">\r\n</table>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:600px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\" style=\"text-align:center\">Заголовок 1</th>\r\n			<th scope=\"col\" style=\"text-align:center\">Заголовок 2</th>\r\n			<th scope=\"col\" style=\"text-align:center\">Заголовок 3</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:center\">Содержание 1.1</td>\r\n			<td style=\"text-align:center\">Содержание 2.1</td>\r\n			<td style=\"text-align:center\">Содержание 3.1</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">Содержание 1.2</td>\r\n			<td style=\"text-align:center\">Содержание 2.2</td>\r\n			<td style=\"text-align:center\">Содержание 3.2</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">Содержание 1.3</td>\r\n			<td style=\"text-align:center\">Содержание 2.3</td>\r\n			<td style=\"text-align:center\">Содержание 3.3</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">Содержание 1.4</td>\r\n			<td style=\"text-align:center\">Содержание 2.4</td>\r\n			<td style=\"text-align:center\">Содержание 3.4</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">Содержание 1.5</td>\r\n			<td style=\"text-align:center\">Содержание 2.5</td>\r\n			<td style=\"text-align:center\">Содержание 3.5</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">Содержание 1.6</td>\r\n			<td style=\"text-align:center\">Содержание 2.6</td>\r\n			<td style=\"text-align:center\">Содержание 3.6</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Таблица может иметь разные стили рамки, отступы внутри ячеек, расстояния между ячейками, заголовок таблицы, цвет фона ячеек и другие параметры.</p>\r\n\r\n<p>В тексте может присутствовать список. в нем надо обратить внимание на:</p>\r\n\r\n<ul>\r\n	<li>отступы списка относительно окружающего текста;</li>\r\n	<li>тип списка: нумерованный числами, буквами, размеченный маркерами;</li>\r\n	<li>отступы каждого элемента списка слева, справа, сверху и снизу;</li>\r\n	<li>вид, форма, цвет маркера</li>\r\n</ul>\r\n\r\n<p>Это, пожалуй, все. Желаем Вам, чтобы Ваш текст выглядел красиво, презентабельно, информативно. Чтобы его было приятно, удобно и полезно читать!</p>\r\n', 'О компании', 'О компании', 'main', 'view'),
		(30, 0, 'content', 'Наполнение сайта', '<p>\r\n	<em>Страница в разработке.</em></p>\r\n', 'Наполнение сайта', 'Наполнение сайта', 'main', 'view'),
		(36, 0, 'service', 'Услуги', '<p>\r\n	<em>Страница в разработке.</em></p>\r\n', 'Услуги', 'Услуги', 'main', 'view'),
		(37, 0, 'contact', 'Контактная информация', '<p><em>Страница в разработке.</em></p>\r\n', 'Контактная информация', 'Контактная информация', 'main', 'view'),
		(38, 0, 'payments', 'Доставка и оплата', '', '', '', 'main', 'view');

		-- --------------------------------------------------------

		--
		-- Структура таблицы `tbl_migration`
		--

		DROP TABLE IF EXISTS `tbl_migration`;
		CREATE TABLE IF NOT EXISTS `tbl_migration` (
		  `version` varchar(180) NOT NULL,
		  `apply_time` int(11) DEFAULT NULL,
		  PRIMARY KEY (`version`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;

		--
		-- Дамп данных таблицы `tbl_migration`
		--

		INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
		('m150111_124333_base', 1420981433),
		('m150129_075132_create_news_tables', 1422605841),
		('m150311_100857_cms21', 1426069459),
		('m150311_123200_cms22', 1426513098),
		('m150316_124252_cms15', 1426849206),
		('m150323_122302_cms18', 1427113719),
		('m150323_135704_cms22a', 1427120195),
		('m150330_133713_cms37', 1427722925),
		('m150415_091214_cms36', 1429712142),
		('m150416_090337_cms33', 1429712142),
		('m150429_122353_cms48', 1432030212);

		-- --------------------------------------------------------

		--
		-- Структура таблицы `user`
		--

		DROP TABLE IF EXISTS `user`;
		CREATE TABLE IF NOT EXISTS `user` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `username` varchar(255) DEFAULT NULL,
		  `email` varchar(255) NOT NULL,
		  `password` varchar(255) DEFAULT NULL,
		  `salt` varchar(255) NOT NULL,
		  `role` varchar(255) DEFAULT NULL,
		  `status` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

		--
		-- Дамп данных таблицы `user`
		--

		INSERT INTO `user` (`id`, `username`, `email`, `password`, `salt`, `role`, `status`) VALUES
		(1, 'admin', 'dimon9107@yandex.ru', '2656a196fb1f511628fe61365bf596db', '54862c1be6f582.03655350', 'admin', 1);

		-- --------------------------------------------------------

		--
		-- Структура таблицы `yamarket_offersettings`
		--

		DROP TABLE IF EXISTS `yamarket_offersettings`;
		CREATE TABLE IF NOT EXISTS `yamarket_offersettings` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `product_id` int(11) DEFAULT NULL,
		  `store` int(11) DEFAULT NULL,
		  `pickup` int(11) DEFAULT NULL,
		  `local_delivery_cost` float DEFAULT NULL,
		  `sales_notes` varchar(50) DEFAULT NULL,
		  `manufacturer_warranty` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`),
		  KEY `product_id` (`product_id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

		--
		-- Дамп данных таблицы `yamarket_offersettings`
		--

		INSERT INTO `yamarket_offersettings` (`id`, `product_id`, `store`, `pickup`, `local_delivery_cost`, `sales_notes`, `manufacturer_warranty`) VALUES
		(1, 1, 0, 1, 450, 'pometka', 1);

		-- --------------------------------------------------------

		--
		-- Структура таблицы `yamarket_shopsettings`
		--

		DROP TABLE IF EXISTS `yamarket_shopsettings`;
		CREATE TABLE IF NOT EXISTS `yamarket_shopsettings` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(20) DEFAULT NULL,
		  `company` varchar(255) DEFAULT NULL,
		  `local_delivery_cost` float DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

		--
		-- Дамп данных таблицы `yamarket_shopsettings`
		--

		INSERT INTO `yamarket_shopsettings` (`id`, `name`, `company`, `local_delivery_cost`) VALUES
		(1, 'Магазин номер один', 'shop number one', 500);
		")->execute();

	}

	public function down()
	{
		
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}