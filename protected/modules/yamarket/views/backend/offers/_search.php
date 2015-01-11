<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title'); ?>
	</div>

    <div class="row">
        <?php echo $form->label($model,'price'); ?>
        <?php echo $form->textField($model,'price'); ?>
    </div>

    <div class="row">
        <?php $category=new CatalogCategory();$category->id=0;?>
        <?php echo $form->label($model,'id_category'); ?>
        <?php echo $form->dropDownList($model,'id_category', $category->getAllChildsList(), array('empty'=>'Не важно')); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Найти'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->