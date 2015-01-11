<?php
$this->breadcrumbs=array(
    'Яндекс.Маркет настройки для товаров'=>array('index'),
	$product->title,
);
?>

<h1>Редактирование настроек выгрузки товара &laquo;<?=$product->title;?>&raquo;</h1>
    
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
