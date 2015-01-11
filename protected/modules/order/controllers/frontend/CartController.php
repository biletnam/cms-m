<?php

//Контроллер корзины товаров


class CartController extends FrontEndController
{
	public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                //'foreColor' => 0x222222,
                'testLimit' => '1',
            ),

        );
    }

	/**
	 * Добавление товара в корзину
	 *
	 */

	public function actionAdd($id, $quantity = 1)
	{
		if ($product_price = Yii::app()->db->createCommand("SELECT `price` FROM `catalog_product` WHERE `id`='".$id."'")->queryScalar())	// Если существует такой товар
		{
            $message = null;
			$cart = new Cart;
			$cart->product_id = $id;
			$cart->price = $product_price;
			$cart->quantity = $quantity;
			if ($cart->validate())	// Проверяем корректность данных
			{
				if(!$cart_quantity = $cart->inCart($id))	// Нет ли в корзине?
				{
					if ($cart->add())
                        $message = "Товар добавлен в корзину.";
					else
                        $message = "Не удалось добавить товар в корзину.";
				}
				else 
				{

					$cart->quantity += $cart_quantity;	// Добавляем количества товара в корзине
					if ($cart->update())
                        $message = "Товар добавлен в корзину.";
					else
                        $message = "Не удалось изменить количество товара в корзине.";
				}
			}
			else
                $message = "Некорректные данные товара.";

            $result = "
                <div id=\"success-message\" class=\"success-popup\">
                    <div class=\"thanks\">
                        <p>" . $message . "</p>
                    </div>
                    <button title=\"Close (Esc)\" type=\"button\" class=\"mfp-close\">×</button>
                </div>
                ";

			if(!Yii::app()->request->isAjaxRequest)
                $this->redirect(Yii::app()->request->urlReferrer);
			else 
				exit($result);
        }
		else
			throw new CHttpException(400, "Попытка добавить в корзину неизвестный товар.");
	}
	
	
    // Увеличение количества на 1
    public function actionPlus($id){

		$cart = new Cart;
		if($product = $cart->getCartProduct($id))	// Нет ли в корзине?
		{
			$cart->product_id = $id;
			$cart->quantity = $product['quantity']+1;
			$cart->update();
		}
        if(!Yii::app()->request->isAjaxRequest)
		    $this->redirect(Yii::app()->request->urlReferrer);
        else
        {
            $this->redirect(array('/order/cart/index'));
        }

    }
    // Уменьшение количества на 1
    public function actionMinus($id){

		$cart = new Cart;
		if($product = $cart->getCartProduct($id))	// Нет ли в корзине?
		{
			$cart->product_id = $id;
			$cart->quantity = $product['quantity']-1;
			if ($cart->quantity > 0)
				$cart->update();
			else $cart->delete();
		}
        if(!Yii::app()->request->isAjaxRequest)
            $this->redirect(Yii::app()->request->urlReferrer);
        else
        {
            $this->redirect(array('/order/cart/index'));
        }
    }
	/**
	 * Удаление записи из корзины
	 */
	public function actionDelete($id)
	{
        $cart = new Cart;
        $cart->product_id = $id;
        $cart->delete();
        if(!Yii::app()->request->isAjaxRequest)
            $this->redirect(Yii::app()->request->urlReferrer);
        else
        {
            $this->redirect(array('/order/cart/index'));
        }
	}

	/**
	 * Просмотр корзины
	 */
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
       
		// Готовим данные для вывода в Grid
		$dataProvider = new CArrayDataProvider($cartProducts);


        if(Yii::app()->request->isAjaxRequest)
        {
            // Выводим форму заказа
            $this->renderPartial('index',array(
                'customer'=>$customer,
                'order'=>$order,
                'dataProvider'=>$dataProvider,
                'sum'=>$sum
            ));
        }
        else
        {
            // Выводим форму заказа
            $this->render('index',array(
                'customer'=>$customer,
                'order'=>$order,
                'dataProvider'=>$dataProvider,
                'sum'=>$sum,
            ));
        }
	}

	
    // Обновляет общую сумму при обновлении грида
    public function actionUpdatesum(){
		
		$cart = new Cart;
        $sum = $cart->getTotal();
		$count = $cart->getProductCount();
		
        $this->renderPartial('viewsum',array(
            'sum'=>$sum,
            'count'=>$count,
        ));
    }

    // Обновляет виджет корзины при обновлении грида
    public function actionUpcartwidget(){
        $this->widget('CartWidget');
    }
    //Увеличение числа товаров при оформлении заказа
    public function actionUpShoppingCart() {
        $this->redirect('index');
    }
    //Уменьшение числа товаров при оформлении заказа
    public function actionDownShoppingCart() {
        $this->redirect('index');

    }

    // Заменяет Значение количества в корзине на введенное
    public function actionQuantitychange(){
	
		// Берем параметры для отбора из get-запроса
        $quantity=array();
        if(isset($_POST['quantity'])){
           $quantity=$_POST['quantity']; 
        }

		foreach ($quantity as $id=>$new_quantity)
		{
			$cart = new Cart;
			$cart->product_id = $id;
			
			if ($new_quantity < 1)  $cart->delete();
			else
			{
				$cart->quantity = $new_quantity;
				$cart->update();
			}
		}
		
		
		$this->redirect(Yii::app()->request->urlReferrer); 
        
		
		//$new_quantity=$_POST['value'];
       // $id=$_POST['id'];
      // if($new_quantity>0){
       //     $orderCart=new OrderCart();
       //     $orderCart->quantitySet($id, $new_quantity);
      //  }
    }
    // Заменяет Значение количества в корзине на введенное
    public function actionClearcart(){
  
        $cart = new Cart;
		$cart->clear();
		
    }
	
	// Отправка уведомлений пользователю и менеджеру
    private function sendNotices($order){
		$order_config=OrderConfig::model()->findAll();
		// Уведомление менеджеру
		
		foreach ($order_config as $manager) {
			$view = $this->renderPartial('/default/manager_notice_template', array_merge(array('order' => $order)), true);
			$mailer = Yii::app()->mailer;
			$message = new YiiMailMessage();
			$message->setSubject('Заказ №'.$order->id.' на сайте '.CHtml::encode(Yii::app()->name))->setFrom($mailer->emailFrom)->setTo($manager->notice_email)->setBody($view, 'text/html');
			$mailer->send($message);
		}
		
        // Уведомление пользователю (если есть куда отправлять)
        if($order->customerdata->email<>'unknown@unknown.no'){
            $view = $this->renderPartial('/default/customer_notice_template', array_merge(array('order' => $order)), true);
			$mailer = Yii::app()->mailer;
			$message = new YiiMailMessage();
			$message->setSubject('Вы сделали заказ на сайте '.CHtml::encode(Yii::app()->name))->setFrom($mailer->emailFrom)->setTo($order->customerdata->email)->setBody($view, 'text/html');
			$mailer->send($message);
        }
    }

}
