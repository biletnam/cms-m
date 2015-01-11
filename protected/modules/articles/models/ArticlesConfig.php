<?php

/**
 * This is the model class for table "news_config".
 *
 * The followings are the available columns in table 'news_config':
 * @property integer $id
 * @property string $feed_name
 * @property integer $perpage
 * @property integer $imagesize_medium_x
 * @property integer $imagesize_medium_y
 * @property integer $imagesize_small_x
 * @property integer $imagesize_small_y
 */
class ArticlesConfig extends BasicModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NewsConfig the static model class
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
		return 'articles_config';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('feed_name,perpage, imagesize_medium_x, imagesize_medium_y, imagesize_small_x, imagesize_small_y', 'required'),
			array('perpage, imagesize_medium_x, imagesize_medium_y, imagesize_small_x, imagesize_small_y', 'numerical', 'integerOnly'=>true),
			array('feed_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, feed_name, perpage, imagesize_medium_x, imagesize_medium_y, imagesize_small_x, imagesize_small_y', 'safe', 'on'=>'search'),
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
			'feed_name' => 'Название ленты статей',
			'perpage' => 'Статей на страницу',
			'imagesize_medium_x' => 'Ширина средней картинки',
			'imagesize_medium_y' => 'Высота средней картинки',
			'imagesize_small_x' => 'Ширина малой картинки',
			'imagesize_small_y' => 'Высота малой картинки',
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
		$criteria->compare('feed_name',$this->feed_name,true);
		$criteria->compare('perpage',$this->perpage);
		$criteria->compare('imagesize_medium_x',$this->imagesize_medium_x);
		$criteria->compare('imagesize_medium_y',$this->imagesize_medium_y);
		$criteria->compare('imagesize_small_x',$this->imagesize_small_x);
		$criteria->compare('imagesize_small_y',$this->imagesize_small_y);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}