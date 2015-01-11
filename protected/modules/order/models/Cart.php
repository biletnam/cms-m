<?php
/**
 * Модель корзины заказов. Таблица "order_cart".
 *
 * @property integer $id
 * @property string $session_id идентификатор сессии
 * @property integer $product_id id товара
 * @property double $price цена
 * @property integer $quantity количество
 * @property integer $date дата и время добавления в корзину (datetime)
 */
class Cart extends CModel
{
	public $product_id;
    public $price;
    public $quantity;
	
	/**
	 * @return array правила валидации
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, price, quantity', 'required'),
			array('product_id, quantity', 'numerical', 'integerOnly'=>true),
			array('price, quantity', 'numerical', 'min'=>0),
			array('id, session_id, product_id, price, quantity, date', 'safe', 'on'=>'search'),
		);
	}
	
	public function attributeNames()
    {
        return array(
            'product_id',
            'price',
            'quantity',
        );
    }
	/**
	 * Получение корзины
	 */
	public function getCart()
	{
		return Yii::app()->db->createCommand("SELECT `product_id`, `price`, `quantity` FROM `order_cart` WHERE `session_id`='".Yii::app()->session->sessionId."'")->queryAll();
	}
	
	/**
	 * Проверка наличия товара в корзине
	 */
	public function inCart($product_id)
	{
		return Yii::app()->db->createCommand("SELECT `quantity` FROM `order_cart` WHERE `session_id`='".Yii::app()->session->sessionId."' AND `product_id`='".$product_id."'")->queryScalar();
	}
	
	/**
	 * Добавление товара в корзину
	 */
	public function add()
	{
		return Yii::app()->db->createCommand()->insert('order_cart',array(
			'session_id' => Yii::app()->session->sessionId,
			'product_id' => $this->product_id,
			'price' => $this->price,
			'quantity' => $this->quantity,
			'date' => date("Y-m-d H:i:s"),
		));
	}
	
	/**
	 * Обновление товара в корзине
	 */
	public function update()
	{
		return Yii::app()->db->createCommand()->update('order_cart', array(
				'quantity' => $this->quantity,
			), 
			'session_id=:session_id AND product_id=:product_id', 
			array(
				':session_id'=>Yii::app()->session->sessionId,
				':product_id'=>$this->product_id
			)
		);
	}
	
	/**
	 * Удаление товара из корзины
	 */
	public function delete()
	{
		return Yii::app()->db->createCommand()->delete('order_cart',
			'session_id=:session_id AND product_id=:product_id', 
			array(
				':session_id'=>Yii::app()->session->sessionId,
				':product_id'=>$this->product_id
			)
		);
	}
	
	/**
	 * Получаем итоговую стоимость
	 */
	public function getTotal()
	{
		$total = 0;
		if ($products = $this->getCart())
		{
			foreach($products as $product)
			{
				if ($product_price = Yii::app()->db->createCommand("SELECT `price` FROM `catalog_product` WHERE `id`='".$product['product_id']."'")->queryScalar())
					$total += $product_price*$product['quantity'];
			}
		}
		return $total;
	}
	
	/**
	 * Получаем все товары и их описание из `catalog_product`
	 */
	public function getCartProducts()
	{
		$cartProducts = array();
		if ($products = $this->getCart())
		{
			foreach($products as $product)
			{
				if ($product_info = Yii::app()->db->createCommand("SELECT `id`,`title`,`image`,`description` FROM `catalog_product` WHERE `id`='".$product['product_id']."'")->queryRow())	// Если существует такой товар
				{
					$product_info += $product;
					$product_info['sum'] = $product['price']*$product['quantity'];
					$product=CatalogProduct::model()->findByPk($product['product_id']);
					$product_info['fullLink'] = $product->fullLink;
					$cartProducts[] = $product_info;
				}
			}
		}
		
		return $cartProducts;
	}
	
	/**
	 * Получаем товар из корзины по ид
	 */
	public function getCartProduct($product_id)
	{
		return Yii::app()->db->createCommand("SELECT `price`,`quantity` FROM `order_cart` WHERE `session_id`='".Yii::app()->session->sessionId."' AND `product_id`='".$product_id."'")->queryRow();
	}
	
	/**
	 * Получаем общее количество товаров в корзине
	 */
	public function getProductCount()
	{
		return Yii::app()->db->createCommand("SELECT SUM(`quantity`), `price` FROM `order_cart` WHERE `session_id`='".Yii::app()->session->sessionId."'")->queryScalar();
	}
	
	/**
	 * Очистка корзины
	 */
	public function clear()
	{
		return Yii::app()->db->createCommand("DELETE FROM `order_cart` WHERE `session_id`='".Yii::app()->session->sessionId."'")->query();
	}
}