
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'yamarket-shopsettings-form',
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company'); ?>
		<?php echo $form->textField($model,'company'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'local_delivery_cost'); ?>
        <?php echo $form->textField($model,'local_delivery_cost'); ?>
    </div>

	<div class="row submit">
		<?php echo CHtml::submitButton('Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
