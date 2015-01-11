<?php

class DefaultController extends BackEndController
{
	public function actionIndex()
    {
        if(!$model=YamarketShopsettings::model()->find()){$model=new YamarketShopsettings();}

        if(isset($_POST['YamarketShopsettings']))
        {
            $model->attributes=$_POST['YamarketShopsettings'];
            if($model->save()){

                //$this->redirect(array('view','id'=>$model->id));
                Yii::app()->user->setFlash('success',"Изменения успешно сохранены!");

            }

        }

        $this->render('index',array(
            'model'=>$model,
        ));
    }
}