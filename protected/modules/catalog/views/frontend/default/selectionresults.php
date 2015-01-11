<?
Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".flash-success").animate({opacity: 1.0}, 2000).fadeOut("slow");',
   CClientScript::POS_READY);	
?>
<h1>Результаты подбора товаров</h1>
	<?php if(Yii::app()->user->hasFlash('success')):?>
        <div class="flash-success">
            <?php  echo Yii::app()->user->getFlash('success');?>
        </div>
        <?php endif; ?>
<div class="products">
<?if ((empty($category)) or ((!empty($category))and($category->product_view==0))):?>
	<?php $this->widget('zii.widgets.CListView', array(
		'id'=>'selected-products-list',
		'dataProvider'=>$dataProvider,
		'template'=>'{items}<div class="clear"></div>{pager}',
		'itemView'=>'_productview',
		'cssFile'=>'/css/style.css',
		'pagerCssClass'=>'pager',
		'pager'=>array(
			'cssFile'=>'/css/style.css',
			'header'=>'',
			'prevPageLabel'=>'&#9668;',
			'nextPageLabel'=>'&#9658;',
			'firstPageLabel'=>'<<',
			'lastPageLabel'=>'>>',
		),
	)); ?>
<?endif;?>
<?if ((!empty($category))and($category->product_view==1)):?>
	<?php 
		$attr_columns=array();
		$attr_columns[]=array(
				'name'=>'title',
				'header'=>'Наименование',
				'type'=>'raw',
				'headerHtmlOptions'=>array('style'=>'text-align:left;'),
				'value'=>'CHtml::link($data->title, $data->fullLinkFast)',
			);
		$attr_columns[]=array(
				'name'=>'price',
				'header'=>'Цена',
				'htmlOptions'=>array('style'=>'text-align:center;'),
			);
		$attrs=$category->use_attribute;
		if (count($attrs)>0) {
			
			foreach($attrs as $attribute) {
				if ($attribute->on_table) {
					$attr_column=array();
					$attr_column['header']=$attribute->title;
					$attr_column['value']='$data->getProductAttributeValue("'.$attribute->name.'")';
					$attr_column['htmlOptions']=array('style'=>'text-align:center;');
					$attr_columns[]=$attr_column;
				}
			}
		}
		$attr_columns[]=array(
			'header'=>'',
			'type'=>'raw',
			'value'=>'CHtml::link("В корзину", Yii::app()->createUrl("/order/cart/add/", array("product_id"=>$data->id)),array("class"=>"cart"))',
			'htmlOptions'=>array('style'=>'text-align:center;'),
		);
		$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'selected-product-grid',
        'dataProvider'=>$dataProvider,
        'template'=>'{pager}<div class="clear"></div>{items}<div class="clear"></div>{pager}',
		'cssFile'=>'/css/style.css',
		'pagerCssClass'=>'pager',
		'pager'=>array(
			'cssFile'=>'/css/style.css',
			'header'=>'',
			'prevPageLabel'=>'&#9668;',
			'nextPageLabel'=>'&#9658;',
			'firstPageLabel'=>'<<',
			'lastPageLabel'=>'>>',
		),
        'emptyText'=>'',
		'columns'=>$attr_columns,
	
    )); ?>
<?endif;?>
</div>