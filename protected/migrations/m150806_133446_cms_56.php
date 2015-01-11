<?php

class m150806_133446_cms_56 extends CDbMigration
{
	public function up()
	{
		$this->dbConnection->createCommand("
			ALTER TABLE  `catalog_category` CHANGE COLUMN  `parent_id` `id_category` INT(11) NOT NULL DEFAULT 0;
			ALTER TABLE  `catalog_product` CHANGE COLUMN  `photo` `image` varchar(256);
		")->execute();
	}

	public function down()
	{
		$this->dbConnection->createCommand("
			ALTER TABLE  `catalog_category` CHANGE COLUMN  `id_category` `parent_id` INT(11) NOT NULL DEFAULT 0;
			ALTER TABLE  `catalog_product` CHANGE COLUMN  `image` `photo` varchar(256);
		")->execute();
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