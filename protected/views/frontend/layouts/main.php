<?php $this->beginContent('//layouts/main_layout'); ?>
<div class="inner">
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'homeLink' => CHtml::link('Главная','/'),
		'separator' => '<div>'.CHtml::image("/images/delimitr-wheel.png", '').'</div>',
		'links' => $this->breadcrumbs,
		));
	?>
	<?php echo $content; ?>

	<div class="leftbar">
		<div class="leftbar_menu">
        <?$this->widget('application.modules.catalog.components.MenuCategoryTreeWidget',
                        array(
                            'cssFile'=>'/css/catalog/menutree.css',
         ));?>

		</div>
	</div>

	<div class="clear"></div>
</div>
<?php $this->endContent(); ?>