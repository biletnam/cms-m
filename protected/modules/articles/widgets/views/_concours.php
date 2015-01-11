<div class="block">
    <span class="h2"><? echo CHtml::link($data->title, array('/news/default/view', 'id'=>$data->id), array('class'=>'link'));?></span>
	<span><?=rusDate($data->date);?><br/></span>   
    <?=$data->annotation;?>
</div>
