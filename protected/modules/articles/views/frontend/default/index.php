
        <h1><?=$title;?></h1>

        <?php $this->widget('zii.widgets.CListView', array(

            'dataProvider' => $dataProvider,
            'template' => "{items}\n{pager}",
            'id' => 'articles_list',
            'itemView' => '_view',
            'separator' => '<div class="separator"><hr><img class="" src="/images/ship_steering_wheel.png" alt=""><hr></div>',
            'pager' => array(
                'firstPageLabel'=>false,
                'prevPageLabel'=>'<',
                'nextPageLabel'=>'>',
                'lastPageLabel'=>false,
                'maxButtonCount'=>'10',
                'header'=>false,
                'cssFile'=>Yii::app()->getBaseUrl(true).'/css/style.css'
            ),
         )); ?>
        <div class="clear"></div>


    
