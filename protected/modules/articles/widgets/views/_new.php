<div class="article">
	<? echo CHtml::link($data->title, array('/articles/default/view', 'id'=>$data->id), array('class'=>'title'));?>
	<p><?=$data->annotation;?></p>
</div>