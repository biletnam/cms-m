<?php

class DefaultController extends BackEndController
{
    /**
     * @var string псевдоним пути к папке с файлами для индексирования
     */
    private $_indexFiles = 'runtime.search';

	public function actionIndex()
	{
        $this->breadcrumbs[]='Индексирование';

        $this->render('index');

	}

    public function actionCreate()
    {
        $this->breadcrumbs[]='Индексирование';
        
        Zend_Search_Lucene_Analysis_Analyzer::setDefault(new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive());
//		Zend_Search_Lucene_Analysis_Analyzer::setDefault(new Zend_Search_Lucene_Analysis_Analyzer_Common_TextNum_CaseInsensitive());
        
        $index = Zend_Search_Lucene::create(Yii::getPathOfAlias('application.' . $this->_indexFiles));

		// Частота объединения сегментов(влияет на объем опер памяти и скорость поиска)
		$index->setMergeFactor(5);
        // Индексируем каталог
        Yii::import('application.modules.catalog.models.CatalogProduct');
        Yii::import('application.modules.catalog.models.CatalogCategory');
		
		$products_criteria=new CDbCriteria;
		$products_criteria->select=array('title','description','id','link');
		
        $products=CatalogProduct::model()->findAll($products_criteria);
		
		foreach($products as $product){
					$doc = new Zend_Search_Lucene_Document();

					$doc->addField(Zend_Search_Lucene_Field::Text('type',
												  "usl", 'UTF-8')
					);

					$doc->addField(Zend_Search_Lucene_Field::Text('title',
												  $product->title, 'UTF-8')
					);

					$doc->addField(Zend_Search_Lucene_Field::Text('description',
							str_replace('&nbsp;','',trim(strip_tags($product->description))), 'UTF-8')
					);

					$doc->addField(Zend_Search_Lucene_Field::Keyword('id_product',
							$product->id, 'UTF-8')
					);


					$doc->addField(Zend_Search_Lucene_Field::Text('link',$product->getFullLink(), 'UTF-8')
					);

					$index->addDocument($doc);
				}
				
		$category_criteria=new CDbCriteria;
		$category_criteria->select=array('title','text','id','link');
		

		
		
		$index->commit();
		$index->optimize();
		
		//echo $index->getMaxBufferedDocs().'....'.$index->getMergeFactor();
//		echo $index->count().'   /\\'.$index->numDocs();

        $this->render('create');
    }

}