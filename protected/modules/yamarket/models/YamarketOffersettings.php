<?php

/**
 * This is the model class for table "yamarket_offersettings".
 *
 * The followings are the available columns in table 'yamarket_offersettings':
 * @property integer $id
 * @property integer $product_id
 * @property integer $store
 * @property integer $pickup
 * @property double $local_delivery_cost
 * @property string $sales_notes
 * @property integer $manufacturer_warranty
 */
class YamarketOffersettings extends BasicModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return YamarketOffersettings the static model class
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
		return 'yamarket_offersettings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, store, pickup, manufacturer_warranty', 'numerical', 'integerOnly'=>true),
			array('local_delivery_cost', 'numerical'),
			array('sales_notes', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, store, pickup, local_delivery_cost, sales_notes, manufacturer_warranty', 'safe', 'on'=>'search'),
		);
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
			'product_id' => 'Товар',
			'store' => 'Возможность покупки в розничном магазине (store)',
			'pickup' => 'Возможность самовывоза (pickup)',
			'local_delivery_cost' => 'Стоимость доставки для своего региона (local_delivery_cost)',
			'sales_notes' => 'Пометки о продаже (sales_notes)',
			'manufacturer_warranty' => 'Наличие гарантии от производителя (manufacturer_warranty)',
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
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('store',$this->store);
		$criteria->compare('pickup',$this->pickup);
		$criteria->compare('local_delivery_cost',$this->local_delivery_cost);
		$criteria->compare('sales_notes',$this->sales_notes,true);
		$criteria->compare('manufacturer_warranty',$this->manufacturer_warranty);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function product_search($product){
        $criteria=new CDbCriteria;
        $criteria->compare('title',$product->title,true);
        $criteria->compare('price',$product->price,true);
        $criteria->compare('id_category',$product->id_category);

        return new CActiveDataProvider('CatalogProduct', array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>50,
            ),
            'sort' => array(
                'defaultOrder' => 'sort_order ASC',
            ),
        ));
    }

    // Перед записью чистим базу
    protected function beforeSave()
    {
        if(parent::beforeSave())
        {
            $offersettings=YamarketOffersettings::model()->findAll();
            foreach($offersettings as $offersetting){
                if(!CatalogProduct::model()->exists('id=:id', array(':id'=>$offersetting->product_id))){
                    $offersetting->delete();
                }
            }
            return true;
        }
        else
            return false;
    }
}