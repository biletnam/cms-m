<?php $form=new CActiveForm(); ?>

<p><?php echo $form->errorSummary($model, ''); ?></p>

<p>
    <?php echo $form->labelEx($model, 'name'); ?>
    <?php echo $form->textField($model, 'name', array('class'=>'inptext')); ?>
</p>

<p>
    <?php echo $form->labelEx($model, 'phone'); ?>
    <?php echo $form->textField($model, 'phone', array('class'=>'inptext')); ?>
</p>

<p>
    <?php echo $form->labelEx($model, 'text'); ?>
    <?php echo $form->textArea($model, 'text', array('class'=>'inptext')); ?>
</p>

<p>
    <?$this->widget('CCaptcha', array('captchaAction'=>'/order/default/captcha', 'buttonLabel'=>'<br/>Обновить картинку', 'showRefreshButton'=>false, 'clickableImage'=>true));?>
</p>
<p>
    <?=CHtml::textField('OneclickForm[verifyCode]', '', array('class'=>'inptext','placeholder'=>'Введите код'))?>
</p>


<p><input id="oneclicksubmit" value="" class="submit" /></p>

