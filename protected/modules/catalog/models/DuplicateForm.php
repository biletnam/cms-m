<?php

/**
 * Форма для задания параметров создания дубликата товара
 */
class DuplicateForm extends CFormModel
{
    public $image_duplicate; // Дублировать основную картинку
	public $images_duplicate; // Дублировать дополнительные картинки
    public $attributes_duplicate;   // Дублировать Атрибуты
    public $complectations_duplicate;   // Дублировать варианты комплектации

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(

            array('image_duplicate, images_duplicate, attributes_duplicate, complectations_duplicate', 'numerical', 'integerOnly'=>true),

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
            'image_duplicate' => 'Создавать дубликат основной картинки',
			'images_duplicate' => 'Создавать дубликаты дополнительных картинок',
            'attributes_duplicate' => 'Создавать дубликаты атрибутов',
            'complectations_duplicate' => 'Создавать дубликаты вариантов комплектаций',
		);
	}
}