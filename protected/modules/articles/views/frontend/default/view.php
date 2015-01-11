
<h1><?php echo $model->title; ?></h1>
<?php  echo CHtml::link(CHtml::image('/upload/articles/medium/' . $model->image, $model->title),'/upload/articles/' . $model->image,array('class'=>'fancybox'));?>
<?php echo $model->content;?>
<div class="clear"></div>