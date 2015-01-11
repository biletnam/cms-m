<?php
$this->breadcrumbs=array(
    'Результаты поиска',
);
?>
<div class="producers">
 
	<h1>Результаты поиска "<?php echo CHtml::encode($term); ?>"</h1>
	
		<!--h2>Услуги</h2-->
		<?php
			$this->widget('zii.widgets.CListView', array(
															 /*'pagerCssClass'=>'pagination',
															  'pager'=>array(
																  'cssFile'=>'/css/pager.css',
																  'header'=>'',
																  'prevPageLabel'=>'Предыдущая',
																  'nextPageLabel'=>'Следующая',
																  'firstPageLabel'=>'&nbsp;',
																  'lastPageLabel'=>'&nbsp;',
															  ),   */
															  'dataProvider' => $productProvider,
															  'template' => "{items}<div class='clear'></div>{pager}",
															  'id' => 'results_list',
															  'itemView' => '_view',
//															  'viewData'=> array(
//																  'query'=>$query,
//																  'term'=>$term,
//															  ),
														 )); ?>
		<!--h2>Категории</h2-->
		<?/*php
			$this->widget('zii.widgets.CListView', array(
															 /*'pagerCssClass'=>'pagination',
															  'pager'=>array(
																  'cssFile'=>'/css/pager.css',
																  'header'=>'',
																  'prevPageLabel'=>'Предыдущая',
																  'nextPageLabel'=>'Следующая',
																  'firstPageLabel'=>'&nbsp;',
																  'lastPageLabel'=>'&nbsp;',
															  ),   
															  'dataProvider' => $categoryProvider,
															  'template' => "{items}<div class='clear'></div>{pager}",
															  'id' => 'results_list',
															  'itemView' => '_view',
															  'viewData'=> array(
																  'query'=>$query,
																  'term'=>$term,
															  ),
														 )); */?>


    <div class="clear"></div>
</div>