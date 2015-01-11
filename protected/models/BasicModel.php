<?php

class BasicModel extends CActiveRecord
{
    public $isDemo = false;
    public $errorSave = "Вы находитесь в демо-режиме. Изменения не могут быть сохранены.";
    public $errorDelete = "Вы находитесь в демо-режиме. Удаление в демо-режиме недоступно.";

    /**
     * Returns the static model of the specified AR class.
     * @return BasicModel the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    protected function beforeSave()
    {
        if(parent::beforeSave() === true)
        {
            if (isset(Yii::app()->params) && isset(Yii::app()->params->isDemo))
                $this->isDemo = Yii::app()->params->isDemo;
            if ($this->isDemo) {
                if (Yii::app()->request->isAjaxRequest)
                    throw new CHttpException(403, $this->errorSave);
                else {
                    Yii::app()->user->setFlash('demo_mode', $this->errorSave);
                    return false;
                }
            }
            return true;
        }
        else
            return false;
    }

    protected function beforeUpdate()
    {
        if(parent::beforeUpdate() === true)
        {
            if (isset(Yii::app()->params) && isset(Yii::app()->params->isDemo))
                $this->isDemo = Yii::app()->params->isDemo;
            if ($this->isDemo) {
                if (Yii::app()->request->isAjaxRequest)
                    throw new CHttpException(403, $this->errorSave);
                else {
                    Yii::app()->user->setFlash('demo_mode', $this->errorSave);
                    return false;
                }
            }
            return true;
        }
        else
            return false;
    }

    protected function beforeDelete()
    {
        if(parent::beforeDelete() === true)
        {
            if (isset(Yii::app()->params) && isset(Yii::app()->params->isDemo))
                $this->isDemo = Yii::app()->params->isDemo;
            if ($this->isDemo) {
                if (Yii::app()->request->isAjaxRequest)
                    throw new CHttpException(403, $this->errorDelete);
                else {
                    Yii::app()->user->setFlash('demo_mode', $this->errorDelete);
                    return false;
                }
            }
            return true;
        }
        else
            return false;
    }

}
?>