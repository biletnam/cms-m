<?php
$this->breadcrumbs=array(
	'Настройки модуля доставки',
);
?>
<h1>Настройки модуля доставки</h1>

<?php $this->widget('application.extensions.admingrid.MyGridView', array(
	'id'=>'order-delivery-grid',
	'dataProvider'=>$emailDataProvider,
    'emptyText'=>'Нет ни одного E-mail адреса',
	'columns'=>array(
		array(
            'header'=>'E-mail адреса для отправки уведомлений',
            'value'=>'$data->notice_email',
        ),
		array(
			'class'=>'MyButtonColumn',
			'template' =>'{delete}',
		),
	),
)); ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'catalogconfig-form',
    'htmlOptions'=>array('enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>true,
)); ?>
    <p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения</p>
	<?php echo $form->errorSummary(array($model)); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'notice_email'); ?>
		<?php echo $form->textField($model,'notice_email'); ?>
        <?php echo $form->error($model, 'notice_email'); ?>
	</div>

    <div class="row submit">
		<?php echo CHtml::submitButton('Добавить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->