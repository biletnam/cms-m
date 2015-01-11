<?php

class ArticlesconfigController extends BackEndController
{
    public $defaultAction='update';

	public function actionUpdate()
	{
		$model=$this->loadModel(1);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ArticlesConfig']))
		{
			$model->attributes=$_POST['ArticlesConfig'];
			if($model->save())
				Yii::app()->user->setFlash('success',"Изменения успешно сохранены!");
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}



	/**
	 * Загрузка конфигурации
	 */
	public function loadModel($id)
	{
		$model=ArticlesConfig::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='news-config-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
