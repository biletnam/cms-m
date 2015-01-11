<?php
/**
 * @var $dataProvider CActiveDataProvider
 */

?>
<h1><?php
	if (!empty($category->long_title)) {
		echo $category->long_title;
	}
	else if (!empty($category->title)){
		echo $this->title;
	}
	else{
		echo $this->catalog_config->title;
	}?>
</h1>
<?php if (!empty($category->text)): ?>
	<div class="category-description"><?php echo $category->text; ?></div>
	<br>
<?php endif;

if (empty($category->product_view) or $category->product_view===0) {$this->widget('zii.widgets.CListView', array(
	'id' => 'product-list',
	'dataProvider' => $dataProvider,
	'ajaxUpdate' => true,
	'template' => "{items}\n{pager}",
	'itemView' => '_productcatalogview',
	'pagerCssClass' => 'pager',
	'pager' => array(
		'pageSize' => 6,
		'cssFile' => '/css/style.css',
		'header' => '',
		'prevPageLabel' => '<',
		'nextPageLabel' => '>',
		'firstPageLabel' => false,
		'lastPageLabel' => false,
	),
	'emptyText' => 'Товары не найдены',
));
} else {
	$this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'product-grid',
		'dataProvider' => $dataProvider,
		'template' => "{items}\n{pager}",
		'cssFile' => '/css/style.css',
		'pagerCssClass' => 'pager',
		'pager' => array(
			'cssFile' => '/css/style.css',
			'header' => '',
			'prevPageLabel' => '<',
			'nextPageLabel' => '>',
			'firstPageLabel' => false,
			'lastPageLabel' => false,
		),
		'emptyText' => '',
		'columns' => array(
			'title',
			'price',
		),
	));
}

?>

<div class="clear"></div>
