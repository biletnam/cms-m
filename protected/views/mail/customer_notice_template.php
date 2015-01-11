<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
</head>

<body>
	<p>Здравствуйте! Вы сделали заказ на сайте <a href="<?php echo $this->createAbsoluteUrl('/');?>">&laquo;<?php echo CHtml::encode($this->siteconfig->sitename); ?>&raquo;</a>.</p>

    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <td><b>№</b></td>
            <!--td><b>Артикул</b></td-->
            <td><b>Наименование</b></td>
			<?/*if(!Yii::app()->user->isGuest):?>
				<td><b>Опт</b></td>
			<?endif;*/?>
            <td><b>Цена</b></td>
			<?/*if(!Yii::app()->user->isGuest):?>
				<td><b>Скидка</b></td>
			<?endif;*/?>
            <td><b>Количество</b></td>
            <td><b>Сумма</b></td>
        </tr>
        <?$num=1;foreach($order->positions as $position):?>
            <tr>
				<td><?=$num;$num++;?></td>
				<!--td><?//=$position['article'];?></td-->
                <td><a href="<?php echo $this->createAbsoluteUrl('/').$position->fullLink;?>"><?=$position->title;?></a></td>
				<?/*if(!Yii::app()->user->isGuest):?>
					<td><?=number_format($position->price_dealer, 0, ","," ");?>  руб.</td>
				<?endif;*/?>
                <td><?=number_format($position->price, 0, ","," ");?>  руб.</td>
				<?/*if(!Yii::app()->user->isGuest):?>
					<td><? if ($position->price>0) echo number_format(100-round($position["price_dealer"]/$position["price"]*100), 0, ',', ' ').'%'; else echo "0%";?></td>
				<?endif;*/?>
                <td><?=$position->quantity;?></td>
				<?/*if(!Yii::app()->user->isGuest):?>
                <td><?=number_format($position->price_dealer*$position->quantity, 0, ","," ");?>  руб.</td>
				<?else:*/?>
				<td><?=number_format($position->price*$position->quantity, 0, ","," ");?>  руб.</td>
				<?//endif;?>
            </tr>
        <?endforeach?>
    </table>
    <p><font size="3"><b>Итого:</b> <?php echo $order->sum; ?> руб.</font></p>
    <br/>
    <p><b>Информация о заказе:</b></p>
    <p><b>Номер заказа:</b> <?php echo $order->id; ?></p>
    <p><b>Дата:</b> <?php echo date('d.m.Y', $order->date); ?></p>
    <p><b>Комментарии к заказу:</b> <?php echo $order->comments; ?></p>
    <br/>
    <p><b>Ваши данные:</b></p>
    <?if(is_object($order->customerdata)):?>
    <p><b>Имя:</b> <?=$order->customerdata->name;?></p>
    <p><b>Телефон:</b> <?=$order->customerdata->phone;?></p>
    <p><b>E-mail:</b> <?=$order->customerdata->email;?></p>
    <p><b>Адрес:</b> <?=$order->customerdata->adress;?></p>
        <?else:?>
            <p>Нет информации</p>
        <?endif?>
</body>
</html>
