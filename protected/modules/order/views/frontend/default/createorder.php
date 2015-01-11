<div class="cart">
				<h1>Оформление заказа</h1>
				<div class="tbl100">
					<table class="colored" width="100%" cellspacing="0">
						<tr>
							<th style="padding-left:5px;"><div>№</div></th>
							<th><div>Артикул</div></th>
							<th><div>Наименование товара</div></th>
							<?if(!Yii::app()->user->isGuest):?>
							<th class="opt"><div>Опт</div></th>
							<?endif;?>
							<th class="s"><div>Розница</div></th>
							<?if(!Yii::app()->user->isGuest):?>
							<th class="s"><div>Скидка</div></th>
							<?endif;?>
							<th class="c"><div>Кол-во</div></th>
							<th class="s"><div>Сумма</div></th>
						</tr>
                        <?$num=1;foreach($cart as $id=>$position):?> 
						<tr>
							<td style="padding-left:5px;"><?=$num;$num++;?></td>
							<td><?=$position['article'];?></td>
							<td><?=$position['product_title'];?></td>
							<?if(!Yii::app()->user->isGuest):?>
							<td class="opt"><?=number_format($position['price_dealer'], 0, ',', ' ').'р.';?></td>
							<?endif;?>
							<td class="s"><?=number_format($position['price'], 0, ',', ' ').'р.';?></td>
							<?if(!Yii::app()->user->isGuest):?>
							<td class="s"><? if ($position["price"]>0) echo number_format(100-round($position["price_dealer"]/$position["price"]*100), 0, ',', ' ').'%'; else echo "0%";?></td>
							<td align="center"><?=$position['quantity'];?></td>
							<td class="s"><?=number_format($position['quantity']*$position['price_dealer'], 0, ',', ' ').' р.';?></td>
							<?else:?>
							<td align="center"><?=$position['quantity'];?></td>
							<td class="s"><?=number_format($position['quantity']*$position['price'], 0, ',', ' ').' р.';?></td>
							<?endif;?>
						</tr>
                        <?endforeach?>
					</table>
				</div>
                <div class="summa" id="cartsum">
                    Итого: <?=$sum;?> р.
                </div>
		<br/>
        <div class="form">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'order-customers-customer-form',
            'enableAjaxValidation'=>false,
        )); ?>
			<ul>
				<li>
					<p class="centertext">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</p>
					<?php echo $form->errorSummary(array($customer,$order)); ?>
				</li>
				<li>
					<p class="lefttext"><?php echo $form->labelEx($customer, 'name'); ?></p>
					<?php echo $form->textField($customer, 'name', array('class'=>'righttext', 'size'=>'45')); ?>
				</li>
				<li>
					<p class="lefttext"><?php echo $form->labelEx($customer, 'email'); ?></p>
					<?php echo $form->textField($customer, 'email', array('class'=>'righttext', 'size'=>'45')); ?>
				</li>
				<li>
					<p class="lefttext"><?php echo $form->labelEx($customer, 'phone'); ?></p>
					<?php echo $form->textField($customer, 'phone', array('class'=>'righttext', 'size'=>'45')); ?>
				</li>
				<li>
					<p class="lefttext"><?php echo $form->labelEx($customer, 'adress'); ?></p>
					<?php echo $form->textField($customer, 'adress', array('class'=>'righttext', 'size'=>'45')); ?>
				</li>
				<li>
					<p class="lefttext"><?php echo $form->labelEx($order, 'payment'); ?></p>
					<?php echo $form->dropDownList($order,'payment', $order->getPayment(),array('class'=>'righttext','style'=>'height:22px;width:430px;')); ?>
				</li>
				<li>
					<p class="lefttext"><?php echo $form->labelEx($order, 'delivery'); ?></p>
					<?php echo $form->dropDownList($order,'delivery', OrderDelivery::dropListArray(),array('class'=>'righttext','style'=>'height:22px;width:430px;')); ?>
				</li>
				<li>
					<p class="lefttext"><?php echo $form->labelEx($order, 'comments'); ?></p>
					<?php echo $form->textArea($order, 'comments', array('class'=>'rightarea', 'rows' => 8, 'cols' => 45)); ?>
				</li>
				
				<li>
					<p class="lefttext">&nbsp;</p>
					<div class="button">
						<?php echo CHtml::submitButton('Отправить', array('class'=>'send')); ?>
					</div>
				</li>
			</ul>   
            
        <?php $this->endWidget(); ?>

        </div><!-- form -->
		<div class="clear"></div>
	<a class="back" href="/order/cart">&#9668; <span>Редактировать заказ</span></a> 

</div>