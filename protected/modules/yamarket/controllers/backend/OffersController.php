<?php

Yii::import('application.modules.catalog.models.CatalogProduct');
Yii::import('application.modules.catalog.models.CatalogCategory');

class OffersController extends BackEndController
{
	public function actionIndex()
    {
        $model=new YamarketOffersettings();
        $product=new CatalogProduct('search');
        $product->unsetAttributes();  // clear any default values
        if(isset($_GET['CatalogProduct']))
            $product->attributes=$_GET['CatalogProduct'];

        $this->render('index',array(
            'model'=> $model,
            'product'=>$product,
        ));
    }

    public function actionUpdate($id){

        if($product=CatalogProduct::model()->findByPk($id)){


            $offersettings=YamarketOffersettings::model()->find('product_id=:product_id', array(':product_id'=>$id));
            if(!$offersettings){
                $offersettings=new YamarketOffersettings();
                $offersettings->manufacturer_warranty=true;
				$offersettings->pickup=true;
            }
            if(isset($_POST['YamarketOffersettings'])){
                $offersettings->attributes=$_POST['YamarketOffersettings'];
                $offersettings->product_id=$id;
                if($offersettings->save())
                    $this->redirect(array('index'));
            }

            $this->render('update',array(
                'model'=>$offersettings,
                'product'=> $product,
            ));

        } else throw new CHttpException(404,'Такого товара не существует!');
    }

    public function actionMassupdate(){
        $ids=array();
        // Получаем айдишники выделенных товаров
        if(isset($_POST['checkid'])) $ids=$_POST['checkid'];

        // Создаем модель для формы
        $offersettings=new YamarketOffersettings();
        $offersettings->manufacturer_warranty=true;
        $offersettings->pickup=true;

        if(isset($_POST['YamarketOffersettings'])){
            $offersettings->attributes=$_POST['YamarketOffersettings'];

            if($offersettings->validate()){

                foreach($ids as $id=>$val){

                    $product_offersettings=YamarketOffersettings::model()->find('product_id=:product_id', array(':product_id'=>$id));

                    // Если для данного товара еще нет записи - создаем его
                    if(!$product_offersettings){
                        $product_offersettings=new YamarketOffersettings();
                    }

                    $product_offersettings->attributes=$offersettings->attributes;
                    $product_offersettings->product_id=$id;
                    // Записываем настройки для данного продукта
                    if(!$product_offersettings->save()){print_r($product_offersettings->errors); exit;}
                }
                $this->redirect(array('index'));

            }

        }

        $this->render('massupdate',array(
            'model'=>$offersettings,
            'ids'=> $ids,
        ));

    }
}