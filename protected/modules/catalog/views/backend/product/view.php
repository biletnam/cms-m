<?

$cs=Yii::app()->clientScript;
//Подключаем специальный css
$cs->registerCssFile('/css/catalog/admin/catalog_admin.css');

// Показать-скрыть
$cs->registerScript('showhide', "
  $('a.showhide').click(function(){
      if ( $(this).next().css('display') == 'none' ) {
            $(this).next().animate({height: 'show'}, 400);
            $(this).text('Скрыть');
      } else {
            $(this).next().animate({height: 'hide'}, 200);
            $(this).text('Показать');
      }
		return false;
	});
", CClientScript::POS_READY);

// Показать-скрыть (добавление сопутствующих товаров)
$cs->registerScript('shadd', "
  $('a.shadd').click(function(){
      if ( $(this).next().css('display') == 'none' ) {
            $(this).next().animate({height: 'show'}, 400);
      } else {
            $(this).next().animate({height: 'hide'}, 200);
      }
		return false;
	});
", CClientScript::POS_READY);

?>
<h1><?php echo $model->title; ?></h1>
<div class="control-links">
    <?echo CHtml::link('Просмотр на сайте', $model->fullLink, array('class'=>'view_on_site', 'target'=>'_blank'));?>
    <?echo CHtml::link('Редактировать товар', array('update', 'id'=>$model->id), array('class'=>'add_element'));?>
    <?echo CHtml::link('Создать дубликат товара', array('duplicate', 'id'=>$model->id), array('class'=>'add_element'));?>
</div>
<div class="osn_photo">
    <h2>Основное фото</h2>
    <?php
        if($model->image){
            echo CHtml::link(CHtml::image('/upload/catalog/product/medium/' . $model->image, $model->title) , array('/upload/catalog/product/' . $model->image), array('class' => 'showPhoto', 'data-lightbox'=>'group_galery'));
        } else{echo CHtml::image('/css/catalog/admin/nophoto.jpg', $model->title);}
    ?>
</div>
<div class="dop_photo">
    <h2>Дополнительные фото</h2>
    <?php if (isset($model->catalogImages)):
        foreach ($model->catalogImages as $image) :?>
        <?php echo CHtml::link(CHtml::image('/upload/catalog/product/moreimages/small/' . $image->image, $model->title), '/upload/catalog/product/moreimages/' . $image->image, array('data-lightbox'=>'group_galery')); ?>
        <?php
            endforeach;
        endif; ?>
</div>
<div class="clear"></div>
<table class="viewinfo">
    <tr>
        <td>Артикул:</td><td><? echo $model->article;?></td>
    </tr>
    <tr>
        <td>
            Характеристики:
        </td>
        <td>
            <table class="viewattr">
                <? $attrs=$model->outAttrs(); foreach($attrs as $attr):?>
                 <tr><td class="label"><span><?=$attr['title'];?></span></td>
                     <td>
                         <?
                            if(is_array($attr['value'])){
                                echo implode(', ', $attr['value']);
                            }else{
                               echo $attr['value'];
                            }

                         ?>
                     </td>
                 </tr>
                <?endforeach?>
            </table>
        </td>
    </tr>
    <tr>
        <td>Цена:</td><td><? echo $model->price.' руб.';?></td>
    </tr>
    <tr>
        <td>Специальное размещение:</td>
        <td>
            <span class="label">На главной странице:</span> <? echo ($model->on_main ? 'Да' : 'Нет');?><br/>
            <!--span class="label">Хит продаж:</span> <?// echo ($model->hit ? 'Да' : 'Нет');?><br/>
            <span class="label">Рекомендуемый товар:</span> <?// echo ($model->recomended ? 'Да' : 'Нет');?><br/-->
        </td>
    </tr>
    <tr>
        <td>Количество просмотров:</td><td><? echo $model->views;?></td>
    </tr>
    <tr>
        <td>Отображение в каталоге:</td><td><? echo ($model->hide ? 'Нет' : 'Да');?></td>
    </tr>
    <tr>
        <td>Выгрузка в Яндекс.Маркет:</td><td><? echo ($model->noyml ? 'Нет' : 'Да');?></td>
    </tr>
</table>

<h3>Описание</h3>
<a href="#" class="showhide">Показать</a>
<div style="display: none;"><?=$model->description;?></div>

<h3>Сопутствующие товары</h3>
<?
$this->widget('application.extensions.admingrid.MyGridView', array(
	'id'=>'catalog-related-grid',
	'dataProvider'=>$relatedProvider,
	'columns'=>array(
		'title:Наименование',
		array(
			'class'=>'MyButtonColumn',
			'template' => '{delete}',
			'buttons'=>array
			(

				'delete' => array
				(
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/admin/del.png',
					'url'=>'Yii::app()->createUrl("catalog/product/deleterelation", array("product" => '.$model->id.', "id" => $data->id))',
				),
			),

		),

	),
));?>
<a href="#" class="shadd">Добавить сопутствующие товары</a>
<div style="display: none;">
<?
	$add =<<< EOD
		function() {

			$.fn.yiiGridView.update('products-to-relation-grid', {
				type:'POST',
				url:$(this).attr('href'),
				success:function() {
				    $.fn.yiiGridView.update('catalog-related-grid')
					$.fn.yiiGridView.update('products-to-relation-grid');

				}
			});

			return false;

		}
EOD;
$this->widget('application.extensions.admingrid.MyGridView', array(
	'id'=>'products-to-relation-grid',
	'dataProvider'=>$products_to_related->search($model->id),
	'filter'=>$products_to_related,
	'emptyText'=>'Нет товаров',
	'columns'=>array(
		array(
			'name'=>'id',
		),

		array(
			'name'=>'title',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->title), array("product/view", "id"=>$data->id))'
		),

		array(
			'class'=>'MyButtonColumn',
			'template' => '{addrel}',
			'buttons'=>array
			(
				'addrel' => array
				(
                    'label'=>'Добавить',
                    'url'=>'Yii::app()->createUrl("catalog/product/addrelation", array("product" => '.$model->id.', "id" => $data->id))',
                    'click' => $add,
				),

			),

		),

	),
));
?>
</div>
