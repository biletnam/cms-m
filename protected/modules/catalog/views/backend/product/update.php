<h1>Редактирование товара &laquo;<?php echo $model->title; ?>&raquo;</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'productImages'=>$productImages, 'imageDataProvider'=>$imageDataProvider)); ?>