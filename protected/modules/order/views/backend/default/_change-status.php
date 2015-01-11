
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'change-status-form',
	'enableAjaxValidation'=>false,
	'method'=>'post',
	
)); ?>
	<?php echo $form->errorSummary($model); ?>


	<div class="row"> 
        <p class="label">Статус</p>
        <?php echo $form->dropDownList($model,'status', $model->getStatus(), array('empty'=>null));?>
		<?php echo CHtml::submitButton('Ок',array('class'=>'submit')); ?>
    </div>



<?php $this->endWidget(); ?>

</div><!-- form -->
