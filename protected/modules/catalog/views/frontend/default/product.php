<?php

Yii::app()->clientScript->registerScript(
    'myHideEffect',
    '$(".flash-success").animate({opacity: 1.0}, 2000).fadeOut("slow");',
    CClientScript::POS_READY
);
?>
<div id="item-popup" class="popup">
    <?php if ($model->image): ?>
        <?php echo CHtml::link(CHtml::image('/upload/catalog/product/medium/' . $model->image, $model->title), array('/upload/catalog/product/' . $model->image), array('class' => 'fancybox')); ?>
        <?php else: ?>
        <?php echo CHtml::link(CHtml::image('/images/nophoto.jpg', $model->title), array('/images/nophoto.jpg'), array('class'=>'fancybox')); ?>
    <?php endif ?>
    <div class="right-column-popup">
        <h3 class="title"> <?php echo $model->title; ?></h3>


        <div class="description">
            <?php echo $model->description; ?>
        </div>
        <?php if ($productAttributes = $model->getAttributesWithValues()): ?>
            <div class="properties">
                <?php
                foreach ($productAttributes as $attributeId => $productAttribute) {
                    if (is_array($productAttribute['value'])) {
                        $params[$attributeId] = key($productAttribute['value']);
                        echo CHtml::tag('p', array(), CHtml::tag('b', array(), "Выберите " . mb_strtolower($productAttribute['title'], "UTF-8") . ":") . " ");
                        echo CHtml::openTag('ul', array('class' => 'choice', 'data-id' => $attributeId));
                        foreach ($productAttribute['value'] as $id => $label)
                            echo CHtml::tag('li', array('class' => ($id == $params[$attributeId] ? 'selected' : '')), CHtml::link($label, '#', array('data-id' => $id)));
                        echo CHtml::closeTag('ul');
                    } else
                        echo CHtml::tag('p', array(), CHtml::tag('b', array(), $productAttribute['title'] . ":") . " " . mb_strtolower($productAttribute['value'], "UTF-8"));
                }
                ?>
            </div>
        <?php endif; ?>

        <p class="product-link"><a href="<?php echo $model->fullLinkFast?>" target="_blank">Cтраница товара</a></p>

        <div class="actions">
            <div class="popup-price popup-ribbon-orange">
                <div class="value"><?php echo $model->price; ?></div>
                <i class="icon-rouble"></i>
            </div>
            <div class="scale-panel">
                <a class="circle-base decrease-action" href="#">-</a>
                <div class="quantity">1</div>
                <a class="circle-base increase-action" href="#">+</a>
            </div>
            <a class="product-to-cart" href="/order/cart/add?id=<?php echo $model->id; ?>">
                <div class="circle-base circle-baskets"></div>
            </a>
        </div>
    </div>
</div>

