<?php
$this->breadcrumbs=array(
    'Новости'=>array('/news'),
	'Управление рубриками'=>array('index'),
	'Создание рубрики',
);

$this->menu=array(
	array('label'=>'List NewsRubr', 'url'=>array('index')),
	array('label'=>'Manage NewsRubr', 'url'=>array('admin')),
);
?>

<h1>Создание рубрики</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>