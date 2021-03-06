<?php

Yii::import('zii.widgets.CPortlet');
/*
Класс виджета для вывода меню модуля в админке
Цепляется автоматически, поэтому должен называться - {название модуля}AdminmenuWidget,
где {название модуля}соответствует имени папки модуля и, само собой, тому, что прописали в конфигурации приложения (modules)

Виджеты выводятся в лейаутах администраторской части при помощи метода контроллеров moduleMenuWidgets();
*/
class ArticlesAdminmenuWidget extends CPortlet {
	public function	init() {
		$this->title = 'Статьи';
		return parent::init();
	}

	public function	run() {
		$this->render('articles');
		return parent::run();
	}

}
?>
