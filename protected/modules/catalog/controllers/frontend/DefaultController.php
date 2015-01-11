<?php

class DefaultController extends BaseCatalogController
{
    public $categoryId=0;
    public $category='';
    public $productsToShow;

	public function actionIndex($link='')
	{
        if($link) {
            $this->category = $this->loadCategoryModelFast($link);
            $this->categoryId=$this->category->id;

            $this->breadcrumbs=CatalogCategory::getBreadcrumbs($this->categoryId);
            $this->breadcrumbs[$this->catalog_config->title]='/catalog';
            $this->breadcrumbs[]=$this->category->title;
            // формируем заголовок и метатеги старницы
            $this->metaInfoGenerate($this->category->title, $this->category->keywords, $this->category->description);
        }
        else{
            $this->breadcrumbs[]=$this->catalog_config->title;
            // формируем заголовок и метатеги старницы
            $this->metaInfoGenerate($this->catalog_config->title, $this->catalog_config->keywords, $this->catalog_config->description);
        }

        $categoryCriteria = new CDbCriteria;
        $categoryCriteria->compare('id_category', $this->categoryId);
        $categoryCriteria->order = 'sort_order ASC';

        $productCriteria = new CDbCriteria;
        $productCriteria->compare('id_category', $this->categoryId);
        $productCriteria->order = 'sort_order ASC';


        if (isset($_GET['Catalog_filter']))
        {
            if (isset($_GET['Catalog_filter']['price_min']))
                $productCriteria->compare('price', '>=' . (int)$_GET['Catalog_filter']['price_min']);

            if (isset($_GET['Catalog_filter']['price_max']))
                $productCriteria->compare('price', '<=' . (int)$_GET['Catalog_filter']['price_max']);

            if (isset($_GET['Catalog_filter']['attributes']) and $productAttributes = $_GET['Catalog_filter']['attributes'])
            {
                $where = '';
                $count = 0;
                foreach ($productAttributes as $id => $values)
                {
                    $attributesIds = array();
                    if ($id and is_array($values))
                    {
                        $attributesIds[] = $id;
                        foreach ($values as &$value)
                            $value = (int)$value;

                        if ($where)
                            $where .= " OR ";

                        $where .= "(id_attribute = " . (int)$id . " AND value IN ('" . implode("','", $values) . "'))";
                        $count++;
                    }
                }
                $productIds = array_unique(Yii::app()->db->createCommand()->select('id_product, id_attribute')->from('catalog_product_attribute')->where($where)->group('id_product')->having("id_attribute IN  ('" . implode("','", $attributesIds) . "')")->queryColumn());
                if (empty($productIds))
                    $productIds = 0;

                $productCriteria->compare('id', $productIds);
            }
        }
        $categoryData=CatalogCategory::model()->findAll($categoryCriteria);
        $productData=CatalogProduct::model()->findAll($productCriteria);
        $rawData=array_merge($categoryData,$productData);
        $dataProvider = new CArrayDataProvider($rawData,array(
            'pagination' => array(
                // Количество на странице берем из конфигурации каталога
                'pageSize'=>$this->catalog_config->product_perpage,
            ),
        ));

        // если указан шаблон - берем его
        if($this->catalog_config->layout) $this->layout=$this->catalog_config->layout;

        $this->render('index', array(
            'category' => $this->category,
            'dataProvider' => $dataProvider,
        ));

	}

	public function actionProduct($id)
	{
		$model=$this->loadProductModelFast($id);
        if(!$model->hide){

            // Увеличиваем количество просмотров на 1
            $model->incViews();

            $this->breadcrumbs=CatalogCategory::getBreadcrumbs($model->id_category, true);
            $this->breadcrumbs[]=$model->title;

            // формируем заголовок и метатеги страницы
            $this->metaInfoGenerate($model->title, $model->keywords, $this->catalog_config->description);
            if(Yii::app()->request->isAjaxRequest)
            {
                $this->renderPartial('product',array(
                    'model'=>$model, false, true
                ));
            }
            else
            {
                $this->render('product',array(
                    'model'=>$model,
                ));
            }


        } else throw new CHttpException(404,'The requested page does not exist.');
	}

    public function actionSelection($sort=''){
        $this->breadcrumbs[]='Результаты подбора товаров';

        // Берем параметры для отбора из get-запроса
		$category=array();
        $selectionParameters=array();
        if(isset($_GET['selectionParameters'])){
           $selectionParameters=$_GET['selectionParameters'];
		   if((isset($_GET['selectionParameters']['category']))&&($_GET['selectionParameters']['category']>0)) {
				$category=CatalogCategory::model()->findByPk($_GET['selectionParameters']['category']);
		   }
        }

        // Отбираем товары по заданным критериям
        $this->productsToShow=CatalogProduct::selectionProducts($selectionParameters,$sort);
		
        $dataProvider= new CArrayDataProvider($this->productsToShow, array(
            'pagination'=>array(
                'pageSize'=>$this->catalog_config->product_perpage,
                ),
        ));

        // если указан шаблон - берем его
        if($this->catalog_config->layout) $this->layout=$this->catalog_config->layout;

        $this->render('selectionresults', array(
				'dataProvider'=>$dataProvider,
				'category'=>$category,
				'selectionParameters'=>$selectionParameters,
        ));
    }

    // Собираем используемые параметры категорий
    public function actionParamindex(){
        // Очищаем всю таблицу
        CatalogCategoryExistparam::model()->deleteAll();
		
		$criteria=new CDbCriteria;
		$criteria->select='id';
		$criteria->with=array('catalogProductsForExist');
		
        $categories=CatalogCategory::model()->findAll($criteria);
        foreach($categories as $category){
            $existParameters=$category->getExistingParameters();
            $categoryExistingParams=new CatalogCategoryExistparam();
            $categoryExistingParams->category_id=$category->id;
            $categoryExistingParams->existparam=serialize($existParameters);
            $categoryExistingParams->save();
        }

        echo "Индексирование прошло успешно!";
    }

	public function loadCategoryModel($link)
	{
		$model=CatalogCategory::model()->findByAttributes(array('link'=>$link));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function loadCategoryModelFast($link)
	{
		$model=CatalogCategory::model()->with('catalogProducts')->findByAttributes(array('link'=>$link));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadProductModel($id)
	{
		$model=CatalogProduct::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function loadProductModelFast($id)
	{
		$model=CatalogProduct::model()->with('related_products','productAttrubute','idCategoryFast','catalogImages')->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

    public function createUrl($route,$params=array(),$ampersand='&'){
        // если формируем ссылку на категорию
        if($route=='category'){
            if(isset($params['link'])){return '/catalog'.CatalogCategory::getCategoryRoute($params['link']);}
        }

        // если формируем ссылку на товар
        if($route=='product'){
            // если передано id товара
            if(isset($params['id'])){
                // если существует такой продукт
                if($product=CatalogProduct::model()->find(array('condition'=>'id=:id', 'params'=>array(':id'=>$params['id']),))){

                    // берем категорию продукта
                    $category=CatalogCategory::model()->width('parentShort')->findByPk($product->id_category);

                    // возвращаем путь к категории товара и прибавляем в конце id
                    return '/catalog'.CatalogCategory::getCategoryRouteFast($category).'/'.$product->id;
                }
            }
        }
        // если условия не сработали - формируем адрес обычным образом
        return parent::createUrl($route,$params,$ampersand);
    }
}