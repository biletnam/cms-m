<?php

class DefaultController extends FrontEndController
{
    /**
     * Генерирует yml-файл для яндекс.маркета
     */
    public function actionIndex()
    {
        Yii::import('application.modules.yamarket.extensions.yandex.Yml');
        Yii::import('application.modules.catalog.models.*');

        $shop_settings=YamarketShopsettings::model()->findByPk(1);

        $yamarket=new Yml('utf-8');

        // Передаем данные о магазине
        $yamarket->set_shop($shop_settings->name, $shop_settings->company, 'http://shop.dev');

        // Передаем данные о валюте
        $yamarket->add_currency('RUR', '1');

        // Отдаем категории
		$criteria=new CDbCriteria;
		$criteria->select='t.id,t.title,t.id_category';
        $categories=CatalogCategory::model()->findAll($criteria);
        foreach($categories as $category){
            if($category->id_category){$id_category=$category->id_category;}else{$id_category=-1;}
            $yamarket->add_category($category->title, $category->id, $id_category);
        }

		$yamarket->local_delivery_cost=$shop_settings->local_delivery_cost;

        // Отдаем товары
		$criteria=new CDbCriteria;
		$criteria->select='t.id,t.title,t.description,t.id_category,t.link,t.price,t.image';
		$criteria->condition='(t.noyml=0)';
		//$criteria->condition='(t.hide=0 OR t.hide is NULL)';
		//$criteria->compare('t.id', $array_ids);
		$criteria->with=array('idCategoryFast','yaMarket');
				 
        $products=CatalogProduct::model()->findAll($criteria);
        foreach($products as $product){
            /*$offer_settings=YamarketOffersettings::model()->find(
                'product_id=:product_id',
                array(':product_id'=>$product->id)
            );*/
            $offer_settings_array=array();
            if($product->yaMarket) $offer_settings_array=$product->yaMarket->attributes;

			//Преобразуем 1-0 в true-false
			if(isset($offer_settings_array['store']) && $offer_settings_array['store']){
				$offer_settings_array['store']='true'; 
			} else $offer_settings_array['store']='false';

			if(isset($offer_settings_array['pickup']) && $offer_settings_array['pickup']){
				$offer_settings_array['pickup']='true'; 
			} else $offer_settings_array['pickup']='false';

			if(isset($offer_settings_array['manufacturer_warranty']) && $offer_settings_array['manufacturer_warranty']){
				$offer_settings_array['manufacturer_warranty']='true'; 
			}else $offer_settings_array['manufacturer_warranty']='false';

			if(!isset($offer_settings_array['local_delivery_cost'])){
				unset($offer_settings_array['local_delivery_cost']); 
			}

            if(!$product->noyml){

                $data=array(
                    'url'=>Yii::app()->request->getBaseUrl(true).$product->fullLinkFast,
                    'price'=>number_format($product->price, 0, '', ''),
                    'currencyId'=>'RUR',
                    'categoryId'=>$product->id_category,
                    'picture'=>Yii::app()->request->getBaseUrl(true).'/upload/catalog/product/'.$product->image,
                    'delivery'=>'true',
                    'name'=>$product->title,
                    'description'=>$product->description,
                );
                $data=array_merge($data, $offer_settings_array);
                $yamarket->add_offer($product->id, $data);
            }
        }

        echo $yamarket->get_xml();

    }
}