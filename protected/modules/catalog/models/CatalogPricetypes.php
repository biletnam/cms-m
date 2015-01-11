<?php

/**
 * This is the model class for table "catalog_pricetypes".
 *
 * The followings are the available columns in table 'catalog_pricetypes':
 * @property integer $id
 * @property string $name
 * @property integer $ident_field
 * @property integer $price_field
 */
class CatalogPricetypes extends BasicModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CatalogPricetypes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'catalog_pricetypes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, ident_field, price_field', 'required'),
			array('price_field', 'length', 'max'=>10),
            array('ident_field', 'match', 'pattern' => '/^[A-Za-z]+$/u', 'message' => 'Поле {attribute} должно содержать только латинские буквы'),
            array('price_field', 'numerical', 'min'=>0),
            array('price_field', 'type', 'type'=>'float', 'message' => 'Поле {attribute} заполнено неверно'),
            array('ident_field', 'length', 'max'=>1),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, ident_field, price_field', 'safe', 'on'=>'search'),
		);
	}

    protected function beforeSave()
    {
        if(parent::beforeSave())
        {
            $this->price_field = round($this->price_field, 2);
        }
        else
            return false;
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название',
			'ident_field' => 'Поле артикула',
			'price_field' => 'Поле цены',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('ident_field',$this->ident_field, true);
		$criteria->compare('price_field',$this->price_field, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function loadDataFromFile($filename){

        $data=array();

        $phpExcelPath = Yii::getPathOfAlias('ext.excel');

        // Выключаем автоподгрузку классов
        spl_autoload_unregister(array('YiiBase','autoload'));
        //Подключаем библиотеку
        include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');

        $objPHPExcel = PHPExcel_IOFactory::load($filename);

        $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

        // Включаем автоподгрузку файлов
        spl_autoload_register(array('YiiBase','autoload'));

        foreach($sheetData as $row){
            if(!empty($row[$this->ident_field])) {// && !empty($row[$this->price_field])) 
								$price = preg_replace("/[^0-9+.]/", '', $row[$this->price_field]);
								$price_field = (int)strtok($price, '.');
                                $data[trim($row[$this->ident_field])]=$price_field;
                            }
        }

        return $data;

    }

    // Получаем массив изменяемых товаров для подтверждения действия
    public function  getProductsToChangeArray($filename){
        $productsToChange=array();

        $price_data=$this->loadDataFromFile($filename);

        $articles=array_keys($price_data);
        $criteria=new CDbCriteria;
        $criteria->compare('article', $articles);
        $criteria->order='sort_order ASC';

        if($products=CatalogProduct::model()->findAll($criteria)){
            foreach($products as $product){
                $prod=array(
                    'id'=>$product->id,
                    'title'=>$product->title,
                    'article'=>$product->article,
                    'currency'=>$product->thisCurrency->prefix,
                    'old_price'=>$product->price,
                    'new_price'=>$price_data[trim($product->article)],
                );
                $productsToChange[]=$prod;
            }
        }
        return $productsToChange;
    }
	
    // Получаем массив изменяемых товаров для подтверждения действия
    public function  getProductsToNoChangeArray($filename){
        $noChange=array();
		$productsToChange=array();

        $price_data=$this->loadDataFromFile($filename);

        $articles=array_keys($price_data);
        $criteria=new CDbCriteria;
        $criteria->order='sort_order ASC';

        if($products=CatalogProduct::model()->findAll($criteria)){
            foreach($products as $product){		
				$error=null;
				if ($product->article=='') 
					{
					$error='Не указан артикул';
					}
				else
					{
					if (in_array($product->article,$articles)) 
						{
						if (($price_data[trim($product->article)]=='')||(!is_numeric($price_data[trim($product->article)])))
							{
							$error='Цена пустая';
							}
						}
					else
						{
						$error='Артикул указан, но в прайс-листе не найден соответствующий';
						}					
					}
				if ($error!=null)
					{
					$prod=array(
						'id'=>$product->id,
						'title'=>$product->title,
						'article'=>$product->article,
						'error'=>$error,
						);
					$productsToChange[]=$prod;
					}
            }
        }
		$noChange[]=$productsToChange;
		
        return $noChange;
    }	

    // Применяем изменения согласно загруженному прайс-листу
    public function acceptParameters($filename){
        $success=true;
		
        $price_data=$this->loadDataFromFile($filename);

        $articles=array_keys($price_data);
        $criteria=new CDbCriteria;
        $criteria->compare('article', $articles);

        if($products=CatalogProduct::model()->findAll($criteria)){
            foreach($products as $product){
				$article = trim($product->article);
                if($article != "" && isset($price_data[$article]))
                    $product->price=$price_data[$article];
                if(!$product->save()) $success=false;
				
            }
        } else $success=false;

        return $success;
    }

    public static function getTypelist(){
        $typesArray=array();

        $types=CatalogPricetypes::model()->findAll();
        foreach($types as $type){
            $typesArray[$type->id]=$type->name;
        }
        return $typesArray;
    }

}