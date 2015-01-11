<?php
$this->breadcrumbs=array(
	'Яндекс.Маркет настройки для товаров',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('siteconfig-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<h1>Яндекс.Маркет настройки для товаров</h1>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
    <p>
        Можно ввести опреатор сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
        или <b>=</b>) в начале значений.
    </p>
    <?php $this->renderPartial('_search',array(
    'model'=>$product,
)); ?>
</div><!-- search-form -->

<?php
    // Форма для массового изменения параметров
    $form=$this->beginWidget('CActiveForm', array(
        'id'=>'siteconfig-form',
        'action'=>'/manage/yamarket/offers/massupdate',
    ));
?>

<?php $this->widget('application.extensions.admingrid.MyGridView', array(
    'id'=>'siteconfig-grid',
    'dataProvider'=>$model->product_search($product),
    'filter'=>$product,
    'columns'=>array(
        array(
            'header'=>'',
            'type'=>'raw',
            'value'=>'CHtml::checkBox("checkid[".$data->id."]", "")',
        ),
       /* array(
            'header'=>'11',
            'type'=>'raw',
            'value'=>'$data->thisMarket->id',
        ),*/
        'title',
        'price',
        
        array(
            'class'=>'MyButtonColumn',
            'template'=>'{update}',
        ),
    ),
));
echo CHtml::submitButton('Изменить выделенные');
$this->endWidget();
?>

