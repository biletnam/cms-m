<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'htmlOptions'=>array('enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?//php echo $form->label($model,'rubr_id'); ?>
        <?//php echo $form->dropDownList($model,'rubr_id', ArticlesRubr::getDropList(), array('empty'=>'Без рубрики')); ?>
        <?//php echo $form->error($model,'rubr_id'); ?>
    </div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'annotation'); ?>
		<?php echo $form->textArea($model,'annotation',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'annotation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
        <?php
            if ($model->image)
            echo CHtml::image('/'.$model->folder.'/small/'.$model->image);
        ?>
		<?php echo $form->fileField($model,'image'); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'content'); ?>
		<?php $this->widget('application.extensions.ckeditor.CKEditor', array(
				'model'=>$model,
				'attribute'=>'content',
				'language'=>'ru',
				'editorTemplate'=>'full',
		)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->