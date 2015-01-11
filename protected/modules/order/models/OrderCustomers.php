<?php

/**
 * This is the model class for table "order_customers".
 *
 * The followings are the available columns in table 'order_customers':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $adress
 * @property string $phone
 * @property integer $delivery
 * @property string $comments
 */
class OrderCustomers extends BasicModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderCustomers the static model class
	 */
	public $verifyCode;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order_customers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			/*array(
                'verifyCode',
                'captcha',
				'message'=>'Неверный защитный код',
				'captchaAction'=>'/site/captcha', 
                'allowEmpty' => !extension_loaded('gd'),
            ),*/
            array('name, email, phone', 'required'),
			array('name, email, phone', 'length', 'max'=>255),
			array('phone', 'match', 'pattern'=>'/^([+]?[0-9\s-\(\)]{3,25})*$/i'),
            array('email', 'email'),
			array('adress', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, email, adress, phone', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'orders' => array(self::HAS_MANY, 'Orders',array('customer'=>'id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Ваше имя',
			'email' => 'E-mail',
			'adress' => 'Адрес',
			'phone' => 'Контактный телефон',
			'verifyCode'=>'Введите код',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('adress',$this->adress,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('delivery',$this->delivery);
		$criteria->compare('comments',$this->comments,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}