<?php

class m150323_122302_cms18 extends CDbMigration
{
	public function up()
	{
		$this->getDbConnection()->createCommand(
		"CREATE TABLE IF NOT EXISTS `yamarket_offersettings` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `product_id` int(11) DEFAULT NULL,
		  `store` int(11) DEFAULT NULL,
		  `pickup` int(11) DEFAULT NULL,
		  `local_delivery_cost` float DEFAULT NULL,
		  `sales_notes` varchar(50) DEFAULT NULL,
		  `manufacturer_warranty` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`),
		  KEY `product_id` (`product_id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		")->execute();

		$this->getDbConnection()->createCommand(
		"CREATE TABLE IF NOT EXISTS `yamarket_shopsettings` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(20) DEFAULT NULL,
		  `company` varchar(255) DEFAULT NULL,
		  `local_delivery_cost` float DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		")->execute();
	}

	public function down()
	{
		$this->getDbConnection()->createCommand(
		"DROP TABLE `yamarket_offersettings`;
		")->execute();

		$this->getDbConnection()->createCommand(
		"DROP TABLE `yamarket_shopsettings`;
		")->execute();
	}
}