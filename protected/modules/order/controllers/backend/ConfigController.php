<?php

class ConfigController extends BackEndController
{
	public function actionIndex()
	{
		$emailDataProvider=new CActiveDataProvider('OrderConfig', array(
			//'criteria'=>$category_criteria,
			'pagination'=>false,
		));
		
        $model=new OrderConfig();
		if(isset($_POST['OrderConfig']))
		{
            $model->attributes=$_POST['OrderConfig'];
            if($model->save()){
                //Yii::app()->user->setFlash('success',"Изменения успешно сохранены!");
				$this->redirect(array('index'));
            }

        }
		$this->render('index',array(
			'model'=>$model,
			'emailDataProvider'=>$emailDataProvider,
		));
	}

	public function actionDelete($id)
	{	
		
		if(Yii::app()->request->isPostRequest)
		{
			$mails=OrderConfig::model()->findAll();
			// загружаем модель
			if (count($mails)>1) {
            $model=OrderConfig::model()->findByPk($id);

            // удаляем модель
			$model->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
			}
			else
				throw new CHttpException(400,'Некорректный запрос. Должен быть хотя бы один E-mail адрес.');
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
}