<?php if ($products = $dataProvider->getData()): ?>
    <div id="shopping-cart" class="shopping-cart-popup">
        <div class="products-in-cart">
                <form action="" method="post">
                    <h3>Корзина</h3>
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

                    <a href="/order/">
                        <div class="order-button">
                            <button id="button-hide" class="pre-do-order" type="button">Оформить</button>
                        </div>
                    </a>
                </form>
        </div>
    </div>
<?php else: ?>
    <div class="empty_basket">
        <h1>Корзина</h1>
        <p class="empty_basket_img"><img src="/images/empty_basket.png" alt="empty_basket"/></p>
        <p class="empty_basket">Корзина пуста</p>
    </div>
<?php endif; ?>
