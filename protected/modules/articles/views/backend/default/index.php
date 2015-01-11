<?php
$this->breadcrumbs=array(
	'Статьи'
);
?>

<h1>Управление статьями</h1>

<?php echo CHtml::link('+ Добавить статью', array('/articles/default/create'), array('class'=>'add_element')); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getBaseUrl(true).'/css/admin/gridstyles.css',
	'columns'=>array(
		/*array(
			'name'=>'id',
			'filter'=>false,
		),*/
        /*array(
            'name'=>'rubr_id',
            'value'=>'$data->rubr_id ? $data->rubric->title : "Без рубрики"',
            'filter' => ArticlesRubr::model()->getDropList(),
        ),*/
		'title',

		array(
			'class'=>'CButtonColumn',
			'template' => '{update}{delete}',
			'buttons'=>array
			(
				'update' => array
				(
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/admin/edit.png',
				),
				'delete' => array
				(
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/admin/del.png',
				),
			),
		),
        array(
            'class'=>'ext.SSortable.SSortableColumn',
        ),
	),
)); ?>
