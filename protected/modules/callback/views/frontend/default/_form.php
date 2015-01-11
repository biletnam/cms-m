<?php
Yii::app()->clientScript->registerScript("send-message", "
        $(document).off('click', '.button');
        $(document).on('click', '.button', function(){
            $.ajax({
                type: 'POST',
                url: '/callback',
                cache: false,
                async: false,
                data: $('#review-form').serialize(),
				success:function(data) {
				    var responce = $(data);
				    $('.fotoport').html(responce.html());;
				},
				error: function(data){
				}
            });
            //return false;
        });
    ", CClientScript::POS_READY);
?>
<div class="fotoport">
    <?php if (Yii::app()->user->hasFlash('callback_message')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('callback_message'); ?>
        </div>
    <?php else: ?>
    <?php $form = $this->beginWidget('CActiveForm', array(
                          'id' => 'review-form',
                          'htmlOptions' => array('enctype' => 'multipart/form-data'),
                     )); ?>
    <div class="form">
        <h1>Напишите нам</h1>
        <br>
<!--        <p>Все поля обязательны для заполнения</p>-->
        <div class="row">
            <?php echo $form->textField($model, 'name', array('placeholder'=>"Фамилия Имя Отчество",'maxlength'=>255)); ?>
        </div>
        <div class="row">
            <?php echo $form->textField($model, 'email', array('placeholder'=>$model->getAttributeLabel('email'),'maxlength'=>255)); ?>
        </div>
        <div class="row">
            <?php echo $form->textField($model, 'phone', array('placeholder'=>$model->getAttributeLabel('phone'),'maxlength'=>255)); ?>
        </div>
        <div class="row">
            <?php echo $form->textArea($model, 'text', array('class' => 'txt','maxlength'=>700, 'rows' => 6, 'cols' => 30, 'placeholder'=>$model->getAttributeLabel('text'))); ?>
        </div>
        <?php if (extension_loaded('gd') and CallbackConfig::model()->checkCaptchaEnabled()): ?>
            <div class="row captcha">
                <div class="captcha-wrapper">
                    <?php $this->widget('CCaptcha', array('captchaAction'=>'/callback/default/captcha', 'buttonLabel'=>'Обновить картинку'))?>
                    <?=CHtml::activeTextField($model, 'verifyCode', array('id' => 'captcha', 'placeholder'=>'Введите код'))?>
                </div>
            </div>
        <?php endif; ?>
        <?php $errors=$model->getErrors(); ?>
        <div class="errorSummary"><?php if(count($errors)>0) echo("Все поля обязательны для заполнения"); else echo(" "); ?></div>
        <div class="row">
            <div class="button"><?php echo CHtml::button('Отправить', array('id'=>'submit', 'name' => 'Send message')); ?></div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
    <?php endif; ?>
</div>
