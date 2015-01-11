<?php
$this->breadcrumbs=array(
	'Управление заказами'=>array('index'),
    'Заказ №'.$model->id,
);
// Скрипты для обновления суммы и виджета корзины
$update=<<< EOD
    function() {
        $.ajax({
            url:'/manage/order/default/changeStatus?id=".$model->id."',
            beforeSend:  function(){
                $('#change-status-td').html('<img src="/css/loading.gif"/>');
            },
            success:function(data) {
                $('#change-status-td').html(data);
                return false;
            },
        });
    }
EOD;
//Подключаем специальный css
Yii::app()->clientScript->registerCssFile('/css/order/order_admin.css');

// Цепляем плагин "Редактирования на месте"
Yii::app()->clientScript->registerScriptFile('/js/jquery.jeditable.js');

// Скрипт изменения примечания
Yii::app()->clientScript->registerScript('remarkchange', "
     $('#remark').editable('/manage/order/default/saveremark?id=".$model->id."', {
         id   : 'elementid',
         type      : 'textarea',
         submit    : 'Сохранить',
         indicator : '<img src=\"/css/loading.gif\"/>',
         tooltip   : 'Кликните для редактирования...'
     });
	 
", CClientScript::POS_READY);

Yii::app()->clientScript->registerScript('change-status', "
$('.change-status-button').click(function(){
	$('.change-status-form').toggle();
	return false;
});
$('#change-status-form').submit(function(){
	var str = $(this).serialize();
	$.ajax({
            url:'/manage/order/default/changestatus?id=".$model->id."',
            type: 'POST',
			data: str,
            success:function(data) {
                $('#change-status-td').find('.status').html(data);
				$('.change-status-form').toggle();
                return false;
            },
        });
	return false;
});
");
?>

<h1>Заказ №<?php echo $model->id; ?></h1>

<table class="viewinfo">
    <tr>
        <td>Дата и время поступления:</td><td><?=$model->date;?></td>
    </tr>
    <!--tr>
        <td>Способ доставки:</td>
        <td>
            <?/* if(is_object($model->deliverymethod)){
                    echo $model->deliverymethod->title;
                }else{echo 'Неизвестен';}*/
            ?>
        </td>
    </tr-->
    <tr>
        <td>Информация о покупателе:</td>
        <td>
            <?if(is_object($model->customerdata)):?>
            <span class="label">Имя:</span> <?=$model->customerdata->name;?><br/>
            <span class="label">E-mail:</span> <?=$model->customerdata->email;?><br/>
            <span class="label">Адрес:</span> <?=$model->customerdata->adress;?><br/>
            <span class="label">Телефон:</span> <?=$model->customerdata->phone;?><br/>
            <?else:?>
                <span class="label">Нет информации</span>
            <?endif?>
        </td>
    </tr>
    <tr>
        <td>Комментарии покупателя:</td><td><?=$model->comments;?></td>
    </tr> 
	<tr>
        <td>Статус:</td><td id="change-status-td"><span class="status"><?=$model->Status[$model->status];?></span><?php echo ' ('.CHtml::link('Изменить','#',array('class'=>'change-status-button')).')'; ?></td>
    </tr>
</table>
<div class="change-status-form" style="display:none">
<?php $this->renderPartial('_change-status',array(
	'model'=>$model,
)); ?>
</div>
<h2>Содержание заказа</h2>
<table class="infotable">
    <thead>
        <tr>
            <th>№</th><th>Артикул</th><th>Наименование товара</th><th>Цена</th><th>Количество</th><th>Сумма</th>
        </tr>
    </thead>
    <tbody>
    <?$i=1;foreach($model->positions as $position):?>
        <tr>
            <td><?=$i;?></td>
			<td><?=$position->article;?></td>
            <td><?=$position->title;?></td>
            <td><?=$position->price;?></td>
            <td><?=$position->quantity;?></td>
            <td><?=$position->price*$position->quantity;?></td>
        </tr>
        <?$i++;endforeach?>
    </tbody>
</table>
<div class="resume"><span class="label">Сумма заказа:</span> <?=$model->sum;?></div>
<div class="admin_remark">
    <span class="label">Пометки:</span><br/>
    <div id="remark"><?=$model->admin_remark;?></div>
</div>
