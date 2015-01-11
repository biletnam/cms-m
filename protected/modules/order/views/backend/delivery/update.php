<?php
$this->breadcrumbs=array(
	'Способы доставки'=>array('index'),
	$model->title,
);

?>

<h1>Редактирование способа доставки &laquo;<?php echo $model->title; ?>&raquo;</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>