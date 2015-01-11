<?php
$this->breadcrumbs=array(
	'Загрузка прайс-листа'=>array('loadprice'),
	'Типы прайс-листов',
);

?>

<h1>Типы прайс-листов</h1>

<?php
echo CHtml::link('+ Добавить тип', array('create'), array('class'=>'add_element'));
$this->widget('ext.admingrid.MyGridView', array(
	'id'=>'catalog-pricetypes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'name',
		'ident_field',
		'price_field',
		array(
			'class'=>'MyButtonColumn',
            'template'=>'{update}{delete}',
		),
	),
)); ?>
