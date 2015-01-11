<?php
$this->breadcrumbs=array(
	'Order Carts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrderCart', 'url'=>array('index')),
	array('label'=>'Manage OrderCart', 'url'=>array('admin')),
);
?>

<h1>Create OrderCart</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>