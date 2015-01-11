<?php

/**
 * This is the model class for table "yamarket_shopsettings".
 *
 * The followings are the available columns in table 'yamarket_shopsettings':
 * @property integer $id
 * @property string $name
 * @property string $company
 * @property double $local_delivrey_cost
 */
class YamarketShopsettings extends BasicModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return YamarketShopsettings the static model class
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
		return 'yamarket_shopsettings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('name, company', 'required'),
			array('local_delivery_cost', 'numerical'),
			array('name', 'length', 'max'=>20),
			array('company', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, company, local_delivery_cost', 'safe', 'on'=>'search'),
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
			'name' => 'Название магазина',
			'company' => 'Официальное название компании',
			'local_delivery_cost' => 'Общая стоимость доставки для своего региона',
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
		$criteria->compare('company',$this->company,true);
		$criteria->compare('local_delivery_cost',$this->local_delivrey_cost);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}