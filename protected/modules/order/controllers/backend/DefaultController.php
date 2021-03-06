<?php

class DefaultController extends BackEndController
{

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Orders;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Orders']))
		{
			$model->attributes=$_POST['Orders'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Orders']))
		{
			$model->attributes=$_POST['Orders'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Orders('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Orders']))
			$model->attributes=$_GET['Orders'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

    // Сохранение примечания
    public function actionSaveRemark($id){
        $model=$this->loadModel($id);
        $model->admin_remark=$_POST['value'];
        $model->save();
        echo $model->admin_remark;
    }

	public function actionChangeStatus($id){
		$orders=array();
		if ($_POST['Orders']) $orders=$_POST['Orders'];
		
		$model=$this->loadModel($id);
		$model->status=$orders['status'];
		$model->save();
		echo $model->Status[$model->status];
    }
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Orders::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='orders-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionLoadstatus(){
         $array['0'] =  'Letter E'; 
		$array['1'] =  'Letter F'; 
		$array['2'] =  'Letter G'; 
		
		print json_encode($array);
		}
	
	public function actionEditstatus(){
 		if(Yii::app()->request->isPostRequest)
		{
            $id=substr($_POST['elementid'], 1);
            if($model = $this->loadModel($id)){
                $model->status=$_POST['value'];
                $model->save();
                echo $model->status;
            }
            else
                        throw new CHttpException(400,'Incorrect id.');

		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }
	
	public function actionAddlist($id){
        
            if($model = $this->loadModel($id)){
                $model->status=$_POST['value'];
                $model->save();
				}
			else
                        throw new CHttpException(400,'Incorrect id.');
    }
}
