<div class="last_articles">
	<?php 
	$this->widget('zii.widgets.CListView', array(
        'id'=>'lastnews-list'.$this->rubr,
        'dataProvider'=>$dataProvider,
        'template'=>"{items}",
        'separator' => '<div class="separator">
                            <hr>
                                <img class="" src="images/ship_steering_wheel.png" alt="">
                            <hr>
                        </div>',
        'itemView'=>'_new',
        'emptyText'=>'',
    )); ?>
    <a class="link" href="<?php echo '/articles'?>">Все статьи</a>

</div>