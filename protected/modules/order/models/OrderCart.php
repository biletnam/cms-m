<?php

/**
 * Модель корзины заказов. Таблица "order_cart".
 *
 *
 * @property integer $id
 * @property string $session_id идентификатор сессии
 * @property integer $product_id id товара
 * @property double $price цена
 * @property integer $quantity количество
 * @property integer $date дата и время добавления в корзину
 */
class OrderCart extends CModel
{
    public $product_id;
    public $product_fullLink;
    public $article;
    public $product_title;
    public $price; 
    public $price_dealer;
    public $quantity;
    public $compl=array();

	/**
	 * @return array правила валидации
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, quantity', 'numerical', 'integerOnly'=>true),
			array('price, price_dealer, quantity', 'numerical', 'min'=>0),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, session_id, product_id, price, price_dealer, quantity, date', 'safe', 'on'=>'search'),
		);
	}

    public function attributeNames()
    {
        return array(
            'product_id',
            'product_fullLink',
            'article',
            'product_title',
            'price' ,
            'price_dealer' ,
            'quantity',
            'compl',
        );
    }


	/**
	 * @return array лейблы-названия полей
	 */
	public function attributeLabels()
	{
		return array(
			'product_id' => 'id товара',
            'product_fullLink' => 'Ссылка на товар',
            'article' => 'Артикул',
			'price' => 'Цена',
			'price_dealer' => 'Дилерская цена',
			'quantity' => 'Количество',
            'product_title' => 'Наименование товара',
		);
	}

    // Добавляет в куки-корзину информацию о товаре
    public function putToCart(){
            $cart=$this->loadCart();
            $cart[]=$this->getAttributes();
            $serial_cart=serialize($cart);
            Yii::app()->request->cookies['cart'] = new CHttpCookie('cart', $serial_cart);
            return true;
    }

    // Удаление позиции из корзины
    public function delete($id){
            // Читаем корзину
            $cart=$this->loadCart();
            if(isset($cart[$id])){
                // Удаляем элемент
                unset($cart[$id]);

                // И записываем корзину обратно
                $serial_cart=serialize($cart);
                Yii::app()->request->cookies['cart'] = new CHttpCookie('cart', $serial_cart);
                
                return true;
            }else{return false;}
//            if (isset(Yii::app()->params) && isset(Yii::app()->params->isDemo))
//                $this->isDemo = Yii::app()->params->isDemo;
            if (isset(Yii::app()->params) && isset(Yii::app()->params->isDemo) && Yii::app()->params->isDemo) {
                if (Yii::app()->request->isAjaxRequest)
                    throw new CHttpException(403, $this->errorSave);
                else {
                    Yii::app()->user->setFlash('demo_mode', $this->errorSave);
                    return false;
                }
            }
    }

    public function quantityInc($id){
             // Читаем корзину
            $cart=$this->loadCart();
            if(isset($cart[$id])){
                // Прибавляем количество на 1
                $cart[$id]['quantity']=$cart[$id]['quantity']+1;

                // И записываем корзину обратно
                $serial_cart=serialize($cart);
                Yii::app()->request->cookies['cart'] = new CHttpCookie('cart', $serial_cart);

                return true;
            }else{return false;}
    }

    public function quantityDec($id){
             // Читаем корзину
            $cart=$this->loadCart();
            if(isset($cart[$id])){
                // Уменьшаем количество на 1, если больше 1
                if($cart[$id]['quantity']>1){
                  $cart[$id]['quantity']=$cart[$id]['quantity']-1;
                }

                // И записываем корзину обратно
                $serial_cart=serialize($cart);
                Yii::app()->request->cookies['cart'] = new CHttpCookie('cart', $serial_cart);

                return true;
            }else{return false;}
    }

    // Устанавливает требуемое значение для количества
    public function quantitySet($id, $new_quantity){
             // Читаем корзину
            $cart=$this->loadCart();
            if(isset($cart[$id])){
                // Устанавливаем значение количества
                $cart[$id]['quantity']=$new_quantity;

                // И записываем корзину обратно
                $serial_cart=serialize($cart);
                Yii::app()->request->cookies['cart'] = new CHttpCookie('cart', $serial_cart);

                return true;
            }else{return false;}
    }
        // Проверяем наличие товара в корзине
    public function inCart($product_id){

            // Читаем корзину
            $cart=$this->loadCart();
             if(empty($cart)){
                 // Если корзина пуста - то сразу нет
                 return false;
            }

            //Перебираем товары в корзине
            foreach($cart as $prod){
                if(isset($prod['product_id'])){
                    // Нашли!
                    if($prod['product_id']==$product_id){return true;}
                }
            }

            // Не нашли
            return false;
    }

    // Возвращает количество товаров в корзине данного пользователя
    public function getCartPositionsCount(){

        // Читаем корзину
        $cart=$this->loadCart();

        // Возвращаем количество элементов массива
        return count($cart);
    }

    // Возвращает запись о товаре в корзине заказов. Если товара в корзине нет - возвращает false
    public function getCartPosition($product_id){

        // Читаем корзину
        $cart=$this->loadCart();

        //Перебираем товары в корзине
        foreach($cart as $prod){
            if(isset($prod['product_id'])){
                // Нашли!
                if($prod['product_id']==$product_id){return $prod;}
            }
        }

        // Не нашли
        return false;
    }

    // Подсчитывает, на какую сумму в корзине товаров
    public function getCartSum(){

        // Читаем корзину
        $cart=$this->loadCart();
        $sum=0;
		foreach($cart as $position){
			$sum=$sum+$position['price']*$position['quantity'];
		}
        return $sum;
    }

    // Выводит отформатированную сумму
    // $decimals знаков после запятой, $decpoint - символ, отделяющий десятичную часть
    // $groupspace - разделитель для групп разрядов. По умолчанию - 123 456,78
    public function getCartSumFormat($decimals=2, $decpoint=',', $groupspace=' '){
        $sum=$this->getCartSum();
        return number_format($sum, $decimals, $decpoint, $groupspace);
    }

    // Возвращает данные для вывода содержимого корзины в CGridView
    public function cartProvider(){

        $cart=$this->loadCart();
        $items=array();
        foreach($cart as $key=>$prod){
            // Готовим колонку вывода комплектации
            //$outCompl='';
            //foreach($prod['compl'] as $compl){$outCompl.='+'.$compl.'<br/>';}
            
            $items[$key]=$prod;
            $items[$key]['id']=$key;
            //$items[$key]['complectation']=$outCompl;
        }
        $dataProvider = new CArrayDataProvider($items);
        return $dataProvider;

    }

   // Возвращает содержимое корзины в виде массива
    public function loadCart(){
            $cart=array();
            if(isset(Yii::app()->request->cookies['cart'])){
                 $cart=unserialize(Yii::app()->request->cookies['cart']->value);
            }
            return $cart;
        if (isset(Yii::app()->params) && isset(Yii::app()->params->isDemo))
            $this->isDemo = Yii::app()->params->isDemo;
        if ($this->isDemo) {
            if (Yii::app()->request->isAjaxRequest)
                throw new CHttpException(403, $this->errorSave);
            else {
                Yii::app()->user->setFlash('demo_mode', $this->errorSave);
                return false;
            }
        }
    }

}