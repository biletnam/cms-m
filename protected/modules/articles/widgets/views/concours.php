<?php $this->widget('zii.widgets.CListView', array(
        'id'=>'lastnews-list',
        'dataProvider'=>$dataProvider,
        'template'=>"{items}",
        'itemView'=>'_concours',
        'emptyText'=>'',
    )); ?>


