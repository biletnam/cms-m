<?php
$this->breadcrumbs=array(
	'Статьи'=>array('index'),
	'Добавление',
);
?>

<h1>Добавление статьи</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>