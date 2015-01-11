<?php

class m150708_144856_cms_49 extends CDbMigration
{
	public function up()
	{
		$this->dbConnection->createCommand("
			ALTER TABLE  `banners` ADD  `description` TEXT NULL AFTER  `title`;
		")->execute();
	}

	public function down()
	{
		$this->dbConnection->createCommand("
			ALTER TABLE `banners` DROP `description`;
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