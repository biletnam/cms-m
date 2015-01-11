<?php

class DefaultController extends BaseArticlesController
{

	public function actionView($id)
	{
        $model = $this->loadModel($id);

        $this->breadcrumbs = array(
            $this->articles_config->feed_name => array('index'),
            $model->title,
        );

        // формируем заголовок и метатеги старницы
        $this->metaInfoGenerate($model->title);

		$this->render('view',array(
			'model'=>$model,
		));
	}

	public function actionIndex($rubr=0)
	{
        $this->breadcrumbs = array(
            $this->articles_config->feed_name,
        );

        $criteria=new CDbCriteria();
        if($rubr){$criteria->compare('rubr_id', $rubr);}
        $rubr_model=ArticlesRubr::model()->findByPk($rubr);

        // формируем заголовок и метатеги старницы
		if($rubr)$title=$rubr_model->title; else $title=$this->articles_config->feed_name;
        $this->metaInfoGenerate($title);

        $dataProvider = new CActiveDataProvider('Articles', array(
           'criteria'=>$criteria,
           'pagination'=>array(
                'pageSize'=>$this->articles_config->perpage,
                ),
            'sort' => array(
                'defaultOrder' => 'sort_order',
                ),
        ));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
            'title'=>$title,
		));
	}

	public function loadModel($id)
	{
		$model=Articles::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


}