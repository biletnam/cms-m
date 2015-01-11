<?php

class m150323_135704_cms22a extends CDbMigration
{
	public function up()
	{
		$this->getDbConnection()->createCommand(
		"ALTER TABLE `order_customers`
  			DROP COLUMN `user_id`
  		;")->execute();
	}

	public function down()
	{
		$this->getDbConnection()->createCommand(
		"ALTER TABLE `order_customers` 
			ADD `user_id` INT(11) DEFAULT NULL AFTER `id`
		;")->execute();
	}
}