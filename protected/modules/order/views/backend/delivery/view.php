<?php
$this->breadcrumbs=array(
	'Order Deliveries'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List OrderDelivery', 'url'=>array('index')),
	array('label'=>'Create OrderDelivery', 'url'=>array('create')),
	array('label'=>'Update OrderDelivery', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OrderDelivery', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrderDelivery', 'url'=>array('admin')),
);
?>

<h1>View OrderDelivery #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'price',
	),
)); ?>
