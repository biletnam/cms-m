<?php
$cs=Yii::app()->clientScript;
$cs->registerScript('myHideEffect','
    $(".flash-success").animate({opacity: 1.0}, 2000).fadeOut("slow");
   '
    , CClientScript::POS_READY);


?>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="flash-success">
        <?php  echo Yii::app()->user->getFlash('success');?>
    </div>
<?php endif;
if(isset($data->price)):/*Если есть цена, то это продукт*/
$fullLink=$data->fullLinkFast; ?>
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
            <div class="price ribbon-brown">
                <div class="value"><?php echo $data->price; ?>
                </div>
                <i class="social-icon icon-rouble"></i>
            </div>
            <div class="actions">
                <div class="scale-panel">
                    <a class="circle-base decrease-action">
                        -
                    </a>
                    <div class="quantity">1</div>
                    <a class="circle-base increase-action">
                        +
                    </a>
                </div>
                <a class="product-to-cart" href="/order/cart/add?id=<?php echo $data->id; ?>">
                    <div class="circle-base circle-baskets" id="<?php echo $data->id; ?>"></div>
                </a>
            </div>
        </div>
    </div>
</div>
<?php else: /*иначе, это каталог*/?>
    <div class="category">
        <div class="info">
            <div class="image">
                <?php
                if ($data->image != '') {
                    echo CHtml::link(CHtml::image('/upload/catalog/category/small/' . $data->image, $data->title), $this->createUrl('index', array('link'=>$data->link)));
                } else {
                    echo CHtml::link(CHtml::image('/images/nophoto.jpg', $data->title), $this->createUrl('index', array('link'=>$data->link)));
                }
                ?>
            </div>
            <div class="catname">
                <h2><?php echo CHtml::link($data->title, $this->createUrl('index', array('link'=>$data->link))); ?></h2>
            </div>
        </div>
    </div>
<?php endif; ?>