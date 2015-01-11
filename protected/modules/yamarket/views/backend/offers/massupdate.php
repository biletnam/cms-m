<?php
$this->breadcrumbs=array(
    'Яндекс.Маркет настройки для товаров'=>array('index'),
	'Массовая настройка выгрузки товаров',
);
?>

<h1>Массовая настройка выгрузки товаров</h1>
    
<?php echo $this->renderPartial('_massupdateform', array('model'=>$model, 'ids'=>$ids)); ?>
