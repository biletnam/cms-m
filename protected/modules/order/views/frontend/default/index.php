<div id="shopping-cart" class="shopping-cart-popup">
    <div class="products-in-cart">
        <div class="flash-container">
            <?php foreach(Yii::app()->user->getFlashes() as $key => $message) echo '<div class="flash-' . $key . '">' . $message . "</div>\n"; ?>
        </div>
        <form action="" method="post">
            <h3>Корзина</h3>
            <?php if ($products = $dataProvider->getData()): ?>
                <table>
                    <?php foreach($products as $product): ?>
                        <tr class="icecream">
                            <td>
                                <?php
                                if ($product['image'])
                                    echo CHtml::image('/upload/catalog/product/small/' . $product['image'], $product['title'], array('width' => '43'));
                                else
                                    echo CHtml::image('/images/nophoto.jpg', $product['title']);
                                ?>
                            </td>
                            <td><span class="title"><?php echo $product['title']; ?></span></td>
                            <td>
                        <span class="actions">
                        <span class="scale-panel" id="<?php echo $product['id']; ?>">
                            <a class="decrease-action">-</a>
                            <span class="quantity"><?php echo $product['quantity']; ?></span>
                            <a class="increase-action">+</a>
                        </span>
                        </span>
                            </td>
                            <td><span class="icecream-price"><?php echo $product['price']; ?></span></td>
                            <td><span class="delete-action" id="<?php echo $product['id']; ?>">×</span></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <div class="pre-total-price">Итого: <span><?php echo(number_format($sum, 0, ","," ")); ?></span>р.</div>

                <div class="delivery">
                    <h3>Условия доставки</h3>

                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'order-customers-customer-form',
                        'enableAjaxValidation'=>false,
                    )); ?>
                    <div><?php echo $form->errorSummary(array($customer,$order)); ?></div>
                    <?php echo $form->textField($customer, 'name', array('title' => 'Имя', 'placeholder' => 'Имя')); ?>
                    <?php echo $form->textField($customer, 'adress', array('title' => 'Адрес доставки', 'placeholder' => 'Адрес доставки')); ?>
                    <?php echo $form->textField($customer, 'email', array('title' => 'E-mail', 'placeholder' => 'E-mail')); ?>
                    <?php echo $form->textField($customer, 'phone', array('title' => 'Контактный телефон', 'placeholder' => 'Контактный телефон')); ?>

                    <div class="dropdowns">
                        <?php echo $form->label($order, 'delivery'); ?>
                        <div class="dropdown">
                            <?php echo $form->dropDownList($order,'delivery', OrderDelivery::dropListArray(),array('class' => 'dropdown-select')); ?>
                        </div>
                        <?php echo $form->label($order, 'payment'); ?>
                        <div class="dropdown">
                            <?php echo $form->dropDownList($order,'payment', $order->getPayment(),array('class' => 'dropdown-select')); ?>
                        </div>
                    </div>

                    <div class="comments">
                        <?php echo $form->textArea($order, 'comments', array('title' => 'Комментарий', 'placeholder' => 'Комментарий')); ?>
                    </div>

                    <div class="total-price">Итого к оплате: <span><?php echo(number_format($sum, 0, ","," ")); ?></span>р.</div>


                    <div class="order-button">
                        <button class="do-order" type="submit">Оформить заказ</button>
                    </div>

                    <?php $this->endWidget(); ?>

                </div>
            <?php else: ?>
                <p><center>Корзина пуста!</center></p>
            <?php endif; ?>
        </form>
    </div>
</div>