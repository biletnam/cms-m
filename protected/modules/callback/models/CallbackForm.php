<?php

/**
 * Class CallbackForm
 */
class CallbackForm extends CFormModel
{
	/**
	 * @var string
	 */
	public $name;

	/**
	 * @var string
	 */
	public $email;

    /**
     * @var string
     */
    public $phone;

	/**
	 * @var string
	 */
	public $text;

	/**
	 * @var string
	 */
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('name, text, email, phone', 'required'),
            array('email', 'email', 'message'=>'Ваш e-mail не является правильным E-Mail адресом'),
            array('text', 'length', 'max'=>700, 'message'=>'Недопустимое количество символов'),
			array('name, email, phone', 'length', 'max'=>255),
            array('phone', 'match', 'pattern' => '/^([+]?[0-9\s-\(\)]{3,25})*$/i', 'message'=>'Поле заполнено некорректно'),
            array('text', 'checkTagsValidate', 'message' => 'Cообщение содержит недопустимые символы'),
			array(
                'verifyCode',
                'captcha',
                'message' => 'Неверный проверочный код',
                'allowEmpty' => !CallbackConfig::model()->checkCaptchaEnabled() || !extension_loaded('gd')
            ),
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
			'name' => 'Введите имя',
			'email' => 'E-mail',
			'text' => 'Текст сообщения',
			'phone' => 'Контактный телефон',
			'verifyCode' => 'Введите проверочный код',
		);
	}

    public function checkTagsValidate($attribute,$params)
    {
        if(preg_match("/script|http|<|>|<|>|SELECT|UNION|UPDATE|exe|exec|INSERT|tmp/i", $this->text))
            $this->addError('text','Cообщение содержит недопустимые символы');
    }
}