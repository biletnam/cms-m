<?php
$this->breadcrumbs=array(
	'Управление заказами',
);

$this->menu=array(
	array('label'=>'List Orders', 'url'=>array('index')),
	array('label'=>'Create Orders', 'url'=>array('create')),
);

/*
// Цепляем плагин "Редактирования на месте"
Yii::app()->clientScript->registerScriptFile('/js/jquery.jeditable.js');

// Скрипт редактирования на месте статуса
$func =<<< EOD
     $('.editablestatus').editable('/manage/order/default/editstatus', {
         indicator : '<img src=\"/css/loading.gif\"/>',
		 id   : "elementid",
		 data   : " {'E':'Letter E','F':'Letter F','G':'Letter G', 'selected':'F'}",
         type      : "select",
         submit    : "Ok",
         tooltip   : 'Кликните для редактирования...',
     });
EOD;
Yii::app()->clientScript->registerScript('editstatus', $func, CClientScript::POS_READY);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('orders-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление заказами</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<!--<div class="search-form" style="display:none">-->
<?php //$this->renderPartial('_search',array(
	//'model'=>$model,
//)); ?>
<!--</div><!-- search-form -->
<?php $this->widget('application.extensions.admingrid.MyGridView', array(
	'id'=>'orders-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'emptyText'=>'Заказов пока нет',
	'columns'=>array(
		array(
			'name'=>'id',
			'value'=>'$data->id',
		),
        array(
        	'name'=>'date',
        	'value'=>'$data->date',
        ),
        
        array(
		    'name'=>'customerName',
            'value'=>'$data->customerdata->name',
        ),
        array(
            'header'=>'Телефон',
            'value'=>'$data->customerdata["phone"]',
        ),
		'status' => array(
                'type'=>'html',
                'value' => 'CHtml::tag("div", array("class"=>"editablestatus", "id"=>"p".$data->id), $data->getStatusList())',
                'header' => 'Статус'
        ),
/*
		array(
			'name'=>'status',
			'header'=>'Статус',
			'type'=>'html',
			'filter'=>false,
			'value'=>'CHtml::tag("div", array("class"=>"editablestatus", "id"=>"p".$data->id), $data->status)',
		),*/
		/* $data->Status[$data->status]
		'comments',
		*/
		array(
			'class'=>'MyButtonColumn',
			'template' => '{view}{delete}',
			'buttons'=>array
			(
				'view' => array
				(
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/admin/view_grid.png',
					'url'=>'Yii::app()->createUrl("order/default/view", array("id" => $data->id))',
				),
				'delete' => array
				(
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/admin/del.png',
					'url'=>'Yii::app()->createUrl("order/default/delete", array("id" => $data->id))',
				),
			),

		),
	),
)); ?>
