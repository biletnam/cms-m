<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property string $id
 * @property string $title
 * @property string $annotation
 * @property string $content
 * @property string $image
 */
class Articles extends BasicModel
{

    // Фолдер для картинок
    public $folder='upload/articles';


    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'articles';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, annotation, content', 'required'),
            array('rubr_id', 'numerical', 'integerOnly'=>true),
            array('title, image', 'length', 'max' => 256),
            array('annotation', 'length', 'max' => 512),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, annotation, content, image, date', 'safe', 'on' => 'search'),
            //array('image', 'unsafe'),
        );
    }

    public function behaviors()
    {
        return array(
            'SSortableBehavior' => array(
                'class' => 'application.extensions.SSortable.SSortableBehavior',
            ),
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
            'rubric' => array(self::BELONGS_TO, 'NewsRubr', 'rubr_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => 'Заголовок',
            'annotation' => 'Аннотация',
            'content' => 'Текст',
            'image' => 'Изображение',
            'rubr_id' => 'Рубрика',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('annotation', $this->annotation, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('rubr_id', $this->rubr_id);

        return new CActiveDataProvider($this, array(
                                                   'criteria' => $criteria,
                                                    'pagination'=>array(
                                                        'pageSize'=>25,
                                                    ),
                                                   'sort' => array(
                                                       'defaultOrder' => 'sort_order',
                                                   ),
                                              ));
    }

    protected function beforeSave()
	{
		if(parent::beforeSave())
		{
            // Читаем настройки статей
            $articles_config=ArticlesConfig::model()->findByPk(1);

            //Загружаем картинку

            // Если это не новая запись - Берем старую модель для удаления старой картинки
            if(!$this->isNewRecord)
            {
               $old_model=Articles::model()->findByPk($this->id);
               $old_image=$old_model->image;
            }else{
                $old_image='';
            }

			if	($image = CUploadedFile::getInstance($this, 'image')){
				$name = md5(time().$image).'.'.$image->getExtensionName();
				$this->image = $name;
                if(!is_dir($this->folder)){
                    mkdir($this->folder, 0755);
                }
				$image->saveAs($this->folder . '/' . $name);

                if(!is_dir($this->folder.'/medium')){
                    mkdir($this->folder.'/medium', 0755);
                };
                if(!is_dir($this->folder.'/small')){
                    mkdir($this->folder.'/small', 0755);
                };

				Yii::app()->ih
					->load($this->folder . '/' . $this->image)
					->resize($articles_config->imagesize_medium_x, $articles_config->imagesize_medium_y)
					->save($this->folder . '/medium/' . $this->image)
                    ->reload()
					->resize($articles_config->imagesize_small_x, $articles_config->imagesize_small_y)
					->save($this->folder . '/small/' . $this->image);

                if($old_image){
                        //Удаляем старые картинки
                        @unlink($this->folder . '/' .$old_image);
                        @unlink($this->folder . '/medium/' .$old_image);
                        @unlink($this->folder . '/small/' .$old_image);
                }
			}else {$this->image = $old_image;}

			return true;
		}
		else
			return false;
	}

    protected function beforeDelete()
	{
        if(parent::beforeDelete())
        {
            //Удаляем картинку
            @unlink($this->folder . '/' .$this->image);
            @unlink($this->folder . '/medium/' .$this->image);
            @unlink($this->folder . '/small/' .$this->image);

            return true;
        }
        else
            return false;

    }
}