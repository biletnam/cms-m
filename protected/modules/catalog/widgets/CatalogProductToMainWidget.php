<?php

Yii::import('zii.widgets.CPortlet');
Yii::import('application.modules.catalog.models.*');
/*
 *Класс виджета для вывода товаров на главную страницу
 *
*/
class CatalogProductToMainWidget extends CPortlet
{
	public function	run()
    {

        // устанавливаем условие для отбора
        $criteria=new CDbCriteria;
        $criteria->select='t.title,t.image,t.price,t.link';
        $criteria->compare('on_main', true);
        $criteria->with=array('idCategoryFast');
        $products=CatalogProduct::model()->findAll($criteria);

        // Тасуем продукты
        if(is_array($products)) shuffle($products);

		$this->render('prodtomain',array(
                           'products'=>$products,
        ));

		return parent::run();

	}

}
?>
