<?php
$this->breadcrumbs=array(
	'Способы доставки',
);
?>


<h1>Способы доставки</h1>

<?echo CHtml::link('+ Добавить способ доставки', array('delivery/create'), array('class'=>'add_element'));?>
<?php $this->widget('application.extensions.admingrid.MyGridView', array(
	'id'=>'order-delivery-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'emptyText'=>'Нет ни одного способа доставки',
	'columns'=>array(
		'id',
		'title',
		'price',
		array(
			'class'=>'MyButtonColumn',
			'template' => '{update}{delete}',
			'buttons'=>array
			(
				'update' => array
				(
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/admin/edit.png',
					'url'=>'Yii::app()->createUrl("order/delivery/update", array("id" => $data->id))',
				),
				'delete' => array
				(
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/admin/del.png',
					'url'=>'Yii::app()->createUrl("order/delivery/delete", array("id" => $data->id))',
				),
			),

		),
	),
)); ?>
