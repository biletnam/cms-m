<?php

class m150316_124252_cms15 extends CDbMigration
{
	public function up()
	{
		$this->dbConnection->createCommand("
			CREATE TABLE IF NOT EXISTS `orders` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `number` varchar(255) DEFAULT NULL,
			  `date` DATETIME DEFAULT NULL,
			  `customer` int(11) DEFAULT NULL,
			  `status` int(11) DEFAULT NULL,
			  `delivery` int(11) DEFAULT NULL,
			  `comments` text,
			  `sum` float DEFAULT NULL,
			  `admin_remark` text,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
		")->execute();
		$this->dbConnection->createCommand("
			CREATE TABLE IF NOT EXISTS `order_cart` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `session_id` varchar(255) DEFAULT NULL,
			  `product_id` int(11) DEFAULT NULL,
			  `price` float DEFAULT NULL,
			  `quantity` int(11) DEFAULT NULL,
			  `date` DATETIME DEFAULT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
		")->execute();
		$this->dbConnection->createCommand("
			CREATE TABLE IF NOT EXISTS `order_config` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `notice_email` varchar(255) DEFAULT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
		")->execute();
		$this->dbConnection->createCommand("
			CREATE TABLE IF NOT EXISTS `order_customers` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `user_id` int(11) DEFAULT NULL,
			  `name` varchar(255) DEFAULT NULL,
			  `email` varchar(255) DEFAULT NULL,
			  `adress` varchar(1000) DEFAULT NULL,
			  `phone` varchar(255) DEFAULT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
		")->execute();
		$this->dbConnection->createCommand("
			CREATE TABLE IF NOT EXISTS `order_delivery` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `title` varchar(255) DEFAULT NULL,
			  `price` float DEFAULT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
		")->execute();
		$this->dbConnection->createCommand("
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
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
		")->execute();
	}

	public function down()
	{
		$this->dbConnection->createCommand("
			DROP TABLE `orders`;
		")->execute();
		$this->dbConnection->createCommand("
			DROP TABLE `order_cart`;
		")->execute();
		$this->dbConnection->createCommand("
			DROP TABLE `order_config`;
		")->execute();
		$this->dbConnection->createCommand("
			DROP TABLE `order_customers`;
		")->execute();
		$this->dbConnection->createCommand("
			DROP TABLE `order_delivery`;
		")->execute();
		$this->dbConnection->createCommand("
			DROP TABLE `order_positions`;
		")->execute();
	}
}