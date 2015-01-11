<h1>Заказ принят</h1>
<div style="font-size:16px;line-height:22px;"><b>Ваш заказ принят к исполнению</b></div>
<div>В ближайшее время с Вами свяжется наш консультант для уточнения всех деталей заказа.</div>
<br/>
<div style="font-size:15px;line-height:22px;">Номер заказа: <?=$order->id;?></div>
<br/>
<table border="1" cellspacing="0" cellpadding="5">
	<tr>
		<td>№</td>
        <td>Артикул</td>
		<td>Наименование</td>
		<td>Кол-во</td>
		<td>Цена</td>
        <td>Сумма</td>
    </tr>
	<?$num=1;foreach($order->positions as $position):?>
		<tr>
		<td><?=$num;$num++;?></td>
		<td><?=$position->article;?></td>
		<td><?=$position->title;?></td>
		<td><?=$position->quantity;?>шт.</td>
		<?if(!Yii::app()->user->isGuest):?>
		<td><?=number_format($position->price_dealer, 0, ","," ");?> р.</td>
		<td><?=number_format($position->price_dealer*$position->quantity, 0, ","," ");?>  р.</td>
		<?else:?>
		<td><?=number_format($position->price, 0, ","," ");?> р.</td>
		<td><?=number_format($position->price*$position->quantity, 0, ","," ");?>  р.</td>
		<?endif;?>
		</tr>
	<?endforeach?>
</table>
<div class="clear"></div>
<br/>
<div  style="font-size:15px;line-height:22px;">Итого: <?=$sum;?> р. </div>
<br/>
	<div style="font-size:11px;">
	<?=$customer->name;?><br/>
	Телефон: <?=$customer->phone;?><br/>
	E-mail: <?=$customer->email;?><br/>
	Комментарий:<?=$order->comments;?><br/> 
	</div>
<br/>
<a class="back" href="/" style="color:#229DDC;">&#9668; <span style="font-size:15px;">Вернуться на главную</span></a>