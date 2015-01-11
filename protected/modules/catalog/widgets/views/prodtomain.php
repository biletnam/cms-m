<div class="popular-goods">
        <div class="list-title">Популярные товары</div>
        <div class="goods-list">
        <?foreach($products as $product):?>
            <div class="item">
                <div class="goods-wrapper">
                    <? if ($product->image != '') {
                        echo CHtml::link(CHtml::image('/upload/catalog/product/small/' . $product->image, $product->title), $product->fullLinkFast, array('class'=>'open-shopping-cart-link'));
                    } else {
                        echo CHtml::link(CHtml::image('/images/nophoto.jpg', $product->title), $product->fullLinkFast, array('class'=>'open-shopping-cart-link'));
                    }
                    ?>
                <div class="title">
                    <?php echo CHtml::link($product->title, Yii::app()->getBaseurl(true).$product->fullLinkFast, array('class' => 'open-shopping-cart-link'));?>
                </div>
                <div class="price ribbon-brown">
                    <div class="value"><?php echo $product->price; ?>
                    </div>
                    <i class="social-icon icon-rouble"></i>
                </div>
                    <div class="actions">
                        <div class="scale-panel">
                            <a class="circle-base decrease-action" >
                                -
                            </a>
                            <div class="quantity">1</div>
                            <a class="circle-base increase-action" >
                                +
                            </a>
                        </div>
                        <a class="product-to-cart" href="/order/cart/add?id=<?php echo $product->id; ?>">
                            <div class="circle-base circle-baskets" id="<?php echo $product->id; ?>"></div>
                        </a>
                    </div>
                </div>
            </div>
        <?endforeach?>
        </div>
    </div>