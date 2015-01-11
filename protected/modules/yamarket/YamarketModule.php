<?php

class YamarketModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'yamarket.models.*',
			'yamarket.components.*',
		));

        // прописываем пути к контроллерам и вьюшкам в зависимости от того,
        // фронтенд это или бакенд
        $this->controllerPath = $this->getControllerPath() . DIRECTORY_SEPARATOR . Yii::app()->branch;
		$this->viewPath = $this->getViewPath() . DIRECTORY_SEPARATOR . Yii::app()->branch;
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
