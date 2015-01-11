<?php

/**
 * This is the model class for table "order_positions".
 *
 * The followings are the available columns in table 'order_positions':
 * @property integer $id
 * @property integer $order_id
 * @property string $title
 * @property string $fullLink
 * @property string $article
 * @property double $price
 * @property integer $quantity
 * @property integer $product_id
 * @property string $attributes
 * @property string $complectation 
 */
class OrderPositions extends BasicModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderPositions the static model class
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
		return 'order_positions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, quantity, product_id', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('title, article', 'length', 'max'=>255),
            array('fullLink', 'length', 'max'=>1000),
			array('attributes, complectation', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, order_id, title, fullLink, article, price, quantity, product_id, attributes, complectation', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// Связи
		return array(
            'order' => array(self::BELONGS_TO, 'Orders', 'order_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_id' => 'Order',
			'title' => 'Title',
            'fullLink' => 'fullLink',
			'article' => 'Article',
			'price' => 'Price',
			'price_dealer' => 'Price Dealer',
			'quantity' => 'Quantity',
			'product_id' => 'Product',
			'attributes' => 'Attributes',
			'complectation' => 'Complectation',
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
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('fullLink',$this->fullLink,true);
		$criteria->compare('article',$this->article,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('price_dealer',$this->price_dealer);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('attributes',$this->attributes,true);
		$criteria->compare('complectation',$this->complectation,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    // Достает комплектацию из сериализованного массива и формирует строку
    // с плюсиками вначале, с разделением тегом <br/>
    public function outComplectation(){
        $outCompl='';
        if($this->complectation){
            $compl=unserialize($this->complectation);
            foreach($compl as $value){
                $outCompl.='+'.$value.'<br/>';
            }
        }
        return $outCompl;

    }
}