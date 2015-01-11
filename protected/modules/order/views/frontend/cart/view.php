<?php
$this->breadcrumbs=array(
	'Order Carts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OrderCart', 'url'=>array('index')),
	array('label'=>'Create OrderCart', 'url'=>array('create')),
	array('label'=>'Update OrderCart', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OrderCart', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrderCart', 'url'=>array('admin')),
);
?>

<h1>View OrderCart #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'session_id',
		'product_id',
		'price',
		'quantity',
		'date',
	),
)); ?>
