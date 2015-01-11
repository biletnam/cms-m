<?php
$this->breadcrumbs=array(
    'Новости'=>array('/news'),
    'Управление рубриками',
);
?>

<h1>Управление рубриками новостей</h1>

<?php echo CHtml::link('+ Добавить рубрику', array('/news/newsrubr/create'), array('class'=>'add_element')); ?>
<?php $this->widget('ext.admingrid.MyGridView', array(
    'id'=>'news-rubr-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'id',
        'title',
        array(
            'class'=>'MyButtonColumn',
            'template' => '{update}{delete}',
        ),
    ),
)); ?>
