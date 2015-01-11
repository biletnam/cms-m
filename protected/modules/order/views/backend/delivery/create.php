<?php
$this->breadcrumbs=array(
	'Способы доставки'=>array('index'),
	'Добавление способа доставки',
);

?>

<h1>Добавление способа доставки</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>