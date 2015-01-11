<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property integer $id
 * @property string $number
 * @property integer $date
 * @property integer $customer
 * @property integer $status
 */
class Orders extends BasicModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Orders the static model class
	 */
	private $_paymentList = array('0' => 'Предоплата', '1' => 'Наложенный платеж','2' => 'Наличный платеж от организации','3' => 'Наличный платеж курьеру');
	private $_statusList = array('0' => 'Принят в обработку', '1' => 'Оплачен','2' => 'Готов к отгрузке','3' => 'Доставлен');
	 
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            //array('delivery, payment', 'required'),
			array('customer, status', 'numerical', 'integerOnly'=>true),
			array('number', 'length', 'max'=>255),
            array('comments', 'length', 'max'=>255),
            array('admin_remark', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, customerName, number, date, customer, status, delivery, comments', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// Связи
		return array(
            'customerdata' => array(self::HAS_ONE, 'OrderCustomers', array('id'=>'customer')),
            'positions' => array(self::HAS_MANY, 'OrderPositions', 'order_id'),
            'deliverymethod' => array(self::HAS_ONE, 'OrderDelivery', array('id'=>'delivery')),
		);
	}


	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'number' => 'Номер заказа',
			'date' => 'Дата, время',
			'customer' => 'Покупатель',
			'status' => 'Статус заказа',
			'payment' => 'Способ оплаты',
			'delivery' => 'Способ доставки',
			'comments' => 'Комментарии к заказу',
            'sum' => 'Сумма заказа',
            'admin_remark' => 'Пометки',
			'verifyCode'=>'Введите код',
			'customerName' => 'Покупатель',
		);
	}

	public $customerName;
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
		$criteria->with=array('customerdata');
		$criteria->compare('t.id',$this->id);
		$criteria->compare('number',$this->number,true);
		$criteria->compare('date', $this->date, true);
		$criteria->compare('customer',$this->customer);
		$criteria->compare('status',$this->status);
        $criteria->compare('customerdata.name', $this->customerName, true);
        $sort = new CSort();
        $sort->attributes = array(
            'id',
            'date',
            'customerName' => array(
                'asc' => 'customerdata.name',
                'desc' => 'customerdata.name desc',
            ),

        );
        $sort->defaultOrder='date desc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>$sort,
            'pagination'=>array(
                'pageSize'=>30,
            ),
		));
	}

    // Перед записью
    protected function beforeSave(){
        if(parent::beforeSave())
        {
            if($this->isNewRecord)
            {
                $this->date = date("Y-m-d H:i:s");
            }
            return true;
        }
        else
            return false;

    }

    protected function beforeDelete(){
    
        if(parent::beforeDelete())
        {
            // Удаляем связанные записи о покупателях
            if(isset($this->customerdata)){
                $this->customerdata->delete();
            }
            
            if(isset($this->positions)){
                foreach($this->positions as $position){
                   $position->delete();
                }
            }
            return true;
        }
        else
            return false;
    }

    // После записи
    protected function afterSave(){
        parent::afterSave();
        foreach($this->positions as $position) {
            // задаём позициям id заказа
            $position->order_id = $this->id;
            $position->save();
        }

    }

    public function getPayment()
    {
        return $this->_paymentList;
    }
	
	public function getPaymentList()
    {
        $this->payment = $this->payment === null ? 0 : $this->payment;
        return $this->_paymentList[$this->payment];
    }
	
    public function getStatus()
    {
        return $this->_statusList;
    }
	
	public function getStatusList()
    {
        $this->status = $this->status === null ? 0 : $this->status;
        return $this->_statusList[$this->status];
    }
	
}