<?php

class FtsearchModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'ftsearch.models.*',
			'ftsearch.components.*',
			'ftsearch.vendors.*',
		));

        require_once('Zend/Search/Lucene.php');
        
        // прописываем пути к контроллерам и вьюшкам в зависимости от того,
        // фронтенд это или бакенд
		$this->controllerPath=$this->getControllerPath().DIRECTORY_SEPARATOR.Yii::app()->branch;
		$this->viewPath=$this->getViewPath().DIRECTORY_SEPARATOR.Yii::app()->branch;
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// Если что-нибудь понадобится сделать до запуска
            // любого действия любого контроллера - можно сделать здесь
			return true;
		}
		else
			return false;
	}
}
