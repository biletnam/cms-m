<?php
$this->breadcrumbs=array(
    'Яндекс.Маркет общие настройки',
);
?>

<h1>Яндекс.Маркет общие настройки</h1>

<?php if(Yii::app()->user->hasFlash('success')):?>
<div class="flash-success">
    <?php  echo Yii::app()->user->getFlash('success');?>
</div>


<?php else: ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>


<?php endif; ?>