<?php
$this->breadcrumbs=array(
	'Order Carts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrderCart', 'url'=>array('index')),
	array('label'=>'Create OrderCart', 'url'=>array('create')),
	array('label'=>'View OrderCart', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OrderCart', 'url'=>array('admin')),
);
?>

<h1>Update OrderCart <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>