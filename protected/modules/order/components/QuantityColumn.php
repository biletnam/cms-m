<?php
// Класс колонки "Количество" корзины товаров
class QuantityColumn extends CButtonColumn
{

	public $disableSortable = false;
    public $header='Количество';
    public $htmlOptions=array('class'=>'c2');
	
function __construct($grid) {
	parent::__construct($grid);

	$this->template = '{plus}{minus}';

	$plusminus =<<< EOD
		function() {

			$.fn.yiiGridView.update('order-cart-grid', {
				type:'POST',
				url:$(this).attr('href'),
				success:function() {
					$.fn.yiiGridView.update('order-cart-grid');
				}
			});
			return false;

		}
EOD;
	
	$this->buttons = array(
		'plus' => array(
			'label'  => '+1',
			'url'   => 'array("/order/cart/plus", "id" => $data["id"])',
			'imageUrl'  => '/css/img/plus.png',
			'options' => array('class' => 'plus'),
			//'click' => $plusminus,
		),
		'minus' => array(
			'label'  => '-1',
			'url'   => 'array("/order/cart/minus","id" => $data["id"])',
			'imageUrl'  => '/css/img/minus.png',
			'options' => array('class' => 'minus'),
			//'click' => $plusminus,
		),
	);
	
}

	
    protected function renderDataCellContent($row,$data)
        {
                echo CHtml::textField('quantity['.$data['id'].']', $data['quantity'], array('class'=>'ammount'));
                parent::renderDataCellContent($row,$data);

        }
}
?>