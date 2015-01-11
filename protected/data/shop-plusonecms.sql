-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 15 2015 г., 12:28
-- Версия сервера: 5.5.41
-- Версия PHP: 5.4.39-0+deb7u2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `shop-plusonecms`
--

-- --------------------------------------------------------

--
-- Структура таблицы `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

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
(14, 'slogan', 'Слоган'),
(15, 'kontakty', 'Контакты');

-- --------------------------------------------------------

--
-- Структура таблицы `area_block`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=98 ;

--
-- Дамп данных таблицы `area_block`
--

INSERT INTO `area_block` (`id`, `name`, `title`, `area_id`, `visible`, `content`, `view`, `sort_order`) VALUES
(45, 'vozmozhnost-zarekomendovat-sebja-dlja-naibolshego-chisla-potentsialnyh-klientov', 'Возможность зарекомендовать себя для наибольшего числа потенциальных клиентов', 7, 1, '<p>Возможность зарекомендовать себя для наибольшего числа потенциальных клиентов</p>\r\n\r\n<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>', 'areablocknotitle', 270),
(46, 'sozdanie-progressivnogo-imidzha-dlja-kompanii', 'Создание прогрессивного имиджа для компании', 7, 1, '<p>\r\n	Создание прогрессивного имиджа для компании</p>\r\n', 'areablocknotitle', 280),
(17, 'telefony', 'Телефоны', 3, 1, '<p>+7(8412) 25&nbsp;04 04</p>\r\n\r\n<p>+7(499) 674 76 44</p>\r\n', 'areablocknotitle', 10),
(38, 'fishpangram', 'Fishpangram', 11, 1, '<p>\r\n	Лучшая &ldquo;рыба&rdquo; для вашего бизнеса!</p>\r\n', 'areablock', 210),
(96, 'bystraja-i-besplatnaja-dostavka', 'Быстрая и бесплатная доставка', 12, 1, '<div>\r\n<hr /><img alt="" src="/images/icon-delivery.png" style="height:68px; width:69px" />\r\n<hr /></div>\r\n\r\n<h2>Быстрая и бесплатная доставка</h2>\r\n\r\n<p>Доставка осуществляется ежедневно и без перерывов на обед. Наша курьерская служба доставит заказ в любую точку океанских просторов.</p>\r\n', 'areablocknotitle', 350),
(90, 'vk', 'vk', 10, 1, '<p><a href="#"><img alt="" src="/images/icon-vk.png" style="height:41px; width:42px" /></a></p>\r\n', 'areablocknotitle', 170),
(91, 'fb', 'fb', 10, 1, '<p><a href="#"><img alt="" src="/images/icon-fb.png" style="height:41px; width:42px" /></a></p>\r\n', 'areablocknotitle', 180),
(92, 'in', 'in', 10, 1, '<p><a href="#"><img alt="" src="/images/icon-in.png" style="height:41px; width:42px" /></a></p>\r\n', 'areablocknotitle', 190),
(93, 'tw', 'tw', 10, 1, '<p><a href="#"><img alt="" src="/images/icon-tw.png" style="height:41px; width:42px" /></a></p>\r\n', 'areablocknotitle', 200),
(94, 'o-kompanii-while-market', 'О компании "While Market"', 12, 1, '<div>\r\n<hr /><img alt="" src="/images/icon-about.png" style="height:68px; width:69px" />\r\n<hr /></div>\r\n\r\n<h2>О компании &quot;Whale Market&quot;</h2>\r\n\r\n<p>Компания &quot;Whale Market&quot; создана для того, чтобы вы смогли в полной мере оценить информационное наполнение и функциональные возможности вашего будущего сайта. Созданный визуальный образ и предлагаемые товары на данной демонстрационной версии приведены для примера.</p>\r\n', 'areablocknotitle', 330),
(47, 'effektivnoe-prodvizhenie-predlagaemyh-uslug', 'Эффективное продвижение предлагаемых услуг', 7, 1, '<p>\r\n	Эффективное продвижение предлагаемых услуг</p>\r\n', 'areablocknotitle', 290),
(48, 'uvelichenie-rynka-sbyta', 'Увеличение рынка сбыта', 7, 1, '<p>\r\n	Увеличение рынка сбыта</p>\r\n', 'areablocknotitle', 300),
(49, 'rasshirenie-geografii-kompanii', 'Расширение географии компании', 7, 1, '<p>\r\n	Расширение географии компании</p>\r\n', 'areablocknotitle', 310),
(50, 'slogan', 'Слоган', 14, 1, '<p>Образец вкуса в океане выбора!</p>\r\n', 'areablocknotitle', 320),
(95, 'samoe-svezhee-i-vkusnoe-menju', 'Самое свежее и вкусное меню', 12, 1, '<div>\r\n<hr /><img alt="" src="/images/icon-menu.png" style="height:68px; width:69px" />\r\n<hr /></div>\r\n\r\n<h2>Самое свежее и вкусное меню</h2>\r\n\r\n<p>Главное в любом магазине - качество. Но, не стоит забывать про такие нюансы как: красивая подача и актуальность. В нашем магазине море вкуса и разнообразного мороженого на любого капризного покупателя.</p>\r\n', 'areablocknotitle', 340),
(97, 'kontakty', 'Контакты', 15, 1, '<p>Телефон: +7 (8412) 25 04 04, +7 (499) 322 34 04</p>\r\n\r\n<p>Адрес: г. Пенза, ул. Кураева 1а, 3 этаж</p>\r\n\r\n<p>E-mail:&nbsp;info@plusonedev.ru</p>\r\n', 'areablocknotitle', 360);

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `annotation` varchar(512) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(256) NOT NULL,
  `rubr_id` int(11) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `annotation`, `content`, `image`, `rubr_id`, `sort_order`) VALUES
(8, 'Перевозка в условиях сильной бури', 'Мороженое поставляется в герметичной посуде, которая не боится температурных перепадов, а сайт-магазин - конкуренции.', '<p>Мороженое поставляется в герметичной посуде, которая не боится температурных перепадов, а сайт-магазин - конкуренции.</p>\r\n', '5925b1abf8365353434695177814bd58.png', NULL, 10),
(9, 'Правильный выбор вкуса', 'Ассортимент любой компании постоянно пополняется, а сайт поможет показать это эффективно.', '<p>Ассортимент любой компании постоянно пополняется, а сайт поможет показать это эффективно.</p>\r\n', '7e018825a03f4d9f82ccbd21bb38cea5.png', NULL, 30),
(10, 'Выбор ингридиентов', 'Самый лучший подход к выбору - это начать разбираться в качестве продуктов и их составе.', '<p>Самый лучший подход к выбору - это начать разбираться в качестве продуктов и их составе.</p>\r\n', '166b457895896f15c157ab67cf6b8722.png', NULL, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `articles_config`
--

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
(1, 'Статьи', 5, 200, 200, 100, 100);

-- --------------------------------------------------------

--
-- Структура таблицы `articles_rubr`
--

CREATE TABLE IF NOT EXISTS `articles_rubr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `banners`
--

INSERT INTO `banners` (`id`, `name`, `title`, `description`, `image`, `link`, `code`, `content_type`, `views`, `clicks`, `notactive`, `sort_order`, `bannerarea`) VALUES
(4, 'ba', 'Баннер1', '', 'adeb30e5f971bef5eec59730d3e4668b.png', '', '', 1, 3, NULL, 0, 20, 1),
(2, 'banner2', 'Баннер2', '', '9c691efa1d722e2a931f2c87c6bffafb.png', '', '', 1, 5, NULL, 0, 30, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `banner_area`
--

CREATE TABLE IF NOT EXISTS `banner_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `mode` int(11) DEFAULT NULL,
  `widget` varchar(255) DEFAULT NULL,
  `queue` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `banner_area`
--

INSERT INTO `banner_area` (`id`, `name`, `title`, `mode`, `widget`, `queue`) VALUES
(1, 'slider-to-firstpage', 'slider-to-firstpage', 5, '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `callback_config`
--

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
(1, 1, 'php', '', '', '', '', '', 'Интернет магазин', 1, 'no-reply@plusonedev.ru', '');

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_attribute`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `catalog_attribute`
--

INSERT INTO `catalog_attribute` (`id`, `title`, `id_attribute_kind`, `required`, `name`, `alphasort`, `sort_order`, `on_filter`, `on_table`) VALUES
(1, 'Бренд', 3, 0, 'brend', 0, 30, 1, 1),
(2, 'Вкус', 3, 0, 'vkus', 0, 20, 1, 1),
(3, 'Цвет', 3, 0, 'tsvet', 0, 10, 1, 1),
(5, 'Шоколадная посыпка', 5, 0, 'shokoladnaja-posypka', 0, 40, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_attribute_kind`
--

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

CREATE TABLE IF NOT EXISTS `catalog_attribute_value` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_attribute` int(11) unsigned NOT NULL,
  `value` varchar(256) NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_catalog_attribute_value` (`id_attribute`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `catalog_attribute_value`
--

INSERT INTO `catalog_attribute_value` (`id`, `id_attribute`, `value`, `sort_order`) VALUES
(1, 3, 'Красный', 10),
(2, 3, 'Синий', 20),
(3, 3, 'Зелёный', 30),
(4, 1, 'Vanilla ', 40),
(5, 1, 'Sweet-sweet', 50),
(6, 1, 'Шоко-локо', 60),
(7, 2, 'Шоколадный', 70),
(8, 2, 'Ванильный', 80),
(9, 2, 'Сливовый', 90),
(11, 2, 'Вишневый', 110),
(12, 2, 'Сливочный', 120),
(13, 2, 'Черничный', 130),
(14, 3, 'Оранжевый', 140),
(15, 3, 'Фиолетовый', 150);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_category`
--

CREATE TABLE IF NOT EXISTS `catalog_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL DEFAULT '0',
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
  KEY `FK_catalog_category` (`id_category`),
  KEY `title` (`title`(255)),
  KEY `link` (`link`(255))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Дамп данных таблицы `catalog_category`
--

INSERT INTO `catalog_category` (`id`, `id_category`, `title`, `long_title`, `link`, `image`, `layout`, `product_view`, `keywords`, `description`, `text`, `sort_order`) VALUES
(1, 0, 'Мороженое', '', 'morozhenoe', '32d0741126c559191296cd87f53c9857.png', 'morozhenoe', 0, '', '', '', 10),
(4, 0, 'Сорбет', '', 'sorbet', '28917018a89ac3c400e615529b490f52.png', 'sorbet', 0, '', '', '', 20),
(5, 0, 'Торты', '', 'torty', '8dd2ad4957eb87d503fba3ac590602fb.png', 'torty', 0, '', '', '', 30),
(6, 1, 'Развесное', '', 'razvesnoe', '24f50007d0ffef56531fddd2114bd8ef.png', 'razvesnoe', 0, '', '', '', 40),
(7, 1, 'В рожке', '', 'v-rozhke', '4f2fa14c2e269a70833476e6bc53cd03.png', 'v-rozhke', 0, '', '', '', 50),
(8, 1, 'На палочке', '', 'na-palochke', '34daf83bd0ed83e55085a4e6cb253db2.png', 'na-palochke', 0, '', '', '', 60),
(10, 4, 'С соком', '', 's-sokom', '381c71afe76a29d66c6f82df1232650f.png', '', 0, '', '', '', 70),
(11, 4, 'С фруктами', '', 's-fruktami', '1aa08bbf44a3c38c947401cde4d8f812.png', '', 0, '', '', '', 80),
(12, 5, 'Бисквит', '', 'biskvit', '8624db15ab3b08bcf7b707baaef7ee22.png', '', 0, '', '', '', 90),
(13, 5, 'Безе', '', 'beze', 'aa3229a964bd23aa1e1bb713385bcdf2.png', '', 0, '', '', '', 100),
(14, 5, 'Птичье молоко', '', 'ptiche-moloko', 'dd7f4fecee06ea8429dbe0d83ef8a2e3.png', '', 0, '', '', '', 110),
(20, 19, 'Трикотаж', 'АксессуарыАксессуары', 'trikotazh', 'deda057894bb706f45b4873a3a44caeb.png', '', 0, 'АксессуарыАксессуарыАксессуары', 'АксессуарыАксессуарыАксессуары', '<p>АксессуарыАксессуарыАксессуары</p>\r\n', 130),
(23, 22, 'Категория 1', 'Категория 1', 'kategorija-1', '3dd0a09391f3de41fb6fbc233c1b3feb.png', '', 0, 'Категория 1Категория 1', 'Категория 1Категория 1Категория 1', '<p>Категория 1Категория 1Категория 1Категория 1</p>\r\n', 150);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_category_attribute`
--

CREATE TABLE IF NOT EXISTS `catalog_category_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) DEFAULT NULL,
  `id_attribute` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Дамп данных таблицы `catalog_category_attribute`
--

INSERT INTO `catalog_category_attribute` (`id`, `id_category`, `id_attribute`) VALUES
(5, 1, 3),
(6, 6, 3),
(7, 7, 3),
(8, 8, 3),
(9, 1, 2),
(10, 6, 2),
(11, 7, 2),
(12, 8, 2),
(13, 4, 2),
(14, 10, 2),
(15, 11, 2),
(16, 5, 2),
(17, 12, 2),
(18, 13, 2),
(19, 14, 2),
(20, 1, 1),
(21, 6, 1),
(22, 7, 1),
(23, 8, 1),
(24, 4, 1),
(25, 10, 1),
(26, 11, 1),
(27, 5, 1),
(28, 12, 1),
(29, 13, 1),
(30, 14, 1),
(31, 4, 3),
(32, 10, 3),
(33, 11, 3),
(34, 5, 3),
(35, 12, 3),
(36, 13, 3),
(37, 14, 3),
(38, 1, 5),
(39, 6, 5),
(40, 7, 5),
(41, 8, 5),
(42, 4, 5),
(43, 10, 5),
(44, 11, 5),
(45, 5, 5),
(46, 12, 5),
(47, 13, 5),
(48, 14, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_category_existparam`
--

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
(1, 'Каталог', 'Ключевые слова', 'Описание общее', '<p><span style="color:rgb(0, 0, 0); font-family:arial,helvetica,sans; font-size:11px">&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</span></p>\r\n', '//layouts/main', 12, 12, 200, 200, 270, 270, 150, 150, 'a716f49112379c4e237e5a224eb3b55f.png', 50, 50, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_image`
--

CREATE TABLE IF NOT EXISTS `catalog_image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_product` int(11) unsigned NOT NULL,
  `image` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_catalog_image` (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_priceprofile`
--

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

CREATE TABLE IF NOT EXISTS `catalog_product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(64) NOT NULL,
  `link` varchar(255) NOT NULL,
  `title` varchar(256) NOT NULL,
  `keywords` text NOT NULL,
  `image` varchar(256) DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Дамп данных таблицы `catalog_product`
--

INSERT INTO `catalog_product` (`id`, `number`, `link`, `title`, `keywords`, `image`, `description`, `id_category`, `sort_order`, `date_added`, `on_main`, `recomended`, `hit`, `price`, `currency`, `priceprofile`, `article`, `old_price`, `views`, `hide`, `noyml`) VALUES
(12, '', 'dobryj-pingvin-razvesnoe', '«Добрый пингвин» развесное', '', '5d738c41f59dce6f5d9292e616b06041.png', '<p>Самое вкусное мороженое с кусочками шоколада, ореховой крошкой или кокосовой стружкой.<br />\r\nНатуральный сливочный вкус никого не оставит равнодушным!</p>\r\n', 6, 120, 1430990985, 0, NULL, NULL, 100, 0, NULL, '', NULL, 303, 0, 0),
(13, '', 'morskaja-feerija-v-rozhke', '«Морская феерия» в рожке', '', '869455ec328fc4bc1a249824775830fc.png', '<p>Самое вкусное мороженое с кусочками шоколада, ореховой крошкой или кокосовой стружкой.<br />\r\nНатуральный сливочный вкус никого не оставит равнодушным!</p>\r\n', 7, 130, 1430991039, 1, NULL, NULL, 150, 0, NULL, '', NULL, 139, 0, 0),
(14, '', 'fruktovaja-volna-na-palochke', '«Фруктовая волна» на палочке', '', '8c3a6427c27e5f4e77d9e4d21c92c994.png', '<p>Самое вкусное мороженое с кусочками шоколада, ореховой крошкой или кокосовой стружкой.<br />\r\nНатуральный сливочный вкус никого не оставит равнодушным!</p>\r\n', 8, 140, 1430991089, 1, NULL, NULL, 150, 0, NULL, '', NULL, 115, 0, 0),
(15, '', 'okeanskij-briz-na-palochke', '«Океанский Бриз» на палочке', '', '5541650314af5f79926db01c8a0d938c.png', '<p>Самое вкусное мороженое с кусочками шоколада, ореховой крошкой или кокосовой стружкой.<br />\r\nНатуральный сливочный вкус никого не оставит равнодушным!</p>\r\n', 8, 150, 1430991108, 0, NULL, NULL, 160, 0, NULL, '', NULL, 65, 0, 0),
(16, '', 'koralovyj-rif-razvesnoe', '«Кораловый риф» развесное', '', 'c70744eeea8599bf1adfaa8fe383f7a0.png', '<p>Самое вкусное мороженое с кусочками шоколада, ореховой крошкой или кокосовой стружкой.<br />\r\nНатуральный сливочный вкус никого не оставит равнодушным!</p>\r\n', 6, 160, 1430991126, 0, NULL, NULL, 120, 0, NULL, '', NULL, 88, 0, 0),
(17, '', 'rajskij-pljazh-v-rozhke', '«Райский пляж»  в рожке', '', 'e50f05389d7c4be99e0c56f0e4bb081b.png', '<p>Самое вкусное мороженое с кусочками шоколада, ореховой крошкой или кокосовой стружкой.<br />\r\nНатуральный сливочный вкус никого не оставит равнодушным!</p>\r\n', 7, 170, 1430991146, 0, NULL, NULL, 170, 0, NULL, '', NULL, 76, 0, 0),
(18, '', 'sorbet-bomba-vkusa', 'Сорбет Бомба вкуса', '', '759caf7405e7cb9e8bdcb066184db38b.png', '<p>Самый вкусный&nbsp;сорбет с натуральным фруктовым или ягодным соком.<br />\r\nБодрящий взрыв вкуса&nbsp;никого не оставит равнодушным!</p>\r\n', 10, 180, 1432203438, 0, NULL, NULL, 150, 0, NULL, '', NULL, 38, 0, 0),
(26, '', 'bodrjaschij-tsitrus-razvesnoe1', '«Бодрящий цитрус» развесное', '', '6f8500e233c15143fe861f8a02dd3a0e.png', '<p>Самое вкусное мороженое с кусочками шоколада, ореховой крошкой или кокосовой стружкой.<br />\r\nНатуральный сливочный вкус никого не оставит равнодушным!</p>\r\n', 6, 240, 1437993402, 0, NULL, NULL, 150, 0, NULL, '', NULL, 22, 0, 0),
(40, '', 'biskvit-s-varenoj-sguschenkoj1', 'Бисквит с вареной сгущенкой', '', 'e5f912bd2363ffe48797f12329221225.png', '<p>Самый вкусный, сочный и сладкий бисквит с разнообразными прослойками из фруктов,ягод или сливочного крема - только у нас! Спешите заказать самый свежий!<br />\r\n&nbsp;</p>\r\n', 12, 380, 1437998614, 1, NULL, NULL, 150, 0, NULL, '', NULL, 36, 0, 0),
(41, '', 'biskvit-s-ananasami', 'Бисквит с ананасами', '', 'feb96a41a8dfbb2cc24ae0e756b6c7a5.png', '<p>Самый вкусный, сочный и сладкий бисквит с &nbsp;прослойкой из свежих ананасов - только у нас! Спешите заказать самый свежий!<br />\r\n&nbsp;</p>\r\n', 12, 390, 1437998879, 0, NULL, NULL, 200, 0, NULL, '', NULL, 26, 0, 0),
(42, '', 'biskvit-jablochnyj', 'Бисквит яблочный', '', '5a87da37d38d4c6444b18a028c5b5178.png', '<p>Самый вкусный, сочный и сладкий бисквит с&nbsp;прослойкой&nbsp;из&nbsp;яблок - только у нас! Спешите заказать самый свежий!<br />\r\n&nbsp;</p>\r\n', 12, 400, 1437998983, 0, NULL, NULL, 180, 0, NULL, '', NULL, 25, 0, 0),
(49, '', 'assorti-v-rozhke1', '«Ассорти» в рожке', '', '3db14eeabbb62b3174d72ee4ffc0b28e.png', '<p>Самое вкусное мороженое с кусочками шоколада, ореховой крошкой или кокосовой стружкой.<br />\r\nНатуральный сливочный вкус никого не оставит равнодушным!</p>\r\n', 7, 470, 1437999950, 0, NULL, NULL, 170, 0, NULL, '', NULL, 20, 0, 0),
(50, '', 'kokosovoe-more-na-palochke', '«Кокосовое море» на палочке', '', '381d8ff9e81bd5a27a887c8be2cedcc6.png', '<p>Самое вкусное мороженое с кусочками шоколада, ореховой крошкой или кокосовой стружкой.<br />\r\nНатуральный сливочный вкус никого не оставит равнодушным!</p>\r\n', 8, 480, 1438000194, 0, NULL, NULL, 170, 0, NULL, '', NULL, 20, 0, 0),
(51, '', 'sorbet-mandarinovyj1', 'Сорбет мандариновый', '', '2025088d6868fb39f725014d3325b27e.png', '<p>Самый вкусный&nbsp;сорбет с натуральным фруктовым или ягодным соком.<br />\r\nБодрящий взрыв вкуса&nbsp;никого не оставит равнодушным!</p>\r\n', 10, 490, 1438000442, 0, NULL, NULL, 50, 0, NULL, '', NULL, 21, 0, 0),
(52, '', 'sorbet-klubnichnyj1', 'Сорбет клубничный', '', '963bc91eae6292e53d828d000c11fa32.png', '<p>Самый вкусный&nbsp;сорбет с натуральным фруктовым или ягодным соком.<br />\r\nБодрящий взрыв вкуса&nbsp;никого не оставит равнодушным!</p>\r\n', 10, 500, 1438000548, 0, NULL, NULL, 60, 0, NULL, '', NULL, 24, 0, 0),
(53, '', 'sorbet-chernichnyj1', 'Сорбет черничный', '', '961e1991597ba61f7c5a66e6ad5e9fe9.png', '<p>Самый вкусный&nbsp;сорбет с натуральным фруктовым или ягодным соком.<br />\r\nБодрящий взрыв вкуса&nbsp;никого не оставит равнодушным!</p>\r\n', 10, 510, 1438000630, 1, NULL, NULL, 70, 0, NULL, '', NULL, 39, 0, 0),
(54, '', 'sorbet-s-kusochkami-ananasa1', 'Сорбет с кусочками ананаса', '', 'd4dfebcd06c35e1cf67f8753480351e9.png', '<p>Самый&nbsp;вкусный&nbsp;сорбет с натуральныит кусочками фруктов.<br />\r\nБодрящий взрыв вкуса&nbsp;никого не оставит равнодушным!</p>\r\n', 11, 520, 1438000733, 0, NULL, NULL, 100, 0, NULL, '', NULL, 21, 0, 0),
(55, '', 'sorbet-s-kusochkami-persika1', 'Сорбет с кусочками персика', '', '9b030853ab615561b0f6d584afb83d4a.png', '<p>Самый&nbsp;вкусный&nbsp;сорбет с натуральныит кусочками персика и нектарина.<br />\r\nБодрящий взрыв вкуса&nbsp;никого не оставит равнодушным!</p>\r\n', 11, 530, 1438000806, 0, NULL, NULL, 100, 0, NULL, '', NULL, 19, 0, 0),
(56, '', 'sorbet-fruktovoe-assorti1', 'Сорбет «Фруктовое ассорти»', '', 'cc67119acfc881be1f7acce14bd410c9.png', '<p>Самый вкусный&nbsp;сорбет с натуральными кусочками фруктов.<br />\r\nБодрящий взрыв вкуса&nbsp;никого не оставит равнодушным!</p>\r\n', 11, 540, 1438000939, 1, NULL, NULL, 120, 0, NULL, '', NULL, 52, 0, 0),
(60, '', 'beze-vanilnoe1', 'Безе ванильное', '', 'd949b75adef7bb9eea766779511d6a98.png', '<p>Самое вкусное, воздушное безе&nbsp;с разнообразными прослойками из фруктов,ягод или ванильного крема - только у нас! Спешите заказать самый свежий торт!<br />\r\n&nbsp;</p>\r\n', 13, 580, 1438001406, 0, NULL, NULL, 150, 0, NULL, '', NULL, 14, 0, 0),
(61, '', 'shokoladnoe-beze1', 'Шоколадное безе', '', 'ebf596fc9c4278a71f286a0380aec6ca.png', '<p>Самое вкусное, воздушное безе&nbsp;с разнообразными прослойками из фруктов,ягод или шоколадного крема - только у нас! Спешите заказать самый свежий торт!<br />\r\n&nbsp;</p>\r\n', 13, 590, 1438001458, 0, NULL, NULL, 170, 0, NULL, '', NULL, 16, 0, 0),
(62, '', 'beze-s-klubnichnym-siropom1', 'Безе с клубничным сиропом', '', '08ffd33aaaae6c72ce050a2865b74a2e.png', '<p>Самое вкусное, воздушное безе,&nbsp;облитое и пропитанное&nbsp;свежайшим клубничным сиропом - только у нас! Спешите заказать самый свежий торт!<br />\r\n&nbsp;</p>\r\n', 13, 600, 1438001506, 0, NULL, NULL, 200, 0, NULL, '', NULL, 18, 0, 0),
(63, '', 'shokoladno-vanilnoe1', 'Шоколадно-Ванильное', '', 'b9118ebdfa1b230446e0afe33205b487.png', '<p>Классическое,самое вкусное,натуральное, воздушное &nbsp;птичье молоко с разнообразными прослойками из фруктов,ягод или ванильного крема - только у нас! Спешите заказать самый свежий торт!<br />\r\n&nbsp;</p>\r\n', 14, 610, 1438001646, 0, NULL, NULL, 170, 0, NULL, '', NULL, 26, 0, 0),
(64, '', 'fruktovoe1', 'Фруктовое', '', '3bdaa1aefc7b4c9c7d46b49ca18a37a3.png', '<p>Классическое,самое вкусное,натуральное, воздушное &nbsp;птичье молоко с разнообразными прослойками из фруктов,ягод или ванильного крема - только у нас! Спешите заказать самый свежий торт!</p>\r\n', 14, 620, 1438001904, 0, NULL, NULL, 200, 0, NULL, '', NULL, 22, 0, 0),
(65, '', 's-lesnymi-jagodami1', 'С лесными ягодами', '', 'a8e726a0e8930aa0ffc6a2856ca294bb.png', '<p>Классическое,самое вкусное,натуральное, воздушное &nbsp;птичье молоко с разнообразными прослойками из фруктов и&nbsp;ягод &nbsp;- только у нас! Спешите заказать самый свежий торт!</p>\r\n', 14, 630, 1438001972, 1, NULL, NULL, 180, 0, NULL, '', NULL, 42, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_product_attribute`
--

CREATE TABLE IF NOT EXISTS `catalog_product_attribute` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_product` int(11) unsigned NOT NULL,
  `id_attribute` int(11) unsigned NOT NULL,
  `value` varchar(256) NOT NULL,
  `image` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_catalog_product_attribute` (`id_attribute`),
  KEY `FK_catalog_product_attributes` (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=193 ;

--
-- Дамп данных таблицы `catalog_product_attribute`
--

INSERT INTO `catalog_product_attribute` (`id`, `id_product`, `id_attribute`, `value`, `image`) VALUES
(1, 12, 3, '1', NULL),
(2, 13, 3, '14', NULL),
(3, 16, 3, '2', NULL),
(4, 21, 3, '1', NULL),
(5, 23, 3, '3', NULL),
(6, 24, 3, '2', NULL),
(7, 25, 3, '1', NULL),
(8, 26, 3, '1', NULL),
(9, 27, 3, '1', NULL),
(10, 28, 3, '1', NULL),
(11, 29, 3, '1', NULL),
(12, 31, 3, '1', NULL),
(13, 32, 3, '2', NULL),
(14, 33, 3, '2', NULL),
(15, 49, 3, '14', NULL),
(16, 50, 3, '3', NULL),
(17, 12, 2, '7', NULL),
(18, 13, 2, '8', NULL),
(19, 50, 2, '12', NULL),
(20, 50, 1, '4', NULL),
(21, 57, 3, '1', NULL),
(22, 57, 2, '7', NULL),
(23, 57, 2, '8', NULL),
(24, 57, 2, '9', NULL),
(25, 57, 1, '6', NULL),
(26, 57, 5, '1', NULL),
(27, 58, 3, '0', NULL),
(28, 58, 2, '7', NULL),
(29, 58, 2, '9', NULL),
(30, 58, 1, '4', NULL),
(31, 58, 5, '1', NULL),
(32, 59, 3, '3', NULL),
(33, 59, 2, '0', NULL),
(34, 59, 1, '4', NULL),
(35, 59, 5, '1', NULL),
(36, 60, 3, '1', NULL),
(37, 60, 2, '12', NULL),
(38, 60, 2, '8', NULL),
(39, 60, 1, '4', NULL),
(40, 60, 5, '0', NULL),
(41, 61, 3, '1', NULL),
(42, 61, 2, '7', NULL),
(43, 61, 1, '6', NULL),
(44, 61, 5, '1', NULL),
(45, 62, 3, '1', NULL),
(46, 62, 2, '8', NULL),
(47, 62, 1, '4', NULL),
(48, 62, 5, '0', NULL),
(49, 63, 3, '1', NULL),
(50, 63, 2, '8', NULL),
(51, 63, 2, '7', NULL),
(52, 63, 1, '6', NULL),
(53, 63, 5, '1', NULL),
(54, 64, 3, '1', NULL),
(55, 64, 2, '11', NULL),
(56, 64, 2, '7', NULL),
(57, 64, 1, '4', NULL),
(58, 64, 5, '0', NULL),
(59, 65, 3, '1', NULL),
(60, 65, 2, '11', NULL),
(61, 65, 2, '13', NULL),
(62, 65, 2, '8', NULL),
(63, 65, 1, '4', NULL),
(64, 65, 5, '0', NULL),
(65, 51, 3, '14', NULL),
(66, 51, 2, '7', NULL),
(67, 51, 1, '5', NULL),
(68, 51, 5, '0', NULL),
(69, 52, 3, '1', NULL),
(70, 52, 2, '7', NULL),
(71, 52, 1, '5', NULL),
(72, 52, 5, '1', NULL),
(73, 53, 3, '15', NULL),
(74, 53, 2, '13', NULL),
(75, 53, 1, '4', NULL),
(76, 53, 5, '0', NULL),
(77, 54, 3, '1', NULL),
(78, 54, 2, '12', NULL),
(79, 54, 1, '4', NULL),
(80, 54, 5, '0', NULL),
(81, 55, 3, '1', NULL),
(82, 55, 2, '12', NULL),
(83, 55, 1, '5', NULL),
(84, 55, 5, '1', NULL),
(85, 33, 2, '0', NULL),
(86, 33, 1, '4', NULL),
(87, 33, 5, '0', NULL),
(88, 56, 3, '1', NULL),
(89, 56, 3, '3', NULL),
(90, 56, 3, '14', NULL),
(91, 56, 2, '8', NULL),
(92, 56, 2, '7', NULL),
(93, 56, 2, '11', NULL),
(94, 56, 1, '5', NULL),
(95, 56, 5, '1', NULL),
(96, 12, 2, '7', NULL),
(97, 12, 2, '8', NULL),
(98, 12, 1, '4', NULL),
(99, 12, 5, '1', NULL),
(100, 13, 3, '1', NULL),
(101, 13, 3, '3', NULL),
(102, 13, 2, '7', NULL),
(103, 13, 2, '11', NULL),
(104, 13, 1, '4', NULL),
(105, 13, 5, '1', NULL),
(106, 14, 3, '1', NULL),
(107, 14, 2, '7', NULL),
(108, 14, 2, '8', NULL),
(109, 14, 1, '4', NULL),
(110, 14, 5, '1', NULL),
(111, 15, 3, '1', NULL),
(112, 15, 2, '7', NULL),
(113, 15, 2, '7', NULL),
(114, 15, 2, '8', NULL),
(115, 15, 1, '4', NULL),
(116, 15, 5, '1', NULL),
(117, 17, 3, '1', NULL),
(118, 17, 3, '14', NULL),
(119, 17, 2, '8', NULL),
(120, 17, 1, '4', NULL),
(121, 17, 5, '1', NULL),
(122, 49, 3, '1', NULL),
(123, 49, 3, '3', NULL),
(124, 49, 2, '8', NULL),
(125, 49, 2, '7', NULL),
(126, 49, 2, '11', NULL),
(127, 49, 1, '4', NULL),
(128, 49, 5, '1', NULL),
(129, 50, 2, '7', NULL),
(130, 50, 5, '1', NULL),
(131, 16, 2, '7', NULL),
(132, 16, 1, '4', NULL),
(133, 16, 5, '0', NULL),
(134, 18, 3, '1', NULL),
(135, 18, 2, '7', NULL),
(136, 18, 1, '4', NULL),
(137, 18, 5, '0', NULL),
(138, 26, 2, '7', NULL),
(139, 26, 1, '4', NULL),
(140, 26, 5, '0', NULL),
(141, 41, 3, '1', NULL),
(142, 41, 2, '7', NULL),
(143, 41, 1, '4', NULL),
(144, 41, 5, '0', NULL),
(145, 42, 3, '1', NULL),
(146, 42, 2, '7', NULL),
(147, 42, 1, '4', NULL),
(148, 42, 5, '0', NULL),
(149, 40, 3, '1', NULL),
(150, 40, 2, '7', NULL),
(151, 40, 1, '4', NULL),
(152, 40, 5, '0', NULL),
(153, 66, 3, '2', NULL),
(154, 66, 2, '7', NULL),
(155, 66, 1, '6', NULL),
(156, 66, 5, '1', NULL),
(157, 67, 3, '1', NULL),
(158, 67, 2, '7', NULL),
(159, 67, 1, '4', NULL),
(160, 67, 5, '0', NULL),
(161, 68, 3, '1', NULL),
(162, 68, 2, '7', NULL),
(163, 68, 2, '7', NULL),
(164, 68, 2, '8', NULL),
(165, 68, 1, '4', NULL),
(166, 68, 5, '1', NULL),
(167, 69, 3, '1', NULL),
(168, 69, 2, '9', NULL),
(169, 69, 1, '5', NULL),
(170, 69, 5, '1', NULL),
(171, 70, 3, '0', NULL),
(172, 70, 2, '0', NULL),
(173, 70, 1, '0', NULL),
(174, 70, 5, '0', NULL),
(175, 71, 3, '0', NULL),
(176, 71, 2, '0', NULL),
(177, 71, 1, '0', NULL),
(178, 71, 5, '0', NULL),
(179, 72, 3, '1', NULL),
(180, 72, 2, '7', NULL),
(181, 72, 2, '7', NULL),
(182, 72, 2, '8', NULL),
(183, 72, 1, '4', NULL),
(184, 72, 5, '1', NULL),
(185, 73, 3, '1', NULL),
(186, 73, 2, '11', NULL),
(187, 73, 1, '5', NULL),
(188, 73, 5, '0', NULL),
(189, 74, 3, '14', NULL),
(190, 74, 2, '12', NULL),
(191, 74, 1, '4', NULL),
(192, 74, 5, '0', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_relatedproducts`
--

CREATE TABLE IF NOT EXISTS `catalog_relatedproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `related_product` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=189 ;

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
(10, 3, 10),
(88, 29, 28),
(87, 28, 29),
(74, 18, 26),
(73, 26, 18),
(15, 12, 25),
(16, 25, 12),
(17, 13, 17),
(18, 17, 13),
(19, 13, 29),
(20, 29, 13),
(21, 14, 15),
(22, 15, 14),
(54, 18, 23),
(53, 23, 18),
(52, 16, 23),
(51, 23, 16),
(27, 16, 18),
(28, 18, 16),
(29, 16, 25),
(30, 25, 16),
(34, 29, 17),
(33, 17, 29),
(68, 18, 25),
(67, 25, 18),
(92, 12, 24),
(91, 24, 12),
(86, 29, 27),
(85, 27, 29),
(154, 16, 12),
(153, 12, 16),
(84, 13, 28),
(83, 28, 13),
(78, 17, 27),
(77, 27, 17),
(47, 50, 14),
(48, 14, 50),
(49, 50, 15),
(50, 15, 50),
(96, 25, 24),
(95, 24, 25),
(90, 25, 23),
(89, 23, 25),
(72, 16, 26),
(71, 26, 16),
(94, 18, 24),
(93, 24, 18),
(97, 33, 14),
(98, 14, 33),
(99, 33, 15),
(100, 15, 33),
(101, 31, 15),
(102, 15, 31),
(110, 33, 31),
(109, 31, 33),
(105, 32, 14),
(106, 14, 32),
(107, 32, 33),
(108, 33, 32),
(116, 34, 22),
(115, 22, 34),
(152, 35, 22),
(151, 22, 35),
(156, 26, 12),
(155, 12, 26),
(121, 36, 38),
(122, 38, 36),
(123, 36, 37),
(124, 37, 36),
(125, 37, 38),
(126, 38, 37),
(160, 49, 13),
(159, 13, 49),
(129, 51, 35),
(130, 35, 51),
(131, 52, 51),
(132, 51, 52),
(133, 52, 35),
(134, 35, 52),
(158, 18, 12),
(157, 12, 18),
(139, 54, 37),
(140, 37, 54),
(141, 54, 38),
(142, 38, 54),
(143, 55, 36),
(144, 36, 55),
(145, 55, 38),
(146, 38, 55),
(147, 56, 36),
(148, 36, 56),
(149, 56, 37),
(150, 37, 56),
(161, 17, 49),
(162, 49, 17),
(163, 51, 53),
(164, 53, 51),
(165, 52, 53),
(166, 53, 52),
(167, 54, 55),
(168, 55, 54),
(169, 54, 56),
(170, 56, 54),
(171, 55, 56),
(172, 56, 55),
(173, 40, 41),
(174, 41, 40),
(175, 40, 42),
(176, 42, 40),
(177, 41, 42),
(178, 42, 41),
(179, 60, 62),
(180, 62, 60),
(181, 60, 61),
(182, 61, 60),
(183, 61, 62),
(184, 62, 61);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_reviews`
--

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
(1, 'Главное меню', 'main', '<div class="item-layout"><span class="bullet"></span>{menu}</div>', '', 'home', '');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_item`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `number`, `date`, `customer`, `status`, `delivery`, `comments`, `sum`, `admin_remark`) VALUES
(11, NULL, '2015-03-23 17:34:02', 14, 0, NULL, '12312', 53, NULL),
(12, NULL, '2015-06-10 14:06:21', 15, 0, NULL, 'xvxcvxc', 3000, NULL),
(13, NULL, '2015-06-10 14:07:15', 16, 0, NULL, 'xvxcvxc', 3000, NULL),
(14, NULL, '2015-06-10 14:10:52', 17, 0, NULL, 'xvxcvxc', 3000, NULL),
(15, NULL, '2015-06-10 14:12:56', 18, 0, NULL, 'sdasd', 100, NULL),
(16, NULL, '2015-06-10 15:08:22', 19, 0, NULL, 'fdsf', 120, NULL),
(17, NULL, '2015-06-17 11:26:16', 20, 0, NULL, 'каепаво', 1040, NULL),
(18, NULL, '2015-07-02 17:11:39', 21, 2, NULL, '', 420, 'mhbhbj'),
(19, NULL, '2015-07-21 16:37:59', 22, 0, NULL, '', 100, NULL),
(20, NULL, '2015-07-21 16:40:13', 23, 0, NULL, '', 100, NULL),
(21, NULL, '2015-07-24 15:30:08', 24, 0, NULL, '', 1000, NULL),
(22, NULL, '2015-07-28 11:47:47', 25, 0, NULL, 'ПроверкаProverka123456789!@#$%^&*()_+|', 180, NULL),
(25, NULL, '2015-08-03 17:30:34', 28, 0, NULL, '', 100, NULL),
(26, NULL, '2015-08-06 01:00:42', 29, 0, NULL, '', 1060, NULL),
(24, NULL, '2015-08-03 15:53:55', 27, 0, NULL, '', 100, NULL),
(27, NULL, '2015-08-06 16:20:34', 30, 0, NULL, '', 120, NULL),
(28, NULL, '2015-08-10 12:25:53', 31, 0, NULL, '', 100, NULL),
(29, NULL, '2015-08-10 14:27:14', 32, 0, NULL, '', 100, NULL),
(30, NULL, '2015-08-10 14:53:53', 33, 0, NULL, '', 100, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `order_cart`
--

CREATE TABLE IF NOT EXISTS `order_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=644 ;

--
-- Дамп данных таблицы `order_cart`
--

INSERT INTO `order_cart` (`id`, `session_id`, `product_id`, `price`, `quantity`, `date`) VALUES
(32, '8b5pq7apko4g080n2asn3q0de6', 15, 160, 5, '2015-06-03 17:41:39'),
(30, 'tl0fibr9tqh0o9rqm40kehi6u2', 12, 100, 10, '2015-06-03 16:56:25'),
(31, '8b5pq7apko4g080n2asn3q0de6', 16, 120, 2, '2015-06-03 17:38:55'),
(33, '8b5pq7apko4g080n2asn3q0de6', 13, 150, 2, '2015-06-03 18:05:31'),
(26, 'tl0fibr9tqh0o9rqm40kehi6u2', 17, 170, 24, '2015-06-03 15:15:43'),
(44, 'nb9foqdujtjhdmjg0hsv9ehv56', 17, 170, 11, '2015-06-08 17:27:36'),
(43, 'nb9foqdujtjhdmjg0hsv9ehv56', 13, 150, 2, '2015-06-08 17:25:50'),
(40, 'nb9foqdujtjhdmjg0hsv9ehv56', 14, 150, 2, '2015-06-08 17:20:46'),
(41, 'nb9foqdujtjhdmjg0hsv9ehv56', 16, 120, 3, '2015-06-08 17:25:20'),
(42, 'nb9foqdujtjhdmjg0hsv9ehv56', 15, 160, 7, '2015-06-08 17:25:24'),
(45, 'nb9foqdujtjhdmjg0hsv9ehv56', 12, 100, 1, '2015-06-08 17:27:43'),
(46, 'gsrpcc9c017via619oh692dvj2', 16, 120, 10, '2015-06-09 09:58:53'),
(47, 'gsrpcc9c017via619oh692dvj2', 12, 100, 9, '2015-06-09 14:52:29'),
(50, 'o2u15uq36ovcuv2hnfob7h6ou3', 13, 150, 3, '2015-06-09 15:16:59'),
(49, 'gsrpcc9c017via619oh692dvj2', 17, 170, 1, '2015-06-09 14:52:31'),
(51, 'gsrpcc9c017via619oh692dvj2', 14, 150, 4993, '2015-06-09 15:18:06'),
(52, 'gsrpcc9c017via619oh692dvj2', 15, 160, 1999, '2015-06-09 15:19:17'),
(53, 'gsrpcc9c017via619oh692dvj2', 13, 150, 11, '2015-06-09 15:20:52'),
(54, 's85p1tjt5hu1nm47bqtv1p6256', 15, 160, 5, '2015-06-09 15:35:26'),
(55, 's85p1tjt5hu1nm47bqtv1p6256', 14, 150, 6, '2015-06-09 15:35:39'),
(56, 's85p1tjt5hu1nm47bqtv1p6256', 16, 120, 1, '2015-06-09 15:37:12'),
(60, 'rv14snhlqk35vdk1ijifdvpq57', 12, 100, 1, '2015-06-10 14:22:56'),
(62, 'd96i4o20uie34ssmfdjmarv9k7', 17, 170, 1, '2015-06-11 17:22:16'),
(63, 'd96i4o20uie34ssmfdjmarv9k7', 16, 120, 3, '2015-06-11 17:22:19'),
(114, 'gautqghgms02e3s494fo8g7890', 17, 170, 1, '2015-06-17 15:30:11'),
(113, 'gautqghgms02e3s494fo8g7890', 13, 150, 2, '2015-06-17 15:30:07'),
(112, 'gautqghgms02e3s494fo8g7890', 12, 100, 1, '2015-06-17 15:30:03'),
(69, 'u8k31nuq7090ie7jr773cjbk61', 16, 120, 1, '2015-06-12 08:51:25'),
(70, 'apq1u01hmqf86jrk5mjbdu6tj2', 15, 160, 1, '2015-06-12 09:08:55'),
(71, '7ghm2r98objvi30tj50pjnmal3', 17, 170, 1, '2015-06-12 09:23:00'),
(72, '04l8v6pidlemprljdc5fvkbsm3', 13, 150, 1, '2015-06-12 09:33:16'),
(73, '8sl496hat3ekf6dmq2tqnrunk6', 14, 150, 1, '2015-06-12 09:36:41'),
(74, 'e9q9nqkoff8ap46l0hee8976o1', 12, 100, 1, '2015-06-12 10:09:09'),
(75, 'uni64uij3o24fhq8dabjf4h8j7', 12, 100, 1, '2015-06-13 07:00:53'),
(76, 'pm0n27mmgbtcu766ninl6hft26', 13, 150, 1, '2015-06-13 07:00:56'),
(77, 'vdrt6k1t6i3pmc3hnlrfmbdb16', 14, 150, 1, '2015-06-13 07:00:58'),
(78, 'mn593qoaeikdt1lkncleo275f2', 15, 160, 1, '2015-06-13 07:01:02'),
(79, 'qjsbp00ddlicqg49uv8tl28rp0', 16, 120, 1, '2015-06-13 07:01:03'),
(80, 'rdos0mulgaua5eo0r589pc7s23', 17, 170, 1, '2015-06-13 07:01:08'),
(81, 'd7rcv4l5a49ck4psiadnl06o35', 17, 170, 1, '2015-06-13 20:16:34'),
(82, 'kct28uf46rjs5t0jjbvu5g18i7', 16, 120, 1, '2015-06-13 20:27:09'),
(83, '9lobfbph6kqc2s2hcabqk1sun3', 16, 120, 1, '2015-06-13 21:04:46'),
(84, 'og99torq746rob9ogmn8q2k751', 15, 160, 1, '2015-06-13 21:08:03'),
(85, 'tik5i2j8ihtkgifrbqtrjkr7n4', 14, 150, 1, '2015-06-13 21:16:33'),
(86, 'geg3p5bbnf0pjmvjif8evce0s7', 13, 150, 1, '2015-06-13 21:31:13'),
(87, 'r0t914pov65klpqbj9v3pej8n6', 12, 100, 1, '2015-06-13 21:45:39'),
(94, 'fa2fou05l978obcrain4me72l5', 16, 120, 1, '2015-06-15 16:04:11'),
(93, 'fa2fou05l978obcrain4me72l5', 14, 150, 1, '2015-06-15 16:04:09'),
(95, 'fa2fou05l978obcrain4me72l5', 12, 100, 3, '2015-06-15 16:04:12'),
(96, 'ltueg7uhqiii3llpksnu8iqls2', 12, 100, 1, '2015-06-15 21:28:32'),
(97, 'h804edvktaqsbg3eoo5j0frpd5', 13, 150, 1, '2015-06-15 21:28:37'),
(98, 'a6km2ulqdf22cc021bbbgidnp4', 14, 150, 1, '2015-06-15 21:28:40'),
(99, 'a0a1qdcrga729ubnr1avmmvqd4', 15, 160, 1, '2015-06-15 21:28:42'),
(100, 'm9frn2svdgmkdgat5vgknbmpn4', 16, 120, 1, '2015-06-15 21:28:45'),
(101, 't7f22qh2o3maqo7r6fcprgc2c1', 17, 170, 1, '2015-06-15 21:28:50'),
(102, 'mko19oqgemg98ctlcgfgrra0t3', 18, 150, 1, '2015-06-16 12:11:23'),
(103, 'uq0s65c6n50fjsbds2i2vd4bp3', 13, 150, 1, '2015-06-16 17:42:02'),
(104, 'nfil6uelluaqnvoamnduesdei0', 14, 150, 1, '2015-06-16 17:42:58'),
(105, 'p85h4thvo8dg82mb8e93cl9jf6', 17, 170, 1, '2015-06-16 17:43:02'),
(106, '58p07dn2854nn9f7o6b1dhiol4', 16, 120, 1, '2015-06-16 17:43:06'),
(107, 'cop51isdrtmbi9vmru5gg4ofs5', 12, 100, 1, '2015-06-16 17:43:09'),
(108, '4mvkm9f61rgsr6mi5ibb3p00f7', 15, 160, 1, '2015-06-16 17:43:16'),
(109, 'eca4f1uqolffjb1e1l7thq8lq3', 18, 150, 1, '2015-06-16 18:18:23'),
(111, 'fq1bhgo897tq8hvu1a107gr8v1', 15, 160, 45, '2015-06-17 11:03:07'),
(118, 'e6613ldedki27f7eron5mplco0', 12, 100, 1, '2015-06-18 01:07:16'),
(117, 'a7gkskg99ibk8q89j77ke6gde6', 18, 150, 1, '2015-06-17 18:02:13'),
(119, 'cv016hfrjc2p93tpfl5tindan4', 13, 150, 1, '2015-06-18 01:07:18'),
(120, 'up2fsnhj8hiteamgp1t5rd6hu4', 14, 150, 1, '2015-06-18 01:07:20'),
(121, 'p1mlfp0flroqje48o0e5rv1lh5', 15, 160, 1, '2015-06-18 01:07:22'),
(122, 'vfm5ujgcugeidjb97qpge5e811', 16, 120, 1, '2015-06-18 01:07:24'),
(123, 'j5sin732r2bguks99fg6o8vdg2', 17, 170, 1, '2015-06-18 01:07:25'),
(124, 'bm1cqqapfk0idiaknsir1j3fi1', 18, 150, 1, '2015-06-19 04:18:59'),
(125, '3e75htu8quo0m4ageuukj5hgg7', 13, 150, 1, '2015-06-19 05:02:39'),
(126, '9jd9q9aphjdkvr3ebqbehvkog7', 16, 120, 1, '2015-06-19 05:02:44'),
(127, '8brnrmis2ncqhld4mmagi4gmc2', 15, 160, 1, '2015-06-19 05:02:51'),
(128, 'vh23ju65q8i7r9ljmfcijul671', 14, 150, 1, '2015-06-19 05:02:57'),
(129, '08q6rvt24nuule5cetuhdcr634', 17, 170, 1, '2015-06-19 05:03:02'),
(130, '3v8u3b3rlgphjl9kth1or14fc3', 12, 100, 1, '2015-06-19 05:03:24'),
(131, 'ik9v1eaupsmv2kuqq1jr13f7t5', 18, 150, 1, '2015-06-19 05:03:31'),
(132, '8k8lijng8rrgsa17bgnpm5k6b0', 18, 150, 1, '2015-06-19 11:56:42'),
(135, 'iipei575314uh8lb6cu359cn31', 13, 150, 1, '2015-06-23 17:23:59'),
(136, '1n01q197l5c2lj4olra7f124c7', 14, 150, 1, '2015-06-25 21:20:38'),
(137, '8iipgtju1mbva21igi17ei1p42', 17, 170, 2, '2015-06-25 22:13:12'),
(138, '7ienjpckili0hbsh8rgt8rvf25', 16, 120, 1, '2015-06-27 22:27:52'),
(139, 'vbomc69ibsnqknvabr5p39pop5', 17, 170, 1, '2015-06-28 01:04:08'),
(140, 'bfogcf91vu0sog88jnoulolsh2', 15, 160, 1, '2015-06-28 02:35:50'),
(141, 'sc7kgsci5leen8f2jaajcmv9k1', 14, 150, 1, '2015-06-28 03:11:36'),
(142, 'da2bmsf2nla9itgrdjtg6b6154', 12, 100, 1, '2015-06-29 02:20:20'),
(143, '4macklmfc59g1mrqv8ai3bst64', 13, 150, 1, '2015-06-29 02:35:53'),
(144, '5lovmo8a4toub83a9r460m4l16', 16, 120, 1, '2015-06-29 02:36:34'),
(145, 'ra4r0iced7i92mmq69b2jv9rd6', 17, 170, 1, '2015-06-29 16:20:33'),
(146, 'ge3dmjccu48lgnh3c88eeescs5', 15, 160, 1, '2015-06-29 16:26:19'),
(147, 'mtpj3v2i2h1bbmcukl4rv108i1', 14, 150, 1, '2015-06-29 18:36:08'),
(148, 'l6d1vgm86gve27igmdikseq7l2', 14, 150, 1, '2015-06-30 20:01:54'),
(149, '758of04gtc9n0n0snngmfbi8r3', 12, 100, 1, '2015-06-30 21:14:35'),
(150, 'ks5ntd1pc6go7vmbv31gjgmvk7', 13, 150, 1, '2015-06-30 22:43:34'),
(151, 'mrfei7tc0uirvbs9r0bn85beg3', 13, 150, 1, '2015-07-01 01:39:18'),
(152, 'cihe8kee7vmani8afdqbigkgo6', 17, 170, 1, '2015-07-01 02:55:05'),
(153, 'p77obdf40krando3lpi7pr2uo4', 17, 170, 1, '2015-07-01 04:05:22'),
(154, 'li3fee3def9i7v6dn0285963e4', 16, 120, 1, '2015-07-01 04:11:16'),
(155, 'p8qpb4qidud0ebj2cou3g20rv7', 15, 160, 1, '2015-07-01 04:37:17'),
(156, 'qduo2omdcbpm62lm5lhj3msqi2', 12, 100, 1, '2015-07-01 05:26:38'),
(157, 'dcrb7teehf0hd3bq3jr164aai7', 15, 160, 1, '2015-07-01 06:42:25'),
(158, '886lskdjhigo10k0trg4kel6n5', 18, 150, 1, '2015-07-01 17:35:40'),
(164, '57akrs6l34g1d5mnlbigc1t847', 13, 150, 1, '2015-07-04 06:18:25'),
(163, 'khfml315b686pdnv31qg98o6f5', 12, 100, 1, '2015-07-04 06:18:20'),
(165, 'h1r1qc69tgk3vulef5o4n4u3k0', 14, 150, 1, '2015-07-04 06:18:29'),
(166, '9mg357r1ttc1u1gj9jubob7rr1', 15, 160, 1, '2015-07-04 06:18:33'),
(167, 's8lbqtdslftdhv1he1q5dqvg45', 16, 120, 1, '2015-07-04 06:18:42'),
(168, 'eoivt3njfoo4n4pt0v7hod5d95', 17, 170, 1, '2015-07-04 06:18:46'),
(169, 'fqr2jjdlf4r8ebmthlo0kurf33', 12, 100, 1, '2015-07-04 12:39:26'),
(170, 'd7ns4btdf3vr1cgdjv4dduogd6', 13, 150, 1, '2015-07-04 12:39:27'),
(171, 'kmuiruqoc08jdrfn522knjdgo2', 14, 150, 1, '2015-07-04 12:39:29'),
(172, '76ke4at9sonkoaq55t9vcrbab7', 15, 160, 1, '2015-07-04 12:39:30'),
(173, 'dm3567u0h01v0o6ot7ekj2feb6', 16, 120, 1, '2015-07-04 12:39:32'),
(174, '9s9jmie8uuud4488p5jenor921', 17, 170, 1, '2015-07-04 12:39:33'),
(175, 'b5j2lpubvl4mqipdtbk2fjqt12', 18, 150, 1, '2015-07-06 14:16:00'),
(176, 'kfc4d7nurim3rpbul94vin7v63', 18, 150, 1, '2015-07-08 08:48:03'),
(177, 'hfbjvoos86updevec664pddpe0', 12, 100, 1, '2015-07-08 12:57:47'),
(178, '6eli40nop7aie42q7475bet980', 12, 100, 1, '2015-07-08 23:30:14'),
(179, 'fq833jhmqapl3uoj5lqs5mjb55', 15, 160, 1, '2015-07-08 23:30:15'),
(180, '2ih4ihpof5h3hb680t3iquiaq6', 16, 120, 1, '2015-07-08 23:30:17'),
(181, 'lci7r1ic2teg233u2u1v9e2df3', 18, 150, 1, '2015-07-09 17:33:42'),
(182, 'bu5nf1dpd3fmavp48mftscaks1', 17, 170, 1, '2015-07-10 00:08:11'),
(183, '6ea1u9pmobnldph9ma8b93cm21', 17, 170, 1, '2015-07-10 00:41:32'),
(184, 'c8kdgp06qcto1827lb6g2q12q5', 13, 150, 1, '2015-07-14 17:33:11'),
(185, '0cd7ve5vskogrusts9cs5hu2b3', 13, 150, 1, '2015-07-14 17:48:26'),
(186, '1k96g6udeqc79gpsooceqf7f96', 15, 160, 1, '2015-07-14 22:45:46'),
(187, 'efi6s172pmc6ra3jg92tfa24c1', 17, 170, 1, '2015-07-15 19:16:19'),
(188, 'tab9rvhnpomc2g3n0341nlp1n1', 17, 170, 1, '2015-07-15 19:31:25'),
(189, '4voovi3m20oaa5td7krlq1e7l5', 16, 120, 1, '2015-07-16 00:32:14'),
(190, 'mtj042psqke04fir7j79ifv8r2', 15, 160, 1, '2015-07-16 04:56:50'),
(191, '74gm89m0pp6a32gsjtc3lm2n71', 17, 170, 1, '2015-07-16 20:01:35'),
(192, 'e2ma2h6knhg784ocn48crugm92', 14, 150, 1, '2015-07-16 20:01:37'),
(193, '39op6csj7qjrvpn6676hqgu932', 13, 150, 1, '2015-07-16 20:01:41'),
(194, 'r97fdagla3ssibemds3pchbni7', 15, 160, 1, '2015-07-16 20:02:04'),
(195, 'ne8godhj0ao6bg6f4lt22okle2', 16, 120, 1, '2015-07-16 20:02:20'),
(196, 'lp8eucn9o17uuj40ruud298et2', 12, 100, 1, '2015-07-16 20:02:25'),
(197, '34j7v6m7i13br8dgoikv9thvh2', 17, 170, 1, '2015-07-17 05:14:00'),
(198, 'eisg5av0gb1d1up59ukpi86ro6', 17, 170, 1, '2015-07-17 08:13:43'),
(199, 'j3mcq8gcn8i95p0vtfsg7ghmj6', 14, 150, 1, '2015-07-17 08:40:22'),
(200, 'q7for89lagem1dd24aimu1lni7', 15, 160, 1, '2015-07-17 09:22:35'),
(201, 'rmpk0rus6cn3sblikv3pvda5e6', 15, 160, 1, '2015-07-17 09:39:00'),
(202, 'lj131ko28kh0nvhgnpq6vbq9r7', 15, 160, 1, '2015-07-17 09:54:13'),
(203, '1qjvgto2vcpoumdna9usn0nvn4', 16, 120, 1, '2015-07-17 11:17:03'),
(204, 'uo9673veimc0kgg15gtm2kgjd3', 12, 100, 1, '2015-07-17 15:40:32'),
(205, 'qipgf7ovkdgemr65pbcr8man76', 13, 150, 1, '2015-07-17 16:29:04'),
(206, 'n8bcd3h9v1l6geb0a2fn7ufid4', 15, 160, 1, '2015-07-17 21:23:27'),
(207, 'uqum63qa97f4cdqclvsmb2jt76', 14, 150, 1, '2015-07-18 11:50:25'),
(208, 'rredqeq0s4kk3d6efii25sslj6', 17, 170, 1, '2015-07-18 13:47:20'),
(209, '31cjtjlqk4cann761lmgv8mdr4', 12, 100, 1, '2015-07-19 12:31:16'),
(210, 'jtdr8gtgaq2gsec0nd3915aot2', 13, 150, 1, '2015-07-19 15:49:00'),
(211, 'sed3trft8d2ime5coudh1e6is2', 12, 100, 1, '2015-07-20 09:00:34'),
(212, '9s5qe8m8n3rmnncen34vbqkan3', 15, 160, 1, '2015-07-20 20:20:18'),
(233, 'lci7r1ic2teg233u2u1v9e2df3', 46, 170, 1, '2015-07-27 15:59:21'),
(217, 'jd7uhibogrf7su2b5ckii13r82', 12, 100, 1, '2015-07-21 18:53:59'),
(218, 'uhkaub7p5cgoeh6a4vud43h7k1', 13, 150, 2, '2015-07-22 14:57:35'),
(219, 'uhkaub7p5cgoeh6a4vud43h7k1', 12, 100, 1, '2015-07-22 14:57:52'),
(220, 'uhkaub7p5cgoeh6a4vud43h7k1', 18, 150, 1, '2015-07-22 14:57:58'),
(224, 'k7i08i9l5e25dgvat531h8ee25', 12, 100, 1, '2015-07-23 01:57:19'),
(238, 'oq2qkf9bv93uln3rm71qv6e7u1', 65, 180, 1, '2015-07-27 22:26:36'),
(234, 'as3o7pg00leamcgk5e2krm9lr4', 17, 170, 1, '2015-07-27 16:18:02'),
(237, 'rc0vlb8sleqpg71csb4fstjdf1', 40, 150, 1, '2015-07-27 22:15:43'),
(232, '5e9fsbkbbjsqfgplnfp9fq8d16', 18, 150, 1, '2015-07-26 22:19:58'),
(239, 's5jdlef8817h30817fqoqnv3m6', 14, 150, 1, '2015-07-27 22:30:23'),
(240, 'occ7cgupm0076u3skhcphfe3h2', 56, 120, 1, '2015-07-27 22:34:43'),
(241, '7ij38m0uobft09qm1a0utnhq62', 42, 180, 1, '2015-07-27 23:28:02'),
(242, '9iki919dddcdalj87ju877lof1', 41, 200, 1, '2015-07-28 01:38:17'),
(243, 'n4n5mbe1dpv42cbegstc2qjhr7', 18, 150, 1, '2015-07-28 02:44:35'),
(244, '6fejrbj6r4rus0qo918l8cvr51', 18, 150, 1, '2015-07-28 03:11:24'),
(245, 'v693dlfcate55gdu5pjpbmsh20', 18, 150, 1, '2015-07-28 08:03:46'),
(308, '53bjorttoie7md9vfvmltni5f2', 56, 120, 1, '2015-08-04 17:35:33'),
(249, '7um1a7s86dacajdlmu3fchh0b7', 26, 150, 1, '2015-07-28 15:53:04'),
(250, 'h57rlmi7rvhs1bfarkh9puq0v4', 18, 150, 1, '2015-07-29 01:46:14'),
(251, 'rpij1qprb6n57v580ofe9uf7p2', 12, 100, 1, '2015-07-30 23:20:06'),
(252, 'hoj9s90cfl0qi8mi9ugsjl0e83', 15, 160, 1, '2015-07-30 23:20:08'),
(253, 'mqp8p5rdnkr7mmtu8s05559kj2', 16, 120, 1, '2015-07-30 23:20:09'),
(254, 'tie7hj1khibrjtsrpoastlrsn5', 17, 170, 1, '2015-07-30 23:20:11'),
(255, 'd393f9t7j060ih68cfgishlsc0', 18, 150, 1, '2015-07-30 23:20:12'),
(256, 'cbaladl955hd8smitfhtksf5v1', 26, 150, 1, '2015-07-30 23:20:13'),
(257, 'lu68eifir3nqa2pvh4k77cor51', 41, 200, 1, '2015-07-30 23:20:15'),
(258, '8r4mu0qqhlahoo77aicluqn7k1', 42, 180, 1, '2015-07-30 23:20:16'),
(259, 'hmhj0rpshq4os5ma84odup64p4', 49, 170, 1, '2015-07-30 23:20:18'),
(260, '1hgqrkk7qjkng9id7vik810q01', 50, 170, 1, '2015-07-30 23:20:19'),
(261, '90qau0hqlpi3548dqdd3nas790', 51, 50, 1, '2015-07-30 23:20:20'),
(262, 'q3ojr51eh8bsa822cjre8v6cg6', 52, 60, 1, '2015-07-30 23:20:22'),
(263, 'gs23him4l3et62ikajq41fct43', 54, 100, 1, '2015-07-30 23:20:23'),
(264, 'og45jc0esqkvmbrn6kkpuiuhl0', 55, 100, 1, '2015-07-30 23:20:24'),
(265, '5i5g358cevs3uutf29lkcpl7p1', 60, 150, 1, '2015-07-30 23:20:26'),
(266, 'cggpsq1q7d3n8k7uidvfavdil5', 61, 170, 1, '2015-07-30 23:20:27'),
(267, '2ekvsgrjd6na2imviajnvmuuf5', 62, 200, 1, '2015-07-30 23:20:29'),
(268, '7bf44jd79t1bnpv296td2qi8d4', 63, 170, 1, '2015-07-30 23:20:30'),
(269, 'qvf4k4cf2fgf310jaf91egd896', 64, 200, 1, '2015-07-30 23:20:31'),
(270, 'gpabnaq3iblmcihl50r2pujgg7', 13, 150, 1, '2015-07-31 02:21:16'),
(271, 'ueuuiqlomddutl82s3rnjpehb3', 14, 150, 1, '2015-07-31 02:21:17'),
(272, 'tt7segv5udbshnuecog9k175n7', 40, 150, 1, '2015-07-31 02:21:19'),
(273, 'olm8ovlml57im4j4bhr5th4qi4', 53, 70, 1, '2015-07-31 02:21:23'),
(274, 'ea4gv810rk69phi2i35a4s2p16', 56, 120, 1, '2015-07-31 02:21:28'),
(275, 'mrvqclnlrlbpl1l1i5t38qmej6', 65, 180, 1, '2015-07-31 02:21:29'),
(276, '2todickduk53h7jrp8qah06mi0', 14, 150, 1, '2015-07-31 17:18:59'),
(277, 'h2h6va7trns4atnml2tr9s7j83', 15, 160, 1, '2015-07-31 17:19:01'),
(278, 'mulhp5tpahvchkdhq5fpb1pgm0', 16, 120, 1, '2015-07-31 17:19:04'),
(279, 'lkj3ce3ud6h4867muslamjsha2', 17, 170, 1, '2015-07-31 17:19:05'),
(280, '4gestvmqiq3vugsjtopugl80r4', 12, 100, 1, '2015-08-01 21:01:58'),
(281, 'k1b03tc1dhuo2ei7mgjhdenij7', 18, 150, 1, '2015-08-01 21:01:59'),
(282, '003ftj1qkrpk08b8ca7kj6mu16', 26, 150, 1, '2015-08-01 21:02:01'),
(283, 'f5r6vng0uidecf8jif0h7g0h30', 41, 200, 1, '2015-08-01 21:02:04'),
(284, 'mc5b06nalkntrkdcpqhdr3ejr0', 42, 180, 1, '2015-08-01 21:02:05'),
(285, '8fiih9lqlnd28b10n9p3ikptr2', 49, 170, 1, '2015-08-01 21:02:07'),
(286, '2bgu3p7t1b0vni69r6cb7g3i32', 50, 170, 1, '2015-08-01 21:02:08'),
(287, 'st8k9l74pqs2jl5lr8lr65nlb2', 51, 50, 1, '2015-08-01 21:02:10'),
(288, 't27ror7sm4d575kmdths3ht7m2', 52, 60, 1, '2015-08-01 21:02:16'),
(289, 'a8qgsuqh11lfo338ahjvb5mib7', 54, 100, 1, '2015-08-01 21:02:19'),
(290, '47hnjirfqh93glfhuko86uhqg0', 55, 100, 1, '2015-08-01 21:02:20'),
(291, 'g1183b7sui50tdvej8ocrf18c3', 60, 150, 1, '2015-08-01 21:02:23'),
(292, 'hu0qqh7smq3k51ps270r41pll2', 61, 170, 1, '2015-08-01 21:02:24'),
(293, 'r2puvbgqosenul97jkl4h6mcm4', 62, 200, 1, '2015-08-01 21:02:26'),
(294, 'nvdbmo37cvc7jubalkhoq7anu0', 63, 170, 1, '2015-08-01 21:02:27'),
(295, 'onohb5ch347bbdj4oht553dr61', 64, 200, 1, '2015-08-01 21:02:28'),
(302, '1nidn49cbic7h54qcp8pnhgm94', 52, 60, 3, '2015-08-03 20:32:27'),
(303, 'rg1an2ophkrm0o97quh1j55sb1', 13, 150, 1, '2015-08-03 21:22:25'),
(304, '6ha5s044hgi9hbmqe6uknh1j33', 40, 150, 1, '2015-08-03 23:52:57'),
(305, 'f9cs7n0q1g88db0etk4sabibl5', 40, 150, 1, '2015-08-04 03:46:08'),
(306, 'hnu3e01a865hnaook2tm699sg6', 40, 150, 1, '2015-08-04 04:01:18'),
(307, '7ar07li9jv00jsbp10ktqkqq05', 26, 150, 1, '2015-08-04 10:52:34'),
(310, 'bqicev0mlcj3ori0pva25b6a70', 12, 100, 6, '2015-08-04 23:28:40'),
(311, 'roag287k2ghvjto9l5m1ujfnl4', 14, 150, 1, '2015-08-05 08:41:04'),
(312, '37vd0r6n14q1avmh6pujns56i7', 40, 150, 1, '2015-08-05 16:11:35'),
(313, 'umustka5j4r7u80eq3e2umsdt4', 56, 120, 1, '2015-08-05 16:49:32'),
(314, 'umustka5j4r7u80eq3e2umsdt4', 14, 150, 1, '2015-08-05 16:49:58'),
(315, '93rirismc7apvrcmqgcjgn09s7', 14, 150, 1, '2015-08-05 22:14:25'),
(316, '93rirismc7apvrcmqgcjgn09s7', 65, 180, 1, '2015-08-05 22:14:29'),
(321, 'g22216gkpvcpipg9t403ia0ac1', 65, 180, 1, '2015-08-06 19:56:49'),
(319, 'psbaca9dfkn3iq9fui55erjb81', 65, 180, 1, '2015-08-06 08:02:51'),
(322, 'gbd7006m7tfhlqn59hbuv9oto4', 65, 180, 1, '2015-08-06 20:12:18'),
(323, 's00pio10c5j79m15m85hm7i1t5', 53, 70, 1, '2015-08-07 18:10:23'),
(324, 'o5sn6gbo6lcb5fvojmgio3m2l0', 52, 60, 1, '2015-08-08 09:01:22'),
(325, 'rqfqh6mdr8nkevvdp3u746u0o3', 64, 200, 1, '2015-08-09 00:29:46'),
(326, '5on3rqk676e8mbepprnc3jsfk3', 62, 200, 1, '2015-08-09 16:18:04'),
(327, 'hebmj6uggiaahfe4ircg9sd9j7', 13, 150, 1, '2015-08-09 21:49:03'),
(328, '0h7uf17qb0429mp4u5fh5a3216', 13, 150, 1, '2015-08-09 22:04:40'),
(329, 'rip4o1ca10sqe57rb2ffav5kd0', 13, 150, 1, '2015-08-09 22:20:48'),
(330, 'upah374qtsfbb0ja9ai8891ba7', 12, 100, 1, '2015-08-10 00:28:08'),
(331, 'l6jsp91o9hqudbju3hgr05jsi4', 18, 150, 1, '2015-08-10 05:27:18'),
(334, '2g2hrh3hjav4kuu4talku86a05', 60, 150, 1, '2015-08-10 13:15:43'),
(342, 't6gi0eto8o4e6kbl51lsr9ep43', 62, 200, 1, '2015-08-10 21:11:29'),
(341, 'ldai6vnudi8tqvpo2hlkiq1a91', 60, 150, 1, '2015-08-10 18:12:18'),
(343, 'dif2porhcrjtutrqr1gsjk7di5', 41, 200, 1, '2015-08-10 21:46:36'),
(344, 'gg7gb7qddnv384qbeusqt4ran4', 51, 50, 1, '2015-08-10 23:11:50'),
(345, 'lrkcbvl3l453sv409jhkrkbk45', 61, 170, 1, '2015-08-10 23:12:36'),
(346, '33jo7g0u2p49s6vjjdgdugpo45', 13, 150, 1, '2015-08-11 01:04:21'),
(347, '05gs6oq1eta5mhm472mhti4pt5', 26, 150, 1, '2015-08-11 03:58:48'),
(348, '23045sh165e2quas7fmqdrnsp3', 50, 170, 1, '2015-08-11 11:20:32'),
(349, 'jddde0126f3g0hsmikrl8vp0t3', 15, 160, 1, '2015-08-11 11:21:36'),
(350, 'bub1t9b5eon87d5ajpdrq5n7d3', 13, 150, 1, '2015-08-11 13:24:38'),
(351, 't3mso60n1so069f4i8gt53ito4', 65, 180, 1, '2015-08-11 13:25:14'),
(352, '1unbr0rom4lh0n10qbtdje6km7', 56, 120, 1, '2015-08-11 13:25:29'),
(353, 'i4ugtn5q4a59nd2139r67vuhq6', 53, 70, 1, '2015-08-11 13:25:48'),
(354, 'vaefacihuchbefl173iau0sv94', 40, 150, 1, '2015-08-11 13:26:11'),
(355, 'em4ro494bfd644njmktl062rl7', 49, 170, 1, '2015-08-11 13:34:39'),
(356, 's95uqhjrhcebkq49f5gg613s51', 52, 60, 1, '2015-08-11 13:35:48'),
(357, 'mbp7jd267auekhfjkesv5oc5u1', 55, 100, 1, '2015-08-11 13:36:05'),
(358, '5hfkknm67r5o48acb4mu9sfei3', 18, 150, 1, '2015-08-11 13:36:21'),
(359, 'de2ocvtqiuo87rtk2e98fngpc7', 41, 200, 1, '2015-08-11 13:36:35'),
(360, 'u3thb7hrmuh3kkmph1ijip2qr7', 63, 170, 1, '2015-08-11 13:36:50'),
(361, 'egprpha5775pkntadjm5ehnpk3', 64, 200, 1, '2015-08-11 13:37:06'),
(362, 'fou2au214nc88btd9l9p3im521', 17, 170, 1, '2015-08-11 13:37:21'),
(363, 'b6cblh7l1rg5b3tvoipg24q2t4', 54, 100, 1, '2015-08-11 13:37:37'),
(364, 'ebo38d1rj8eqffevqcr5nm9mb4', 42, 180, 1, '2015-08-11 13:37:52'),
(365, '70ujdjstfum7k6sv7rf806c584', 51, 50, 1, '2015-08-11 13:38:10'),
(366, 'jp41dbe0l14vh18qpjsurib1f7', 54, 100, 1, '2015-08-11 16:24:25'),
(367, 'it86d439vds6gbk7h52dkpovv3', 15, 160, 1, '2015-08-11 16:54:51'),
(368, '0bin6mcp6lqeftrmggrkdb44q7', 16, 120, 1, '2015-08-11 17:59:45'),
(369, 'jqcihlcl51l0mqqrvd1fu835o2', 42, 180, 1, '2015-08-11 23:40:29'),
(370, '0he0eqj2tdjcf3tp65pgfkvn84', 61, 170, 1, '2015-08-12 02:33:23'),
(371, 's77928k4lhjtptmmrknoqp08m6', 55, 100, 1, '2015-08-12 08:19:18'),
(372, 'i8aqksu4c4toe5g1gien0t4vf7', 63, 170, 1, '2015-08-12 15:08:39'),
(373, 'r21fnm6b4s0gqsc9f5irsa09m1', 18, 150, 1, '2015-08-12 15:09:22'),
(374, 'b7tif5k4hpb4vp96qidpshq7j0', 50, 170, 1, '2015-08-12 15:29:38'),
(375, 'cp4m9rv30j5q36l79vej25gc66', 17, 170, 1, '2015-08-12 17:52:55'),
(376, 'p7tvauickbu8t7fsn0pecga3v0', 49, 170, 1, '2015-08-13 01:00:25'),
(377, 'jd2gc777tfqe98f9q5krhbp8b0', 53, 70, 1, '2015-08-14 12:32:15'),
(378, 'pu2d83vcsh40ao3oalf0ueu134', 16, 120, 1, '2015-08-14 12:50:43'),
(379, 'i0abjvlbk69ke2q6o09mbu3am3', 26, 150, 1, '2015-08-14 12:51:32'),
(380, 'eui1qe4i7uumioo5mrlot7h242', 12, 100, 1, '2015-08-14 21:28:22'),
(381, '7ttt3nqqalda1ra3kv4ke49af1', 18, 150, 1, '2015-08-14 21:28:23'),
(382, '7e2f6oie3bglk567idiiqc6bs4', 26, 150, 1, '2015-08-14 21:28:25'),
(383, '1l1qalhpeg2felmsfi56css821', 41, 200, 1, '2015-08-14 21:28:26'),
(384, '537n14g28v6islr86m7ptd1md0', 42, 180, 1, '2015-08-14 21:28:28'),
(385, '674os9namb4e2ga8767crk2bh0', 49, 170, 1, '2015-08-14 21:28:30'),
(386, 'fm4dsfq29m8s1tga4vigp365g2', 51, 50, 1, '2015-08-14 21:28:32'),
(387, '006cn9s4t7vkgkpkhge59muv47', 52, 60, 1, '2015-08-14 21:28:33'),
(388, 'k7eiu5cjh2f2gpo86hdpm0r2g0', 54, 100, 1, '2015-08-14 21:28:35'),
(389, 'la5bpebsluacvpek5suehvoms7', 55, 100, 1, '2015-08-14 21:28:36'),
(390, '46s1nljados9eib91s7ma61rc1', 60, 150, 1, '2015-08-14 21:28:37'),
(391, 'dl10dva6h6gftba4dnkjvh9lh2', 61, 170, 1, '2015-08-14 21:28:39'),
(392, 'p5oun3fp23gssn6cg0pqnpbnj7', 62, 200, 1, '2015-08-14 21:28:40'),
(393, 'k0oro3mt8u99sv9eu91eco6267', 63, 170, 1, '2015-08-14 21:28:42'),
(394, 'koqhmhsdeuenv4rc1mqr05j7b1', 64, 200, 1, '2015-08-14 21:28:44'),
(395, '47phkt30fu75reec7nm0mnruh0', 40, 150, 1, '2015-08-15 04:59:03'),
(396, 't7p8f782kfvd1psl69vm43o3e2', 56, 120, 1, '2015-08-15 04:59:05'),
(397, '4fv6635mcv1iq7dbbncdqd1qn4', 65, 180, 1, '2015-08-15 04:59:05'),
(398, 'r8pk16qcqefdihu5q4jdbab9m5', 53, 70, 1, '2015-08-15 04:59:06'),
(399, 'uht7bakkps7k0o7gbfdn86s9g5', 14, 150, 1, '2015-08-15 04:59:24'),
(400, 'd3g7e6f9rmqd8e975hunoj9ae2', 13, 150, 1, '2015-08-15 04:59:33'),
(401, 'k422t222lsi232mfi2h310eej5', 50, 170, 1, '2015-08-15 16:55:18'),
(402, 'k9d1vkq40ecmndg2iqe3ln78p7', 26, 150, 1, '2015-08-16 05:07:01'),
(403, '0kblol02lu0vusa0nmnmmpomg3', 26, 150, 1, '2015-08-16 17:36:23'),
(404, '6766knp8it2e75mgl08v5c4er0', 49, 170, 1, '2015-08-17 01:02:09'),
(405, 'lhfiki04hd3o3hjglhjjdm6rp5', 60, 150, 1, '2015-08-17 14:54:44'),
(406, 'mhg4t8a50nvv8n11advjtflrb1', 61, 170, 1, '2015-08-17 14:56:32'),
(407, '276845vb9ncsf0k3589690i2t3', 62, 200, 1, '2015-08-17 14:57:43'),
(408, '4e2ksm8c4nto5g9b4iv2phhq31', 13, 150, 1, '2015-08-17 20:30:13'),
(409, '2bgjqeoero9f13uuia0d3utk06', 13, 150, 1, '2015-08-17 20:45:24'),
(410, 'p48mi13ea9sq4ufhk3im74ala1', 63, 170, 1, '2015-08-18 10:18:30'),
(411, 'v1h6anckh51dqpbmrdhil8jf66', 18, 150, 1, '2015-08-18 11:43:50'),
(412, 'rmmkku11mth65t8iup94ml72n7', 18, 150, 1, '2015-08-18 17:04:40'),
(413, 'hb5jhdd62g2ft8i6bs6vft26q6', 64, 200, 1, '2015-08-18 17:55:10'),
(414, '50bptvo1bqea1a1n5e0dmks615', 16, 120, 1, '2015-08-18 23:11:06'),
(415, 'oes6vferptiujn0mqrdgnnjsc0', 55, 100, 1, '2015-08-18 23:30:35'),
(416, 'j8it1sebood61jkv3rjbh3ooi3', 56, 120, 1, '2015-08-19 06:35:38'),
(417, 'oi2q0sj2j9paaktlb3de501te5', 56, 120, 1, '2015-08-19 10:45:18'),
(418, 'riprkoqi44ic9amaib71eh55n6', 40, 150, 1, '2015-08-19 11:03:58'),
(419, 'om4pnu8rr6p2399e82j00ibgk5', 12, 100, 1, '2015-08-19 21:54:40'),
(420, 'j8fhcpeu0kvt5epa5g3f4clk74', 14, 150, 1, '2015-08-19 21:54:40'),
(421, '2blv3hlpvaoks0uo9uoo5let35', 18, 150, 1, '2015-08-19 22:38:30'),
(422, 'isl1nse4bge0ul5r2jc1vhr541', 41, 200, 1, '2015-08-20 08:39:16'),
(423, 'ogs1dvlvclrsjiti01ve2148r7', 56, 120, 1, '2015-08-20 11:21:46'),
(424, 'puvim23u6tm8qmq835q20p5232', 41, 200, 1, '2015-08-20 15:36:59'),
(425, 'buhadiojfbkmco4vielsl46le3', 12, 100, 5, '2015-08-20 20:04:01'),
(426, 'jb900475nhc4bfqssj2rflu346', 42, 180, 1, '2015-08-20 23:13:27'),
(427, 'l9uskod531vtnpdjbltmis68l3', 12, 100, 1, '2015-08-21 01:18:23'),
(428, 'qq3obo88jh03mn4paqddjgl8v6', 18, 150, 1, '2015-08-21 01:18:28'),
(429, 'dinjkeh8onumqrrsop0e1qeo77', 26, 150, 1, '2015-08-21 01:18:29'),
(430, 'lo36pk1ducft8v34qcu2osh0m1', 41, 200, 1, '2015-08-21 01:18:32'),
(431, 'hovj6qft0a7avbm891u8rntei5', 42, 180, 1, '2015-08-21 01:18:35'),
(432, '6m66dhgqsnclbr9k320l2qce67', 50, 170, 1, '2015-08-21 01:18:38'),
(433, 'nduqt0qn545m5gdm7854i7en64', 52, 60, 1, '2015-08-21 01:18:41'),
(434, 'i3n950qgtvf17n688ol4oj3vl3', 54, 100, 1, '2015-08-21 01:19:13'),
(435, 'mearbkeg2dhljh2ldurstsdna4', 55, 100, 1, '2015-08-21 01:19:17'),
(436, '54ja3mkumdhdcbajk4g2l24r36', 60, 150, 1, '2015-08-21 01:19:22'),
(437, 'vojkeggh33k3vvr787r7a3d4m7', 61, 170, 1, '2015-08-21 01:19:26'),
(438, '558jq4cohp2kglee0r4vaso004', 62, 200, 1, '2015-08-21 01:19:33'),
(439, '17lkrrjtthnjenulmpupovmr50', 63, 170, 1, '2015-08-21 03:04:50'),
(440, '1jph4dmf5ptel54km02c17j2r7', 41, 200, 1, '2015-08-21 07:42:55'),
(441, 'ogin4ircsnff62abm6ml7ma947', 13, 150, 1, '2015-08-21 09:00:11'),
(442, 'on9tqdil6v62ppvsqdofrfs0t4', 42, 180, 1, '2015-08-21 10:10:06'),
(443, '1qtogaav3nurhfem51up6l3uc3', 55, 100, 1, '2015-08-21 11:46:31'),
(444, 'ncbpp1487omfivn0gqgna3ra44', 13, 150, 1, '2015-08-21 15:52:12'),
(445, '8luj0bo9h2vjprl1jjkn36av12', 41, 200, 1, '2015-08-21 17:19:53'),
(446, 'i5o76454vl3ami86t0p952c8e6', 40, 150, 1, '2015-08-22 03:53:07'),
(447, '1p9cv8ejnuqrqn1fmfnvljb2v7', 14, 150, 1, '2015-08-22 09:52:22'),
(448, '1ufn3fm7fam2si9ubpcbc42om3', 42, 180, 1, '2015-08-22 11:57:08'),
(449, 'o5mhbf7pqsga6hr4r25stc0pr7', 17, 170, 1, '2015-08-22 17:08:34'),
(450, 'bak738b6h1k5l3rlr2v3odkbk4', 65, 180, 1, '2015-08-22 18:55:10'),
(451, 'gbffjqb6d4ulm854i2tsqebgo2', 55, 100, 1, '2015-08-22 23:17:05'),
(452, 'o3rtkvqhu8ranhjbbihqmmd437', 65, 180, 1, '2015-08-23 01:14:02'),
(453, 'oicjkfd7iqqgqns1iauem4cbh1', 13, 150, 1, '2015-08-23 02:04:02'),
(454, 'heu14hcl3664hckgcm7ne3fno4', 40, 150, 1, '2015-08-23 14:46:30'),
(455, '0ooshc6st7eesgld147osgeo42', 56, 120, 1, '2015-08-24 00:00:23'),
(456, 'aeaqqrt1dg9gtetus5ulkg0o34', 65, 180, 1, '2015-08-24 01:45:49'),
(457, '750nvmec8634qv45qopn71s9u7', 40, 150, 1, '2015-08-24 03:58:52'),
(458, 'jpj6jqb7u299l5q3183a144t55', 40, 150, 1, '2015-08-24 04:13:57'),
(459, '1b4798t144a9jaggstkjiupq92', 50, 170, 1, '2015-08-24 06:10:13'),
(460, '8rkg09h76ui3n3j8ibrqc7c7m5', 40, 150, 1, '2015-08-24 06:46:59'),
(461, 'q058catvqd0mmpidt02ho7kv32', 53, 70, 1, '2015-08-24 06:47:17'),
(462, 'lbon0nj4kd407au6sdf2euqdr0', 56, 120, 1, '2015-08-24 06:47:22'),
(463, 'bkb5f8mf8v2af19rsu0tsqb743', 65, 180, 1, '2015-08-24 06:47:26'),
(464, 'sp8tidkcep031pl9u36ismrml2', 12, 100, 1, '2015-08-24 18:26:55'),
(465, 'm4g8v7tnugmgonha58gajaj8c1', 18, 150, 1, '2015-08-24 18:26:56'),
(466, 'hvqhjdg0v8ch24eq694gf96up4', 26, 150, 1, '2015-08-24 18:26:58'),
(467, 'u6qnvvd594a3ks15d1m5op4jc3', 41, 200, 1, '2015-08-24 18:27:00'),
(468, '9s5cpje4m801m14fevn6kl0sj5', 42, 180, 1, '2015-08-24 18:27:01'),
(469, '071jlpe6c12hma6s24vbpj7hk4', 50, 170, 1, '2015-08-24 18:27:03'),
(470, '6cu7m3nv0amr9brf1580s41343', 51, 50, 1, '2015-08-24 18:27:04'),
(471, '49gpqien4m97t25tp31orm3vd0', 52, 60, 1, '2015-08-24 18:27:06'),
(472, 'gv5icptvbt892q9224sjr2qq65', 54, 100, 1, '2015-08-24 18:27:07'),
(473, 'hgnp20fsn4jo7l08o6135vfri2', 55, 100, 1, '2015-08-24 18:27:09'),
(474, 'u50bbeuocdv2vf11lbr9h3pva0', 60, 150, 1, '2015-08-24 18:27:10'),
(475, 'tddhmp911b1f1dmhlorlqbfdm6', 61, 170, 1, '2015-08-24 18:27:12'),
(476, 'ea415l46315b0g5s1603uultm7', 62, 200, 1, '2015-08-24 18:27:14'),
(477, 'psgkd93pnmge5c5gcc39b3qt72', 40, 150, 1, '2015-08-25 18:29:59'),
(478, 'uotft67qpm2s67lc4tn17taio7', 42, 180, 1, '2015-08-26 15:07:56'),
(479, 's5prktdgkvfi4b7q7imbdogh13', 65, 180, 2, '2015-08-26 16:07:08'),
(480, 'a251ciiv4sd6r4jb3mqt07rni2', 12, 100, 1, '2015-08-26 18:54:42'),
(481, 'tjif559r763jk3agcq39mn3vc5', 65, 180, 1, '2015-08-28 02:27:56'),
(482, 'g6pvid4kpjohnj4ogf5p05ge55', 56, 120, 1, '2015-08-28 12:12:45'),
(483, '74nktf9mksqpls0sv559d3mio1', 56, 120, 1, '2015-08-28 12:47:58'),
(484, 'ieh7782rem2eph2b1hbn3k02e0', 12, 100, 1, '2015-08-28 22:43:53'),
(485, 'qimoetp6dv0r8659clmvliogs1', 18, 150, 1, '2015-08-28 22:43:54'),
(486, 'hn738h5ml3mi1qiubla22mia50', 26, 150, 1, '2015-08-28 22:43:56'),
(487, 'd77c9si1pr6d4usi9e9is31fa1', 41, 200, 1, '2015-08-28 22:43:58'),
(488, 'asnis2oh3nb14vjak4obqbevu1', 42, 180, 1, '2015-08-28 22:44:00'),
(489, '94us2m7ou2gljivs5ikgcimg14', 49, 170, 1, '2015-08-28 22:44:02'),
(490, '70qvcv0qb423ia9jmn67h66cf1', 50, 170, 1, '2015-08-28 22:44:03'),
(491, 'tgn1ueto1p7bbu9c7tt1i02ha0', 51, 50, 1, '2015-08-28 22:44:05'),
(492, '7vv3kffjq3ubeui9hc22r6jlc2', 52, 60, 1, '2015-08-28 22:44:07'),
(493, 'p6h7kuhkjcoj98m0svi2eg1if1', 54, 100, 1, '2015-08-28 22:44:08'),
(494, 'pmncqmg4k92t305d6b7m9gd803', 55, 100, 1, '2015-08-28 22:44:10'),
(495, 'g9kcjsmoi38j857318vf25nho3', 63, 170, 1, '2015-08-28 22:44:14'),
(496, 'mb9f76d909d807shbr16mapv25', 64, 200, 1, '2015-08-28 22:44:17'),
(497, '1a2ha1oghafmdvr3pi5l02qph1', 40, 150, 4, '2015-08-31 01:30:02'),
(498, '46eiuu6cheo9qo0r8789fu5ab0', 18, 150, 1, '2015-08-31 06:28:26'),
(499, '83hpn2bascfrbidkurkl08tqs2', 16, 120, 1, '2015-08-31 19:20:21'),
(500, '21shrfkir1t61n76rbh91m06v4', 18, 150, 1, '2015-09-01 04:09:17'),
(501, 'k5morac8vjggkrn7ofqenmpnb0', 14, 150, 1, '2015-09-01 09:06:09'),
(502, '2jo81aiplhhj098dags1446c94', 14, 150, 1, '2015-09-01 09:21:30'),
(503, '3f1o31ritlorqjb18quf3o3m15', 26, 150, 1, '2015-09-01 15:06:18'),
(504, 'ninlu6n38ck0987q9hvkf9r0j2', 18, 150, 1, '2015-09-01 16:07:46'),
(505, 'r2lgb7t0disch5m56fqanvpgo1', 12, 100, 1, '2015-09-01 16:22:03'),
(506, '21k9f0pmip2kpoca6q28rjnbl7', 12, 100, 1, '2015-09-02 12:05:59'),
(507, '8jdfbq4ibcol7ln4bnjlsgk6d1', 18, 150, 1, '2015-09-02 12:06:00'),
(508, 'hhrd1cird9edjqs99680ocvvs6', 26, 150, 1, '2015-09-02 12:06:02'),
(509, 'aumeuir2gvbqe0mkdskgidggk2', 41, 200, 1, '2015-09-02 12:06:03'),
(510, 'tbm95195dc35sqsle8gthht6n2', 42, 180, 1, '2015-09-02 12:06:04'),
(511, 'st6joi219qi6ggbge0rcglc437', 50, 170, 1, '2015-09-02 12:06:06'),
(512, 'ct90r2n49og6gkgi3a2boafde7', 51, 50, 1, '2015-09-02 12:06:07'),
(513, 'lid8jt3e26b365e00hqt0l36n3', 52, 60, 1, '2015-09-02 12:06:09'),
(514, 'o06tqa5ehqtrpk77f0od6i1mo3', 54, 100, 1, '2015-09-02 12:06:10'),
(515, '71krcj63ct3ghdav30qh395q55', 55, 100, 1, '2015-09-02 12:06:11'),
(516, 'gisjcg0mvi3v3pint1erinv2l2', 18, 150, 1, '2015-09-03 04:14:34'),
(517, 'acn60126gpctvig8r3jbf20p37', 40, 150, 2, '2015-09-03 15:21:10'),
(518, 'acn60126gpctvig8r3jbf20p37', 53, 70, 1, '2015-09-03 15:21:13'),
(519, '27b26mqlig3bsclnbc0bkp62i0', 65, 180, 1, '2015-09-03 18:23:20'),
(520, '9sh52vg19n65rfq36uj64bfs97', 65, 180, 1, '2015-09-03 18:38:22'),
(521, 'mbm3dv0pjte752tt7fdum90lf6', 65, 180, 21, '2015-09-03 18:42:02'),
(522, '0h10nmdp5a1n2o1dg9km8m40a4', 15, 160, 1, '2015-09-03 20:47:02'),
(523, 'emcd1bs2hrsf84f9a8as85qbb7', 50, 170, 1, '2015-09-04 03:06:24'),
(524, '27i6uig7lgu5e41si4rloj8013', 14, 150, 1, '2015-09-04 04:21:44'),
(525, 'r3r5408u1315vd80s7fguin6v5', 13, 150, 1, '2015-09-05 03:00:23'),
(526, 'td47lkik30p2nc5ctrs6lfsm07', 42, 180, 1, '2015-09-05 04:02:19'),
(527, 'l7884i54knnjiilha6kc792923', 17, 170, 1, '2015-09-05 06:22:09'),
(528, 'egaqq006c8igfi3evlsd12c6s1', 54, 100, 1, '2015-09-05 08:47:07'),
(529, 'q5trpu89mettilr5g97entsbt1', 50, 170, 1, '2015-09-05 09:16:15'),
(530, 'p9d73i67khr5799u4tcu86deh6', 12, 100, 1, '2015-09-05 16:20:03'),
(531, '4qp79iusm5551ao3vf6sf6tvv5', 18, 150, 1, '2015-09-05 16:20:05'),
(532, 'm9so2m87rvjaj22qb8dpvfvl65', 26, 150, 1, '2015-09-05 16:20:08'),
(533, '5ek1tifjmnakhiqha6ufva4si1', 41, 200, 1, '2015-09-05 16:20:10'),
(534, 'co5laplc2sbpcm4echfpmr6ps0', 42, 180, 1, '2015-09-05 16:20:11'),
(535, 'c5tlbhdijlc4ha91gjqkl2cpl7', 49, 170, 1, '2015-09-05 16:20:13'),
(536, 'fh1ufq01k8pdoriru2ighce5n6', 50, 170, 1, '2015-09-05 16:20:14'),
(537, 'qupbv84o40u3nf3j84kjne4vb1', 51, 50, 1, '2015-09-05 16:20:15'),
(538, '2dga84etv3v7immurfjte4c3n7', 52, 60, 1, '2015-09-05 16:20:17'),
(539, '1cjhk6egntgln2mkhhpl64moa4', 54, 100, 1, '2015-09-05 16:20:18'),
(540, 'be1klo367t3i7m55iab67a26a6', 55, 100, 1, '2015-09-05 16:20:20'),
(541, 'np81qd74f9nrn22tpdu6pc5nf5', 60, 150, 1, '2015-09-05 16:20:21'),
(542, '5ued54db5r35rm0b11onfuqv96', 61, 170, 1, '2015-09-05 16:20:23'),
(543, 'i2ci5tav9953io4r35u0r0cf50', 62, 200, 1, '2015-09-05 16:20:32'),
(544, 'cq1hnismu3jbhetk8lu71bv0p7', 63, 170, 1, '2015-09-05 16:20:33'),
(545, 'jmggg6qn4u8aokdo0nsdd86n53', 64, 200, 1, '2015-09-05 16:20:34'),
(546, 'nvgh4inhtreaacm45tpkp198p3', 49, 170, 1, '2015-09-06 01:32:56'),
(547, 'gqts3936lp83apljanj1p63j46', 60, 150, 1, '2015-09-06 01:32:58'),
(548, 'ogdlidmksfia1tts7lsqodqn11', 61, 170, 1, '2015-09-06 01:32:59'),
(549, 't6i006nqaa6md3e4grr1o1opi3', 62, 200, 1, '2015-09-06 01:33:01'),
(550, 'ak1qpfsefc3k4fm54v5q8818d2', 63, 170, 1, '2015-09-06 01:33:02'),
(551, 's5ha10hnbntcglcuc4gnmbtbl5', 64, 200, 1, '2015-09-06 01:33:03'),
(552, 'sgr680og9q5mdk0h1g98rvsbg2', 13, 150, 1, '2015-09-06 10:11:14'),
(553, 'peofj42qu9fq73mv750jd40d94', 42, 180, 1, '2015-09-06 15:17:17'),
(554, 'ji2v579o17abeh2k3jmuug7id5', 17, 170, 1, '2015-09-06 19:37:47'),
(555, 'jqf64kcsnnjt75b8v0nqqgdfh5', 56, 120, 1, '2015-09-07 03:41:30'),
(556, 'jqf64kcsnnjt75b8v0nqqgdfh5', 65, 180, 1, '2015-09-07 03:41:33'),
(557, 'jqf64kcsnnjt75b8v0nqqgdfh5', 14, 150, 1, '2015-09-07 03:41:34'),
(558, 'jqf64kcsnnjt75b8v0nqqgdfh5', 40, 150, 1, '2015-09-07 03:41:35'),
(559, 'jqf64kcsnnjt75b8v0nqqgdfh5', 13, 150, 1, '2015-09-07 03:41:36'),
(560, 'jqf64kcsnnjt75b8v0nqqgdfh5', 53, 70, 1, '2015-09-07 03:41:37'),
(561, 'jqf64kcsnnjt75b8v0nqqgdfh5', 61, 170, 1, '2015-09-07 03:41:41'),
(562, 'jqf64kcsnnjt75b8v0nqqgdfh5', 62, 200, 1, '2015-09-07 03:41:43'),
(563, 'jqf64kcsnnjt75b8v0nqqgdfh5', 60, 150, 1, '2015-09-07 03:41:44'),
(564, 'jqf64kcsnnjt75b8v0nqqgdfh5', 15, 160, 1, '2015-09-07 03:41:46'),
(565, 'jqf64kcsnnjt75b8v0nqqgdfh5', 50, 170, 1, '2015-09-07 03:41:47'),
(566, '6l16nktqf12ogvd9bdcegu3no0', 13, 150, 1, '2015-09-07 07:52:31'),
(567, '2fn58bmu6vnae2rc3tid2pag43', 14, 150, 1, '2015-09-07 07:52:31'),
(568, '9662q7bnbu3s89nt9i18fq3a76', 40, 150, 1, '2015-09-07 07:52:31'),
(569, 'kqsclnh7ndjt7qrtcddi8amn94', 53, 70, 1, '2015-09-07 07:52:31'),
(570, '42kaos167rske90okuhgg7dmi1', 56, 120, 1, '2015-09-07 07:52:32'),
(571, 'n1p3sthcf868d9dfv569i9g504', 65, 180, 1, '2015-09-07 07:52:32'),
(572, 'abu4966a6602b3p597bh9qkar1', 65, 180, 1, '2015-09-07 07:52:33'),
(573, 'jba3favhuhgi2m8il7m6mete45', 13, 150, 1, '2015-09-07 07:52:35'),
(574, 'nkl9886okob3k3pc2c8oe56c77', 14, 150, 1, '2015-09-07 07:52:35'),
(575, 'rcrmbtnrtnngs1lvk814tp07t7', 40, 150, 1, '2015-09-07 07:52:35'),
(576, 'hmgjlc87pe6h2o4puoha32eh74', 53, 70, 1, '2015-09-07 07:52:35'),
(577, '60giltcq2kin1f60kt6vpr6i57', 56, 120, 1, '2015-09-07 07:52:35'),
(578, 'vikleonr0npasfj3qs7ms7c923', 65, 180, 1, '2015-09-07 07:52:35'),
(579, 'og92r8qbv24r6mm5c2bgi42qk1', 65, 180, 1, '2015-09-08 07:10:48'),
(580, 'er0jnhkrv4k5gbe4tfp4imagn0', 13, 150, 1, '2015-09-08 08:26:35'),
(581, 'kaq2cqc0tpfgs7c534nd321l15', 56, 120, 1, '2015-09-08 09:42:22'),
(582, 'q6o068aegajafsgr905ei0e413', 53, 70, 1, '2015-09-08 10:58:09'),
(583, '62avhh77kmehbcem5vf5tkd626', 40, 150, 1, '2015-09-08 16:02:02'),
(584, '5os6ii0e76va3p8lssd7rhbr45', 16, 120, 1, '2015-09-08 23:15:38'),
(585, 'ehtimtl8tvpk82kb48gb1q78i2', 13, 150, 1, '2015-09-09 06:03:44'),
(586, 'uidjtk3r82sn3oa2podjvppdc0', 17, 170, 1, '2015-09-09 08:03:34'),
(592, 't5chu2mt9aaqngrs3b8mng2292', 65, 180, 1, '2015-09-10 01:09:41'),
(593, 's3fn5l8nut1a1pbmfb06kar500', 65, 180, 1, '2015-09-10 01:24:42'),
(594, 'g8e964qmf5dp3e23r5qljto9d2', 52, 60, 1, '2015-09-10 01:44:54'),
(595, 'o1mv27me733tt3194vu5hh20u7', 55, 100, 1, '2015-09-10 03:00:41'),
(596, '6touas0u8ktnlai6s5g3e4oj54', 49, 170, 1, '2015-09-10 05:32:15'),
(597, 'l07haqvptjjlc3p3qh79gern06', 18, 150, 1, '2015-09-10 08:03:49'),
(598, 'lna04in9ob08nepqi7fdfv7ea5', 17, 170, 1, '2015-09-10 11:51:21'),
(599, 'mcirrgmicg6q5p186craramgj7', 18, 150, 1, '2015-09-10 13:07:48'),
(600, 'sc16etmid2cselbe89gboocs26', 51, 50, 1, '2015-09-10 15:38:31'),
(601, 'k3fcrl4l6tku6l8vfk8v3ac9k5', 41, 200, 1, '2015-09-10 16:54:18'),
(602, 'chegdqs14io88kbo4rr6oi8fn0', 63, 170, 1, '2015-09-10 18:10:05'),
(603, 's7v29ung31brgfmv0v20h1rmd2', 64, 200, 1, '2015-09-10 19:26:14'),
(604, 'e79tatqhre64kl7l9fjo88p7j7', 54, 100, 1, '2015-09-10 20:41:40'),
(605, 'ef0ilevlvpmodjkh07lvlnak05', 60, 150, 1, '2015-09-10 20:50:53'),
(606, 'u92m3pbf2q911d97nmosk7qpi4', 61, 170, 1, '2015-09-10 20:51:07'),
(607, 'fhgsmnkov221bni0il1jtf2031', 62, 200, 1, '2015-09-10 20:51:19'),
(608, '3km87ofclce0ms49ahr76adnc7', 63, 170, 1, '2015-09-10 20:51:21'),
(609, 'k0sltqin1l9icv7i9pcur59227', 64, 200, 1, '2015-09-10 20:51:33'),
(610, 'a0hmkl7e07regm1sckbd6tnig1', 42, 180, 1, '2015-09-10 21:57:26'),
(611, 'taocg0c1hdmtvc2vvblcnmuf75', 40, 150, 1, '2015-09-11 04:25:43'),
(612, 'd6limlopg6u3muk11ctb1oueu7', 40, 150, 1, '2015-09-11 04:40:51'),
(613, '2p8072krnivocsbjgvd9j06vl1', 56, 120, 1, '2015-09-11 14:08:37'),
(614, 'qmh6ggqmkic3vg2p95lpb4unt4', 56, 120, 1, '2015-09-11 14:38:40'),
(615, '9h2bg0dsp19jrl8f2la5setsb4', 13, 150, 1, '2015-09-11 17:51:19'),
(616, '4qk94jbts92g1uer08n1bd8ma5', 14, 150, 1, '2015-09-11 17:51:20'),
(617, 'u75kprdqadq6nu9ejf5jis0l93', 17, 170, 1, '2015-09-11 17:51:22'),
(618, '05ekjbkeu8ovfqqvg6gkqheut7', 40, 150, 1, '2015-09-11 17:51:23'),
(619, '03mg6lh3et72uf3kln5lujhr42', 49, 170, 1, '2015-09-11 17:51:25'),
(620, '46fapbjnphpnes94uo3iooqf41', 53, 70, 1, '2015-09-11 17:51:26'),
(621, 't0tr0kooq67ocs6egja6tmjag7', 56, 120, 1, '2015-09-11 17:51:28'),
(622, 'bpun1mamrrhv2vs81mvr1c5067', 65, 180, 1, '2015-09-11 17:51:29'),
(623, '9eug2k81ff8vfv8cb6qkijia06', 13, 150, 1, '2015-09-12 02:31:40'),
(624, '1t73amj1509bgbdotk8oraql60', 14, 150, 1, '2015-09-12 02:31:42'),
(625, '8fsr4rgkupieisql3ng7eehc96', 40, 150, 1, '2015-09-12 02:31:44'),
(626, '31rhckf0d795vnui38nqj21bg0', 53, 70, 1, '2015-09-12 02:31:46'),
(627, 'eiaknheetgl40ei3ji56jdsa40', 56, 120, 1, '2015-09-12 02:31:48'),
(628, 'dg22lvjd2ubu4uhui417jgbeh1', 65, 180, 1, '2015-09-12 02:31:50'),
(629, '1g07b6tjnmcmaslnb7pq2lar95', 56, 120, 1, '2015-09-12 18:11:53'),
(630, 'm213ce7jpsmueqnndvpnghvjr0', 53, 70, 1, '2015-09-12 18:11:53'),
(631, 'enbljc9gb4p22g9q1j0j2qkla7', 14, 150, 1, '2015-09-12 18:11:54'),
(632, 'ekfstd01pmikudqhd3vtrk6nq2', 40, 150, 1, '2015-09-12 18:11:54'),
(633, '8im1e875pc75smhd375qsj09o4', 13, 150, 1, '2015-09-12 18:11:55'),
(634, '2lnd6ud60drvbnn58ph90r65t3', 65, 180, 1, '2015-09-12 18:11:55'),
(635, '24utohthhbpl0onstlepl75nr2', 17, 170, 1, '2015-09-15 06:14:10'),
(636, '6ajus77c3vmrk517nj4hskak42', 18, 150, 1, '2015-09-15 06:14:16'),
(637, 't37sfno9m0dohdp2r717ftbc96', 49, 170, 1, '2015-09-15 06:14:19'),
(638, 'gp637ma55o2hb6itfj8clqo0b0', 51, 50, 1, '2015-09-15 06:14:22'),
(639, '8gg03o5m11gq71dtbop6qghu70', 60, 150, 1, '2015-09-15 06:14:26'),
(640, 'vj9ccrpgnmmh9s6a8lic991qu2', 61, 170, 1, '2015-09-15 06:14:30'),
(641, '6he7msgbpg20j4s82hefep2kk5', 62, 200, 1, '2015-09-15 06:14:33'),
(642, '4uhnvqcpvvkr7tjpkgtkkmaqk7', 63, 170, 1, '2015-09-15 06:14:39'),
(643, 'icfqi3j3b9o9sfauevjr494sb7', 64, 200, 1, '2015-09-15 06:14:41');

-- --------------------------------------------------------

--
-- Структура таблицы `order_config`
--

CREATE TABLE IF NOT EXISTS `order_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notice_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `order_config`
--

INSERT INTO `order_config` (`id`, `notice_email`) VALUES
(2, 'dimon9107@yandex.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `order_customers`
--

CREATE TABLE IF NOT EXISTS `order_customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `adress` varchar(1000) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Дамп данных таблицы `order_customers`
--

INSERT INTO `order_customers` (`id`, `name`, `email`, `adress`, `phone`) VALUES
(3, 'name', 'dispetcher.bikow@yandex.ru', '', '435345345'),
(14, '123123', '123123@mail.ru', '123123', '123123'),
(5, 'sadfsdfvsdf', 'sfsfs@mail.ru', '', '123213123'),
(10, 'jtju', 'eremin_100_93@mail.ru', '', '123213123'),
(15, 'Дмитрий', 'dimon9107@yandex.ru', 'Пенза', '1234567'),
(16, 'Дмитрий', 'dimon9107@yandex.ru', 'Пенза', '1234567'),
(17, 'Дмитрий', 'dimon9107@yandex.ru', 'Пенза', '1234567'),
(18, 'Дмитрий', 'dimon9107@yandex.ru', 'Пенза', '1234567'),
(19, 'Дмитрий', 'dimon9107@yandex.ru', 'Пенза', '1234567'),
(20, 'варапр', 'zakazstroy@bk.ru', '56656', '5465'),
(21, 'Феоктист', 'fs@fd.ru', 'роорп hgjhggj jhgjgg g', '777777777'),
(22, 'Иванов Иван Иванович', 'ivmartin@yandex.ru', '', '+79375061490'),
(23, 'Иванов Иван Иванович', 'ivmartin@yandex.ru', '', '+79375061490'),
(24, 'rdfdg', 'sdfsdf@sdf.ru', '', '232'),
(25, 'Иванов Иван Иванович', 'ivmartin@yandex.ru', 'гор. Пенза, ул. Калинина 80, кв. 43', '+79375061490'),
(27, 'Иванов Иван Иванович', 'ivmartin@yandex.ru', 'гор. Пенза, ул. Калинина 80, кв. 43', '+79375061490'),
(28, 'Иванов Иван Иванович', 'ivmartin@yandex.ru', 'гор. Пенза, ул. Калинина 80, кв. 43', '+79375061490'),
(29, 'Тарас Бульба', 'taras@gmail.com', '', '1212'),
(30, 'вап', '7674hsdj@mail.ru', '', '564565645'),
(31, 'Иванов Иван Иванович', 'ivmartin@yandex.ru', 'гор. Пенза, ул. Калинина 80, кв. 43', '+79375061490'),
(32, 'Иванов Иван Иванович', 'ivmartin@yandex.ru', '', '+79375061490'),
(33, 'Иванов Иван Иванович', 'ivmartin@yandex.ru', 'гор. Пенза, ул. Калинина 80, кв. 43', '+79375061490');

-- --------------------------------------------------------

--
-- Структура таблицы `order_delivery`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Дамп данных таблицы `order_positions`
--

INSERT INTO `order_positions` (`id`, `order_id`, `title`, `fullLink`, `article`, `price`, `quantity`, `product_id`, `attributes`, `complectation`) VALUES
(12, 11, 'Новый товар', '/catalog/hhjk/novyj-tovar.html', '55555', 53, 1, 1, NULL, NULL),
(13, 12, '«Морская феерия» в рожке', '/catalog/morozhenoe/morskaja-feerija-v-rozhke.html', '', 150, 6, 13, NULL, NULL),
(14, 12, '«Добрый пингвин» развесное', '/catalog/morozhenoe/dobryj-pingvin-razvesnoe.html', '', 100, 21, 12, NULL, NULL),
(15, 13, '«Морская феерия» в рожке', '/catalog/morozhenoe/morskaja-feerija-v-rozhke.html', '', 150, 6, 13, NULL, NULL),
(16, 13, '«Добрый пингвин» развесное', '/catalog/morozhenoe/dobryj-pingvin-razvesnoe.html', '', 100, 21, 12, NULL, NULL),
(17, 14, '«Морская феерия» в рожке', '/catalog/morozhenoe/morskaja-feerija-v-rozhke.html', '', 150, 6, 13, NULL, NULL),
(18, 14, '«Добрый пингвин» развесное', '/catalog/morozhenoe/dobryj-pingvin-razvesnoe.html', '', 100, 21, 12, NULL, NULL),
(19, 15, '«Добрый пингвин» развесное', '/catalog/morozhenoe/dobryj-pingvin-razvesnoe.html', '', 100, 1, 12, NULL, NULL),
(20, 16, '«Кораловый риф» развесное', '/catalog/morozhenoe/koralovyj-rif-razvesnoe.html', '', 120, 1, 16, NULL, NULL),
(21, 17, '«Добрый пингвин» развесное', '/catalog/morozhenoe/dobryj-pingvin-razvesnoe.html', '', 100, 2, 12, NULL, NULL),
(22, 17, '«Фруктовая волна» на палочке', '/catalog/morozhenoe/fruktovaja-volna-na-palochke.html', '', 150, 4, 14, NULL, NULL),
(23, 17, '«Кораловый риф» развесное', '/catalog/morozhenoe/koralovyj-rif-razvesnoe.html', '', 120, 2, 16, NULL, NULL),
(24, 18, '«Кораловый риф» развесное', '/catalog/morozhenoe/koralovyj-rif-razvesnoe.html', '', 120, 1, 16, NULL, NULL),
(25, 18, '«Фруктовая волна» на палочке', '/catalog/morozhenoe/fruktovaja-volna-na-palochke.html', '', 150, 2, 14, NULL, NULL),
(26, 19, '«Добрый пингвин» развесное', '/catalog/morozhenoe/dobryj-pingvin-razvesnoe.html', '', 100, 1, 12, NULL, NULL),
(27, 20, '«Добрый пингвин» развесное', '/catalog/morozhenoe/dobryj-pingvin-razvesnoe.html', '', 100, 1, 12, NULL, NULL),
(28, 21, '«Морская феерия» в рожке', '/catalog/morozhenoe/morskaja-feerija-v-rozhke.html', '', 150, 1, 13, NULL, NULL),
(29, 21, '«Райский пляж»  в рожке', '/catalog/morozhenoe/rajskij-pljazh-v-rozhke.html', '', 170, 5, 17, NULL, NULL),
(30, 22, 'С лесными ягодами', '/catalog/torty/ptiche-moloko/s-lesnymi-jagodami1.html', '', 180, 1, 65, NULL, NULL),
(32, 24, '«Добрый пингвин» развесное', '/catalog/morozhenoe/razvesnoe/dobryj-pingvin-razvesnoe.html', '', 100, 1, 12, NULL, NULL),
(33, 25, '«Добрый пингвин» развесное', '/catalog/morozhenoe/razvesnoe/dobryj-pingvin-razvesnoe.html', '', 100, 1, 12, NULL, NULL),
(34, 26, 'С лесными ягодами', '/catalog/torty/ptiche-moloko/s-lesnymi-jagodami1.html', '', 180, 5, 65, NULL, NULL),
(35, 26, '«Океанский Бриз» на палочке', '/catalog/morozhenoe/na-palochke/okeanskij-briz-na-palochke.html', '', 160, 1, 15, NULL, NULL),
(36, 27, 'Сорбет «Фруктовое ассорти»', '/catalog/sorbet/s-fruktami/sorbet-fruktovoe-assorti1.html', '', 120, 1, 56, NULL, NULL),
(37, 28, '«Добрый пингвин» развесное', '/catalog/morozhenoe/razvesnoe/dobryj-pingvin-razvesnoe.html', '', 100, 1, 12, NULL, NULL),
(38, 29, '«Добрый пингвин» развесное', '/catalog/morozhenoe/razvesnoe/dobryj-pingvin-razvesnoe.html', '', 100, 1, 12, NULL, NULL),
(39, 30, '«Добрый пингвин» развесное', '/catalog/morozhenoe/razvesnoe/dobryj-pingvin-razvesnoe.html', '', 100, 1, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `parent_id`, `link`, `title`, `content`, `keywords`, `description`, `layout`, `view`) VALUES
(16, 0, 'main', 'Главная', '', 'Главная', 'Главная', 'first_page', 'notitle'),
(28, 0, 'about', 'О компании', '<p>Данный текст предназначен для того, чтобы было хорошо и ясно видно, как будут выглядеть стили текста. Делается это для того, чтобы заказчик, дизайнер и верстальщик правильно поняли друг друга и не было потом никаких вопросов и претензий типа &laquo;я думал, что это будет выглядеть по-другому&raquo; и так далее...</p>\r\n\r\n<p>Здесь, например, можно увидеть, каким будет абзац основного текста. Просим обратить внимание на межстрочное расстояние, отступ первой строки, выравнивание, расстояние между абзацами. Также важна сама гарнитура основного шрифта, кегль (размер).</p>\r\n\r\n<h2>Заголовок 2</h2>\r\n\r\n<p>Заголовок, который Вы видите выше имеет стиль заголовка 2. Такова будет его гарнитура, начертание, отступы, размер.</p>\r\n\r\n<h3>Заголовок 3</h3>\r\n\r\n<p>Внутри текста могут быть фразы, выделенные&nbsp;<strong>жирным шрифтом</strong>. Также могут быть&nbsp;<em>слова и целые предложения выделенные курсивом</em>. В тексте могут встречаться&nbsp;<a href="#">ссылки</a>.</p>\r\n\r\n<p><img alt="" src="/upload/userfiles/images/e77668f4f456814e86490603b78039ac.png" style="background-color:rgb(255, 255, 255); color:rgb(51, 51, 51); cursor:default; float:left; font-family:sans-serif,arial,verdana,trebuchet ms; font-size:13px; height:180px; line-height:20.7999992370605px; width:180px" /></p>\r\n\r\n<div>\r\n<p>Текст может содержать рисунки. Они могут быть помещены в текст с обтеканием или без, иметь выравнивание влево, вправо или по центру. Имеет значение рамка вокруг рисунка, ее цвет, толщина, и начертание (сплошная, пунктирная и т. д.), отступ картинки от рамки и отстсупы. рамки от обрамляющего текста.</p>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Также текст может содержать таблицы:</p>\r\n\r\n<table style="background-color:rgb(231, 222, 196); border-collapse:collapse; border-spacing:0px; border:1px solid rgb(233, 141, 64); color:rgb(101, 62, 43); font-family:arial; font-size:14px; font-stretch:inherit; line-height:14px; margin:0px 0px 10px; padding:0px; vertical-align:baseline; width:634px">\r\n</table>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="width:600px">\r\n	<thead>\r\n		<tr>\r\n			<th scope="col" style="text-align:center">Заголовок 1</th>\r\n			<th scope="col" style="text-align:center">Заголовок 2</th>\r\n			<th scope="col" style="text-align:center">Заголовок 3</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td style="text-align:center">Содержание 1.1</td>\r\n			<td style="text-align:center">Содержание 2.1</td>\r\n			<td style="text-align:center">Содержание 3.1</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">Содержание 1.2</td>\r\n			<td style="text-align:center">Содержание 2.2</td>\r\n			<td style="text-align:center">Содержание 3.2</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">Содержание 1.3</td>\r\n			<td style="text-align:center">Содержание 2.3</td>\r\n			<td style="text-align:center">Содержание 3.3</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">Содержание 1.4</td>\r\n			<td style="text-align:center">Содержание 2.4</td>\r\n			<td style="text-align:center">Содержание 3.4</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">Содержание 1.5</td>\r\n			<td style="text-align:center">Содержание 2.5</td>\r\n			<td style="text-align:center">Содержание 3.5</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">Содержание 1.6</td>\r\n			<td style="text-align:center">Содержание 2.6</td>\r\n			<td style="text-align:center">Содержание 3.6</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Таблица может иметь разные стили рамки, отступы внутри ячеек, расстояния между ячейками, заголовок таблицы, цвет фона ячеек и другие параметры.</p>\r\n\r\n<p>В тексте может присутствовать список. в нем надо обратить внимание на:</p>\r\n\r\n<ul>\r\n	<li>отступы списка относительно окружающего текста;</li>\r\n	<li>тип списка: нумерованный числами, буквами, размеченный маркерами;</li>\r\n	<li>отступы каждого элемента списка слева, справа, сверху и снизу;</li>\r\n	<li>вид, форма, цвет маркера</li>\r\n</ul>\r\n\r\n<p>Это, пожалуй, все. Желаем Вам, чтобы Ваш текст выглядел красиво, презентабельно, информативно. Чтобы его было приятно, удобно и полезно читать!</p>\r\n', 'О компании', 'О компании', 'main', 'view'),
(30, 0, 'content', 'Наполнение сайта', '<p>\r\n	<em>Страница в разработке.</em></p>\r\n', 'Наполнение сайта', 'Наполнение сайта', 'main', 'view'),
(36, 0, 'service', 'Услуги', '<p>\r\n	<em>Страница в разработке.</em></p>\r\n', 'Услуги', 'Услуги', 'main', 'view'),
(37, 0, 'contact', 'Контактная информация', '<p><em>Страница в разработке.</em></p>\r\n', 'Контактная информация', 'Контактная информация', 'main', 'view'),
(38, 0, 'payments', 'Доставка и оплата', '<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n', '', '', 'main', 'view'),
(39, 38, 'smsms', 'смсмс', '<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n', '', '', 'main', 'view');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_migration`
--

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
('m150429_122353_cms48', 1432030212),
('m150608_122438_cmd48a', 1433767079),
('m150708_144856_cms_49', 1437055840),
('m150806_133446_cms_56', 1439197720);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

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
(1, 'admin', 'no-reply@plusonedev.ru', '2656a196fb1f511628fe61365bf596db', '54862c1be6f582.03655350', 'admin', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `yamarket_offersettings`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `yamarket_offersettings`
--

INSERT INTO `yamarket_offersettings` (`id`, `product_id`, `store`, `pickup`, `local_delivery_cost`, `sales_notes`, `manufacturer_warranty`) VALUES
(2, 12, 0, 1, 500, 'ПроверкаProverka', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `yamarket_shopsettings`
--

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
(1, 'Магазин номер один', 'shop number one', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
