<?php
$this->breadcrumbs=array(
	'News Rubrs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List NewsRubr', 'url'=>array('index')),
	array('label'=>'Create NewsRubr', 'url'=>array('create')),
	array('label'=>'Update NewsRubr', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete NewsRubr', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NewsRubr', 'url'=>array('admin')),
);
?>

<h1>View NewsRubr #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
	),
)); ?>
