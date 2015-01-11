<?php
$this->breadcrumbs=array(
	'Настройки модуля статей',
);

?>

<h1>Настройки модуля статей</h1>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="flash-success">
        <?php  echo Yii::app()->user->getFlash('success');?>
    </div>


<?php else: ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php endif; ?>