<?php

Yii::import('zii.widgets.CWidget');
Yii::import('application.modules.articles.models.Articles');
/*
 *Класс виджета для вывода статей на главную страницу
 *
*/
class LastArticlesWidget extends CWidget {

    public $limit=3;
    public $rubr=0;
    public $view='lastnews';

	public function	run() {

        // устанавливаем условие для отбора
        $criteria=new CDbCriteria;
		$criteria->select='id,title,annotation';
        //if($this->rubr){$criteria->compare('rubr_id', $this->rubr);}
        $criteria->order='sort_order ASC';
        if($this->limit>0){$criteria->limit=$this->limit;}

        $dataProvider = new CActiveDataProvider('Articles', array(
            'criteria'=>$criteria,
            'pagination'=>false,
        ));

		$this->render($this->view,array(
            'dataProvider'=>$dataProvider,
        ));
        
		return parent::run();
        
	}

}
?>
