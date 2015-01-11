
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'siteconfig-form',
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'store'); ?>
        <?php echo $form->checkBox($model,'store'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'pickup'); ?>
        <?php echo $form->checkBox($model,'pickup'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'local_delivery_cost'); ?>
        <?php echo $form->textField($model,'local_delivery_cost'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'sales_notes'); ?>
		<?php echo $form->textArea($model,'sales_notes'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'manufacturer_warranty'); ?>
        <?php echo $form->checkBox($model,'manufacturer_warranty'); ?>
    </div>

    <?
        foreach($ids as $id=>$val){
            echo CHtml::hiddenField("checkid[".$id."]", 1);
        }
    ?>

	<div class="row submit">
		<?php echo CHtml::submitButton('Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
