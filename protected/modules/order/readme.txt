************Описание модуля "Заказы" (order)*************************

Пользовательская часть (frontend)
---------------------------------

Представления:
/views/frontend/default/index.php - (пока не используется)
......

Виджеты:
/components/CartWidget.php - виджет корзины товаров
(использует представление /components/views/cartwidget.php)
Использование: в шаблон поместить php-вставку <?$this->widget('application.modules.order.components.CartWidget');?>
