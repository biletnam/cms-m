<?php
$this->pageTitle = Yii::app()->name . ' - Контакты';
$this->breadcrumbs = array(
    'Контакты',
);
?>
<h1>Контакты</h1>
<div class="contacts-inner">

    <?php $this->widget('application.widgets.OutAreaWidget', array('name' => 'kontakty')); ?>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1195.2993551135698!2d45.01672549570067!3d53.189178035561426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x41410058dc363443%3A0x2f94852612eafe7a!2z0YPQuy4g0JrRg9GA0LDQtdCy0LAsIDHQkCwg0J_QtdC90LfQsCwg0J_QtdC90LfQtdC90YHQutCw0Y8g0L7QsdC7LiwgNDQwMDAw!5e0!3m2!1sru!2sru!4v1429707146078" width="384" height="473" frameborder="0" style="border: solid 1px #d2c8ac;"></iframe>
    <div class="form-contacts">
        <?php $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>
