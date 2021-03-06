<?php
Yii::app()->clientScript->registerScript('show_header_scroll', "
    $(window).scroll(function() {
	    if ($(this).scrollTop() > 207){
	        $('.header-scroll').animate({'top': '0px'},2);
	    }
	    else{
	        $('.header-scroll').stop(true).animate({'top': '-119px'},2);
	    }
	});
", CClientScript::POS_READY);
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php if ($this->title) echo CHtml::encode($this->title), ' - ', CHtml::encode(Yii::app()->config->sitename); ?></title>
    <meta name="keywords" content="<?php echo CHtml::encode($this->keywords); ?>"/>
    <meta name="description" content="<?php echo CHtml::encode($this->description); ?>"/>
    <meta name="language" content="ru"/>
    <meta name="author" content="<?php echo CHtml::encode(Yii::app()->config->author); ?>"/>
    <link rel="icon" type="image/vnd.microsoft.icon" href="/favicon.ico">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css"/>
	<script src="/js/lightbox.min.js"></script>
	<link href="/css/lightbox.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<div class="fond"></div>
<div class="wrapper">

    <div class="header-scroll inner">
        <div class="header-line">
            <a href=".." class="back"></a>

            <div class="grid"></div>
            <a href="" class="logo">сайт-визитка</a>

            <div class="grid"></div>
            <a href="" class="corp">корпоративный сайт</a>
            <a href="" class="shop">интернет-магазин</a>
        </div>
        <div class="btn-login-line">
            <span>Протестировать панель администратора</span><a href="/manage">войти</a>
        </div>
    </div>

    <header>
        <div class="top-header">
            <div class="inner">
                <div class="left-col">
                    <a href="..">вернуться на главную</a>
                </div>
                <div class="right-col">
                    <a href="#" class="corp">корпоративный сайт</a>
                    <a href="#" class="shop">интернет-магазин</a>
                </div>
            </div>
        </div>
        <div class="middle-header">
            <div class="logo inner">
                <a href=".."><span></span><?php echo CHtml::encode(Yii::app()->config->sitename); ?><p>демонстрационная версия</p>
                </a>

                <div class="grid"></div>
            </div>
        </div>
    </header>


    <div class="content inner">
        <div class="template-header">
            <div class="btn-login-line">
                <span>Протестировать панель администратора</span><a href="/manage">войти</a>
            </div>

            <div class="header-content">
                <div class="left">
                    <img src="images/fish.svg" alt="" class="fish">
                    <?php $this->widget('application.widgets.OutAreaWidget', array('name' => 'zagolovok-v-shapke')); ?>
                </div>
                <div class="phone">
                    <?php $this->widget('application.widgets.OutAreaWidget', array('name' => 'telefony-v-shapke')); ?>
                </div>
            </div>
            <div class="wave-line"></div>
        </div>

        <nav>
            <?php $this->widget('application.widgets.OutMenu', array('name' => 'main')); ?>
        </nav>
		<div class="cart" id="cartwidget"><?$this->widget('application.modules.order.components.CartWidget');?></div>
		<?php $this->widget('application.modules.catalog.components.CatalogTreeWidget');?>
        <?php echo $content; ?>

        <div class="template-footer">
            <div class="bottom-line">
                <div class="left-col">© ООО «<span>Fishpangram</span>», 2015</div>
                <div class="right-col">
                    <?php $this->widget('application.widgets.OutAreaWidget', array('name' => 'sotsseti-v-podvale-shablona')); ?>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <div class="top-foot ">
            <div class="inner">
                <p>
                    Весь контент на демонстрационной версии является выдуманным, а все совпадения с реальными
                    организациями - случайны.
                    <br>
                    При разработке ни одна рыба не пострадала.
                </p>
            </div>
        </div>
        <div class="btn-order-line">
            <div class="inner">
                <a href="#">заказать</a>
            </div>
        </div>
        <div class="bottom-foot">
            <div class="inner">
                <a href="http://plus1dev.ru/" class="left-col">© ООО «Плюс один», 2015</a>

                <div class="right-col">
                    <a href="https://vk.com/plusodin_web" class="vk" target="_blank"></a>
                    <a href="https://www.facebook.com/plusodin" class="fb" target="_blank"></a>
<!--                    <a href="#" class="in"></a>-->
                    <a href="https://twitter.com/plusodinn" class="tw" target="_blank"></a>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>