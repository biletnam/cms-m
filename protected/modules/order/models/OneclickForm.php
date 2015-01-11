<?php

/**
 * Класс формы для "Заказа в один клик"
 */
class OneclickForm extends CFormModel
{
	public $name;
    public $phone;
	public $text;
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
            array(
                'verifyCode',
                'captcha',
				'message'=>'Неверный защитный код',
                // авторизованным пользователям код можно не вводить
                'allowEmpty'=>!Yii::app()->user->isGuest || !extension_loaded('gd')
            ),
			// name, email, subject and body are required
			array('phone', 'required'),
            array('phone', 'length', 'max'=>256),
            array('name, text', 'safe'),

		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'name' => 'Ваше имя',
            'phone' => 'Ваш телефон',
			'text' => 'Комментарии',
			'verifyCode'=>'Введите код',
		);
	}
}