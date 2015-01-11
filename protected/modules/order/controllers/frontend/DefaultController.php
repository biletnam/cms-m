<?php

class DefaultController extends FrontEndController
{
	public function actionIndex()
	{
        $this->breadcrumbs[]='Корзина';

        // Устанавливаем признак что заказ еще не оформлен
        $success=false;

        $cart=new Cart;

        // Готовим модель покупателей
        $customer=new OrderCustomers;
        // Готовим модель заказов
        $order=new Orders;

        $cartProducts = $cart->getCartProducts();	// Готовим данные для вывода
        $sum = $cart->getTotal();	// Получаем сумму

        // Проверяем наличие товаров в корзине, если что-то есть - оформляем заказ
        if((isset($_POST['Orders']))&&($cartProducts))
        {
            // Получаем данные из формы
            $order->attributes=$_POST['Orders'];
            $customer->attributes=$_POST['OrderCustomers'];

            $order->sum=$sum;

            // Валидация моделей
            if($customer->validate() && $order->validate()){
                if($customer->save()){

                    // Записываем недостающие данные
                    $order->customer=$customer->id;
                    $order->status=0;

                    // Выбираем позиции корзины и записываем их в заказ

                    $positions=array();

                    foreach($cartProducts as $product){
                        // Загружаем товар
                        $pro=CatalogProduct::model()->findByPk($product['product_id']);
                        $position=new OrderPositions();
                        $position->title=$product['title'];
                        $position->price=$product['price'];
                        $position->article = $pro->article;
                        $position->quantity=$product['quantity'];
                        $position->product_id=$product['product_id'];
                        $position->fullLink=$product['fullLink'];
                        $positions[]=$position;
                    }
                    $order->positions=$positions;
                    if($order->save()) {
                        // отправляем уведомления
                        $this->sendNotices($order);

                        $cart->clear();

                        $cartProducts = $cart->getCartProducts();	// Готовим данные для вывода
                        $sum = $cart->getTotal();	// Получаем сумму
                        // Устанавливаем признак что заказ оформлен
                        $success=true;

//                        $this->redirect(array('index'));
                    }
                }
            }
        }
        // Готовим данные для вывода в Grid
        $dataProvider = new CArrayDataProvider($cartProducts);

        if ($success) {
            Yii::app()->user->setFlash('success', "Вы сделали заказ! <br>Наши менеджеры свяжутся с Вами.");
            $this->redirect('/');

            // Выводим сообщение об удачной отправке заказа
        }

		$this->render('index', array(
            'customer' => $customer,
            'order'=>$order,
            'dataProvider'=>$dataProvider,
            'sum'=>$sum,
        ));
	}

    public function actionCreate()
    {

        /*Yii::import('application.modules.user.models.User');
        $this->breadcrumbs[]='Оформление заказа';
        // Устанавливаем признак что заказ еще не оформлен
        $success=false;

        $orderCart=new OrderCart();
        // Проверяем наличие товаров в корзине, если что-то есть - оформляем заказ
        if($orderCart->getCartPositionsCount()){


            // Готовим модель покупателей
            $customer=new OrderCustomers;

            // Если пользователь авторизован - заполняем форму данными из профиля
            if(!Yii::app()->user->isGuest){
                $user=User::model()->active()->findbyPk(Yii::app()->user->id);
                $customer->attributes=$user->profile->attributes;
                $customer->email=$user->email;
            }

            // Готовим модель заказов
            $order=new Orders;

            // Загружаем корзину
            $cart=$orderCart->loadCart();

            // Получаем сумму
            $sum=$orderCart->getCartSumFormat(0);

            // uncomment the following code to enable ajax-based validation
           /

            if(isset($_POST['Orders']))
            {
                // Получаем данные из формы
                $order->attributes=$_POST['Orders'];
                $customer->attributes=$_POST['OrderCustomers'];

                // Валидация моделей
                if($customer->validate() && $order->validate()){
                    if($customer->save()){

                        // Записываем недостающие данные
                        $order->customer=$customer->id;
                        $order->sum=$orderCart->getCartSum();
						$order->status=0;

                        // Выбираем позиции корзины и записываем их в заказ

                        $positions=array();
                        foreach($cart as $pos){
                            // Загружаем товар
                            $product=CatalogProduct::model()->findByPk($pos['product_id']);
                            $position=new OrderPositions();
                            $position->title=$pos['product_title'];
                            $position->fullLink=$pos['product_fullLink'];
                            //$position->article=$product->article;
                            $position->price=$pos['price'];
                            //$position->price_dealer=$pos['price_dealer'];
                            $position->quantity=$pos['quantity'];
                            $position->product_id=$product->id;
                            $position->attributes=serialize($product->productAttrubute);
                            //$position->complectation=serialize($pos['compl']);

                            $positions[]=$position;

                        }
                        $order->positions=$positions;
                        if($order->save()) {

                            // отправляем уведомления
                            $this->sendNotices($order);

                            // Убиваем корзину
                            unset(Yii::app()->request->cookies['cart']);

                            // Устанавливаем признак что заказ оформлен
                            $success=true;

                            //$this->redirect(array('index'));
                        }
                    }
                }
            }
            if($success){
                // Выводим сообщение об удачной отправке заказа
                $this->render('ordersuccess',array(
                    'customer'=>$customer,
                    'order'=>$order,
                    'sum'=>$sum,
                ));
            }else{
                // Выводим форму заказа
                 $this->render('createorder',array(
                    'customer'=>$customer,
                    'order'=>$order,
                    'cart'=>$cart,
                    'sum'=>$sum,
                ));
            }


        } else{
            // Если корзина оказалась пустой - отправляем обратно в корзину
            $this->redirect(array('/order/cart'));
        }*/
    }
    public function actionOneclick($product_id)
    {
        $success=false;

        $model = new OneclickForm;
        if (isset($_POST['OneclickForm'])) {
            $model->attributes = $_POST['OneclickForm'];
            if ($model->validate()) {

                $compl=array();
                $product=CatalogProduct::model()->findByPk($product_id);
                // Берем варианты комплектации
                foreach($product->complectations as $complectation){
                    $value_title='';
                    if(isset($_POST[$complectation->name])){
                        // Если значение существует и ненулевое
                        if($_POST[$complectation->name]){
                            // Если тип список - получаем значение
                            if($complectation->type==2){
                                $complectation_value_id=$_POST[$complectation->name];
                                if($complectation_value=CatalogComplectationValues::model()->findByPk($complectation_value_id)){
                                    $value_title=' '.$complectation_value->value;
                                }

                            }
                            $compl[]=$complectation->title.$value_title;
                        }
                    }
                }

                // Берем цену, если  присутствует result_price
                if(isset($_POST['result_price'])){
                    $price=$_POST['result_price'];
                }else{
                    // Если отсутствует - берем изначальную цену товара
                    $price=$product->price;
                }

                $position=new OrderPositions();
                $position->title=$product->title;
                $position->fullLink=$product->fullLink;
                $position->article=$product->article;
                $position->price=$price;
                $position->quantity=1;
                $position->product_id=$product->id;
                $position->attributes=serialize($product->productAttrubute);
                $position->complectation=serialize($compl);

                $positions[]=$position;

                // Готовим модель покупателей
                $customer=new OrderCustomers;

                $customer->phone=$model->phone;

                if($model->name<>'') {$customer->name=$model->name;} else{$customer->name='Неизвестно';}
                $customer->email='unknown@unknown.no';
                $customer->adress='Неизвестен';


                // Сохраняем покупателя
                if(!$customer->save()){print var_dump($customer->getErrors());}

                // Готовим модель заказов
                $order=new Orders;
                $order->customer=$customer->id;
                $order->positions=$positions;
                $order->delivery='0';
                $order->comments=$model->text;

                $order->sum=$price;

                if(!$order->save()){print var_dump($order->getErrors());}

                print 'Ваш заказ принят! Наши специалисты свяжутся с Вами!';

                // отправляем уведомления
                $this->sendNotices($order);

                $success=true;
            }
        }

        if(!$success) $this->renderPartial('application.modules.order.components.views.oneclick_form', array('model' => $model));

    }

    // Отправка уведомлений пользователю и менеджеру
    private function sendNotices($order)
    {
        $order_config = OrderConfig::model()->findAll();
		// Уведомление менеджеру
		foreach ($order_config as $manager)
        {
			$view = $this->renderPartial('manager_notice_template', array_merge(array('order' => $order)), true);
            Yii::app()->getModule('callback')->sendMessage($manager->notice_email, 'Заказ №'.$order->id.' на сайте '.CHtml::encode(Yii::app()->config->sitename), $view);
		}
        // Уведомление пользователю (если есть куда отправлять)
        if($order->customerdata->email<>'unknown@unknown.no')
        {
            $view = $this->renderPartial('customer_notice_template', array_merge(array('order' => $order)), true);
            Yii::app()->getModule('callback')->sendMessage($order->customerdata->email, 'Вы сделали заказ на сайте '.CHtml::encode(Yii::app()->config->sitename), $view);
        }
    }
}
?>