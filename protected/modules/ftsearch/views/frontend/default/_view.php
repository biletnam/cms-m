<?php Yii::app()->clientScript->registerScript('myHideEffect','
    $(".flash-success").animate({opacity: 1.0}, 2000).fadeOut("slow");
   '
	, CClientScript::POS_READY)
?>
<?php if(Yii::app()->user->hasFlash('success')):?>
	<div class="flash-success">
		<?php  echo Yii::app()->user->getFlash('success');?>
	</div>
<?php endif; ?>
<? $fullLink=$data->fullLinkFast; ?>
	<div class="product">
		<div class="item">
			<div class="goods-wrapper">
				<? if ($data->image != '') {
					echo CHtml::link(CHtml::image('/upload/catalog/product/small/' . $data->image, $data->title), $data->fullLinkFast, array('class' => 'open-shopping-cart-link'));
				} else {
					echo CHtml::link(CHtml::image('/images/nophoto.jpg', $data->title), $data->fullLinkFast, array('class' => 'open-shopping-cart-link'));
				}
				?>
				<div class="title">
					<?php echo CHtml::link($data->title, Yii::app()->getBaseurl(true).$data->fullLinkFast, array('class'=>'open-shopping-cart-link'));?>
				</div>
				<!--<div class="rating">
                    <input type="hidden" class="rating" data-filled="symbol symbol-filled" data-empty="symbol symbol-empty" />
                </div>-->
				<div class="price ribbon-brown">
					<div class="value"><?php echo $data->price; ?>
					</div>
					<i class="social-icon icon-rouble"></i>
				</div>
				<div class="actions">
					<div class="scale-panel">
						<a class="circle-base increase-action">
							+
						</a>
						<div class="quantity">1</div>
						<a class="circle-base decrease-action">
							-
						</a>
					</div>
					<a class="product-to-cart" href="/order/cart/add?id=<?php echo $data->id; ?>">
						<div class="circle-base circle-baskets" id="<?php echo $data->id; ?>"></div>
					</a>
				</div>
			</div>
		</div>
	</div>

<!--<div class="res">
	<?/* echo CHtml::link($data['title'], $data['link']);*/?>
	<p style="padding-top:10px;">
		<?/*=$data['description'];*/?>
	</p>
</div>-->
<?/*?>
<div class="block">
	<div class="image">
    <?$cover=$data->getCover();
		if ($cover)
		{
			if ($cover->image != '') {
				echo CHtml::link(CHtml::image('/upload/catalog/product/moreimages/medium/' . $cover->image,""),  '/'.$data->producer->link.'/catalog/'.$data->link);//$this->createUrl('product', array('id' => $data->id)));
			} else {
				echo CHtml::link(CHtml::image('/images/nophoto.jpg', ""), '/'.$data->producer->link.'/catalog/'.$data->link); //
			}
		}
		else echo CHtml::link(CHtml::image('/images/nophoto.jpg', ""), '/'.$data->producer->link.'/catalog/'.$data->link); //

    ?>
	</div>
	<div class="title"><? echo CHtml::link($data->title, '/'.$data->producer->link.'/catalog/'.$data->link);?></div>
	<?if ($data->producer):?>
	<div class="produce">Производитель:<br><? echo CHtml::link($data->producer->title,'/'.$data->producer->link);?></div>
	<?endif;?>
</div><?*/?>