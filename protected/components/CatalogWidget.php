<?php

Yii::import('zii.widgets.CPortlet');

class CatalogWidget extends CPortlet {
	public function	init() {
		$this->title = 'Каталог';
		return parent::init();
	}

	public function	run() {
		$this->render('catalog');
		return parent::run();
	}

}
?>
