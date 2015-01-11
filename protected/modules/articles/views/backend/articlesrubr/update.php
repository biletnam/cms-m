<?php
$this->breadcrumbs=array(
    'Новости'=>array('/news'),
    'Управление рубриками'=>array('index'),
    'Редактирование рубрики',
);

?>

<h1>Редактирование рубрики &laquo;<?php echo $model->title; ?>&raquo;</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>