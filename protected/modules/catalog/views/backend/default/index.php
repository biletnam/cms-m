<?
// Цепляем плагин "Редактирования на месте"
Yii::app()->clientScript->registerScriptFile('/js/jquery.jeditable.js');

// Скрипт редактирования на месте цены
	$func =<<< EOD
		function() {

     $('.editableprice').editable('/manage/catalog/product/editprice', {
         id   : 'elementid',
         type      : 'text',
         cancel    : false,
         submit    : 'Ok',
         indicator : '<img src=\"/css/loading.gif\"/>',
         tooltip   : 'Кликните для редактирования...'
     });

		}
EOD;
Yii::app()->clientScript->registerScript('editprice', "
     $('.editableprice').editable('/manage/catalog/product/editprice', {
         id   : 'elementid',
         type      : 'text',
         cancel    : false,
         submit    : 'Ok',
         indicator : '<img src=\"/css/loading.gif\"/>',
         tooltip   : 'Кликните для редактирования...'
     });
", CClientScript::POS_READY);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});

");
Yii::app()->clientScript->registerScript('publicate', "
$(document).on('click','#products-grid .yamarket',function() {
	$.ajax({
		type:'POST',
		url:'/manage/catalog/product/publicate',
		data: {id:$(this).data('id'),yam:$(this).prop('checked')},
		success:function() {
			$.fn.yiiGridView.update('products-grid');
		}
	});
	return true;
});

$(document).on('click','#products-grid .hider',function() {
	$.ajax({
		type:'POST',
		url:'/manage/catalog/product/publicate',
		data: {id:$(this).data('id'),hide:$(this).prop('checked')},
		success:function() {
			$.fn.yiiGridView.update('products-grid');
		}
	});
	return true;
});

");
?>
<h1><?php echo $category->title;?></h1>
<div class="advanced_search">
    <?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
    <div class="search-form" style="display:none">
        <p>
            Можно ввести опреатор сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
            или <b>=</b>) в начале значений.
        </p>

        <?php $this->renderPartial('_search',array(
        'model'=>$products,
    )); ?>
    </div><!-- search-form -->
</div>

<div class="block">
<h2>Список подкатегорий</h2>
<?php 
echo CHtml::link('+ Добавить подкатегорию', array('default/create', 'id'=>$category->id), array('class'=>'add_element'));
$this->widget('application.extensions.admingrid.MyGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$categoryDataProvider,
	//'template'=>"{items}",
	'emptyText'=>'Нет подкатегорий',
	//'filter'=>$model,
	'hideHeader'=>true,
	'columns'=>array(
	/*	array(
			'name'=>'id',
			'filter'=>false,
		),*/
		array(
			'name'=>'title',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->title), array("index", "id"=>$data->id))',
		),
		array(
			'header'=>'Подкатегории',
			'type'=>'raw',
			'value'=>'(count($data->childs)>0) ? CHtml::link("Подкатегории(".count($data->childs).")", array("index", "id"=>$data->id))  : "Подкатегорий нет"',
		),
		array(
			'class'=>'MyButtonColumn', 
			'template' => '{update}{delete}',
		),
        array(
            'class'=>'application.modules.catalog.components.SSortable.SSortableCatalogCategoryColumn',
        ),
	),
)); 

?>
</div>


<h2>Список товаров</h2>
<?php
echo CHtml::link('+ Добавить товар', array('product/create', 'id_category'=>$category->id), array('class'=>'add_element'));
$this->widget('application.extensions.admingrid.MyRGridView', array(
	'id'=>'products-grid',
	'dataProvider'=>$products->search(),
	'filter'=>$products,
	'emptyText'=>'Нет товаров в данной подкатегории',
    'afterAjaxUpdate'=>$func,
    'orderUrl'=>array('product/order'),
	'columns'=>array(
		array(
			'name'=>'id',
			'filter'=>false,
		),
/*		array(
			'name'=>'number',
			'type'=>'raw',
			'filter'=>false,
			'value'=>'CHtml::link(CHtml::encode($data->number), array("catalogProduct/update", "id"=>$data->id))'
		),*/
		array(
			'name'=>'title',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->title), array("product/view", "id"=>$data->id))'
		),
		array(
			'name'=>'price',
            'type'=>'raw',
			'filter'=>false,
			'value'=>'CHtml::tag("div", array("class"=>"editableprice", "id"=>"p".$data->id), $data->price)." руб."'
		),
/*		array(
			'name'=>'square',
			'filter'=>false,
			'value'=>'$data->square." кв.м."'
		),*/
		array(
			'header'=>'Опубликовано',
			'type'=>'raw',
			'value'=>'CHtml::checkBox("yam",!$data->hide,array("class"=>"hider","data-id"=>$data->id))'
		),
		array(
			'header'=>'ЯМаркет',
			'type'=>'raw',
			'value'=>'CHtml::checkBox("yam",!$data->noyml,array("class"=>"yamarket","data-id"=>$data->id))'
		),
		array(
			'class'=>'MyRButtonColumn',
			'template' => '{update}{delete}',
			'buttons'=>array
			(
				'update' => array
				(
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/admin/edit.png',
					'url'=>'Yii::app()->createUrl("catalog/product/update", array("id" => $data->id))',
				),
				'delete' => array
				(
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/admin/del.png',
					'url'=>'Yii::app()->createUrl("catalog/product/delete", array("id" => $data->id))',
				),
			),

		),
        array(
            'class'=>'application.modules.catalog.components.SSortable.SSortableCatalogColumn',
        ),
	),
)); 

?>



