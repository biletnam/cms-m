<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-config-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, отмеченные звездочкой <span class="required">*</span>, обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'feed_name'); ?>
		<?php echo $form->textField($model,'feed_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'feed_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'perpage'); ?>
		<?php echo $form->textField($model,'perpage'); ?>
		<?php echo $form->error($model,'perpage'); ?>
	</div>

    <h3>Размеры картинок</h3>

	<div class="row">
		<?php echo $form->labelEx($model,'imagesize_medium_x'); ?>
		<?php echo $form->textField($model,'imagesize_medium_x'); ?>
		<?php echo $form->error($model,'imagesize_medium_x'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imagesize_medium_y'); ?>
		<?php echo $form->textField($model,'imagesize_medium_y'); ?>
		<?php echo $form->error($model,'imagesize_medium_y'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imagesize_small_x'); ?>
		<?php echo $form->textField($model,'imagesize_small_x'); ?>
		<?php echo $form->error($model,'imagesize_small_x'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imagesize_small_y'); ?>
		<?php echo $form->textField($model,'imagesize_small_y'); ?>
		<?php echo $form->error($model,'imagesize_small_y'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->