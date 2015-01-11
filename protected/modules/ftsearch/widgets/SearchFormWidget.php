<?php
Yii::import('zii.widgets.CWidget');
/*
 *Класс виджета для вывода информационного блока
 *
*/
class SearchFormWidget extends CWidget {
	public function	run() {

        // Читаем из файла
        //$examples=file(YiiBase::getPathOfAlias('application.modules.ftsearch').'/vars.txt');

        // Берем случайный элемент
        //$rand_key=array_rand($examples);
        //$example=$examples[$rand_key];

        $this->render('_form'/*, array('example'=>$example)*/);
		return parent::run();
	}
}
?>
