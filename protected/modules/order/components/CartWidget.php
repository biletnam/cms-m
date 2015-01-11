<?php

Yii::import('zii.widgets.CPortlet');
Yii::import('application.modules.order.models.OrderCart');
Yii::import('application.modules.order.models.Cart');
/*
Класс виджета для вывода корзины заказов
*/
class CartWidget extends CPortlet
{
	public function init()
    {
        parent::init();

        Yii::app()->clientScript->registerScript('cart-widget', "

            var magnificPopup = $.magnificPopup.instance;

            /* Добавление товара в корзину */
            $(document).on('click', 'a.product-to-cart', function(){
                magnificPopup.close();
                var url = $(this).prop('href');
                var quantity = $(this).closest('.actions').find('.quantity').text();
                if (quantity)
                    url += '&quantity=' + quantity;

                $.ajax({
                    url: url,
                    type: 'POST',
                    success: function(data){
                        magnificPopup.open({
                            items: {
                              src: data
                            },
                            type: 'inline' // this is default type
                        });
                        updateCartWidget();
                    }
                });

                return false;
            });

            $(document).on('click', 'a.open-cart', function(){
                var url = $(this).prop('href');

                $.ajax({
                    url: url,
                    type: 'POST',
                    success: function(data){
                        magnificPopup.open({
                            items: {
                              src: data
                            },
                            type: 'inline' // this is default type
                        });
                    }
                });

                return false;
            });

            /* Увеличение числа единиц товара в корзине  */
            $(document).on('click', '.products-in-cart .scale-panel a.increase-action', function(){
                var plusUrl = $(this).parent('span').attr('id');
                $.ajax({
                    url: '/order/cart/plus/id/'+plusUrl,
                    success: function(data){
                    if($('div').is('.mfp-ready')) {
                         magnificPopup.open({
                            items: {
                              src: data
                            },
                            type: 'inline' // this is default type
                        });
                    } else {
                        updateShoppingCart();
                    }
                        updateCartWidget();
                    }
                });
                return false;

            });
            /* Уменьшение числа единиц товара в корзине  */
            $(document).on('click', '.products-in-cart .scale-panel a.decrease-action', function(){
                var minusUrl = $(this).parent('span').attr('id');
                $.ajax({
                    url: '/order/cart/minus/id/'+minusUrl,
                    success: function(data){
                    if($('div').is('.mfp-ready')) {
                         magnificPopup.open({
                            items: {
                              src: data
                            },
                            type: 'inline' // this is default type
                        });
                    } else {
                        updateShoppingCart();
                    }
                        updateCartWidget();
                    }
                });
                return false;

            });

            /* Удаление товара из корзины  */
            $(document).on('click', '.products-in-cart .delete-action', function(){
                var deleteUrl = $(this).attr('id');
                $.ajax({
                    url: '/order/cart/delete/id/'+deleteUrl,
                    success: function(data){
                    if($('div').is('.mfp-ready')) {
                         magnificPopup.open({
                            items: {
                              src: data
                            },
                            type: 'inline' // this is default type
                        });
                    } else {
                        updateShoppingCart();
                    }
                        updateCartWidget();
                    }
                });
                return false;
            });

            updateCartWidget = function(){
                $.ajax({
                    url: '/order/cart/upcartWidget',
                    success: function(data){
                        $('.menu-total-quantity').html(data);
                    }
                });
                return false;
            };

            updateShoppingCart = function(){
                $.ajax({
                    url: '/order/cart/upShoppingCart',
                    success: function(data){
                        $('.shopping-cart-popup').replaceWith(data);
                    }
                });
                return false;
            };

        ", CClientScript::POS_READY);
    }

	public function	run()
    {
        // Берем общее количество и сумму
        $cart = new Cart();
        $cartProducts = $cart->getProductCount();
        if(empty($cartProducts))
            $cartProducts = 0;
        $total = $cart->getTotal();
		$this->render('cartwidget',array('quantity'=>$cartProducts, 'sum'=>$total));

        parent::run();
	}

}
?>
