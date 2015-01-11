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
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/magnific-popup.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui-slider.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/jquery.fancybox.css" rel="stylesheet"
          type="text/css"/>
    <?php
    Yii::app()->clientScript
        ->registerCoreScript('jquery')
        ->registerCoreScript('jquery.ui')
        ->registerScriptFile('/js/fancybox/jquery.fancybox.pack.js')
        ->registerScriptFile('/js/magnific-popup.js')
        ->registerScript('scripts', "

            $('.fancybox').fancybox({
                overlayShow: true,
                overlayOpacity: 0.5,
                zoomSpeedIn: 300,
                zoomSpeedOut:300
            });

            /* Сворачиваение/разворачивание списка */
             $(document).on('click','ul.info a li', function(){
                $(this).parent().next('ul').slideToggle();
             });

            /* Сворачиваение/разворачивание всех списков */
            $(document).on('click','.circle-vertical-menu', function(){
                var subCats = $(this).parent().find('ul.info ul');
                if (subCats.is(':visible'))
                    subCats.slideUp(300);
                else
                    subCats.slideDown(300);
            });
            /* Увеличение числа выбранных единиц товара */
            $(document).on('click', 'a.circle-base.increase-action', function() {
                var quantity = $(this).parent().find('.quantity');
                if(parseInt(quantity.text()) <= 98)
                    quantity.text(parseInt(quantity.text()) + 1);
                return false;
            });
            /* Уменьшение числа выбранных единиц товара */
            $(document).on('click', 'a.circle-base.decrease-action', function() {
                var quantity = $(this).parent().find('.quantity');
                if(parseInt(quantity.text()) >= 2)
                    quantity.text(parseInt(quantity.text()) - 1);

                return false;
            });

            /* Товар во всплывашке */
            var productPopup = $.magnificPopup.instance;
            $(document).on('click', 'a.open-shopping-cart-link', function(){
                magnificPopup.close();
                var url = $(this).prop('href');

                $.ajax({
                    url: url,
                    type: 'POST',
                    success: function(data){
                        productPopup.open({
                            items: {
                              src: data
                            },
                            type: 'inline' // this is default type
                        });
                    }
                });

                return false;
            });

            showPopup = function(data){
                productPopup.open({
                            items: {
                              src: data
                            },
                            type: 'inline' // this is default type
                        });
            };

        ", CClientScript::POS_READY);


    /*Скрипт, открывающий все внешние ссылки на сайте в новой вкладке*/
    Yii::app()->clientScript->registerScript('all_blank', "
    $(document).ready(function () {
        $('a[href^=http]').each(
            function () {
                if (this.href.indexOf(location.hostname) == -1) {
                    $(this).attr('target', '_blank');
                }
            });
    });
", CClientScript::POS_READY);

    /*Скрипт, добавляющий css селекторы для ОС и браузеров*/
    Yii::app()->clientScript->registerScript('css_fix', "
var cssFix = function(){
  var u = navigator.userAgent.toLowerCase(),
  addClass = function(el,val){
    if(!el.className) {
      el.className = val;
    } else {
      var newCl = el.className;
      newCl+=(' '+val);
      el.className = newCl;
    }
  },
  is = function(t){return (u.indexOf(t)!=-1)};
  addClass(document.getElementsByTagName('html')[0],[
    (!(/opera|webtv/i.test(u))&&/msie (\d)/.test(u))?('ie ie'+RegExp.$1)
      :is('firefox/2')?'gecko ff2'
      :is('firefox/3')?'gecko ff3'
      :is('gecko/')?'gecko'
      :is('opera/9')?'opera opera9':/opera (\d)/.test(u)?'opera opera'+RegExp.$1
      :is('konqueror')?'konqueror'
      :is('applewebkit/')?'webkit safari'
      :is('mozilla/')?'gecko':'',
    (is('x11')||is('linux'))?' linux'
      :is('mac')?' mac'
      :is('win')?' win':''
  ].join(' '));
}();
", CClientScript::POS_READY);

    if (Yii::app()->user->hasFlash('success')):
        Yii::app()->clientScript->registerScript(
            'success-popup',
            '$(function(){
                showPopup("<div class=\"flash-order-success\">' . Yii::app()->user->getFlash("success") . '</div>");
            });',
            CClientScript::POS_READY
        );
    endif;
    ?>
</head>
<body>
<div class="wrapper">
    <?php if (isset(Yii::app()->params) && isset(Yii::app()->params->isDemo) && Yii::app()->params->isDemo): ?>
        <div class="header">
            <div class="header-scroll">
                <div class="wrapper-inner">
                    <a href="http://plusonecms.ru/" target="_blank" class="back"></a>

                    <div class="grid"></div>
                    <a href="http://shop.plusonecms.ru/" class="logo">интернет-магазин</a>

                    <div class="grid"></div>
                    <a href="http://viz.plusonecms.ru/" target="_blank" class="visitka">сайт-визитка</a>
                    <a href="http://corp.plusonecms.ru/" target="_blank" class="corp">корпоративный сайт</a>

                    <div class="tab">
                        <a href="/manage" target="_blank">
                            <div class="tab-admin-panel">
                                ПРОТЕСТИРОВАТЬ ПАНЕЛЬ АДМИНИСТРАТОРА
                            </div>
                        </a>
                        <a href="/manage" target="_blank">
                            <div class="tab-login">
                                ВОЙТИ
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="wrapper-inner wrapper-bg">
        <div class="wrapper-inner-left">
            <div class="menu-part">
                <a href="/"><img class="menu-logo" src="/images/menu_whale_logo.png" alt="">
                </a>

                <div class="list-title">&bull; Каталог &bull;
                </div>
                <?php $this->widget('application.modules.catalog.widgets.CatalogCategoryWidget'); ?>
                <div class="circle-base circle-vertical-menu"></div>
            </div>
            <?php if (isset(Yii::app()->controller->module->id) and Yii::app()->controller->module->id == 'catalog') {
                $this->widget('application.modules.catalog.widgets.FilterWidget', array('categoryId' => $this->categoryId));
            }
            ?>

            <?php echo $this->clips['last-articles']; ?>
        </div>
        <div class="wrapper-inner-right">
            <div class="menu">
                <div class="horizontal-menu-part">
                    <div class="menu-actions">
                        <div class="search-bar">
                            <div class="phone-numbers">
                                <?php $this->widget('application.widgets.OutAreaWidget', array('name' => 'telefony-v-shapke')); ?>
                            </div>
                            <?php $this->widget('application.modules.ftsearch.widgets.SearchFormWidget'); ?>
                        </div>

                        <div class="menu-slogan">
                            <?php $this->widget('application.widgets.OutAreaWidget', array('name' => 'slogan')); ?>
                        </div>

                        <div class="menu-total-quantity">
                            <?php $this->widget('application.modules.order.components.CartWidget'); ?>
                        </div>
                    </div>

                    <div class="horizontal-menu">
                        <?php $this->widget('application.widgets.OutMenu', array('name' => 'main')); ?>
                    </div>
                </div>

            </div>

            <div class="content">
                <?php echo $content; ?>
            </div>
        </div>
        <?php echo $this->clips['site-info']; ?>
        <div class="social-links">
            <div class="wrapper-inner">
                <div class="company-ribbon">
                </div>
                <div class="socials">
                    <?php $this->widget('application.widgets.OutAreaWidget', array('name' => 'sotsseti-v-podvale-shablona')); ?>
                </div>
            </div>
        </div>
    </div>



    <?php if (isset(Yii::app()->params) && isset(Yii::app()->params->isDemo) && Yii::app()->params->isDemo): ?>
        <div class="footer">
            <div class="caution">
                <div class="text-caution">
                    <p> ВЕСЬ КОНТЕНТ НА ДЕМОНСТРАЦИОННОЙ ВЕРСИИ ЯВЛЯЕТСЯ ВЫДУМАННЫМ, А ВСЕ СОВПАДЕНИЯ С РЕАЛЬНЫМИ
                        ОРГАНИЗАЦИЯМИ
                        - СЛУЧАЙНЫ ПРИ РАЗРАБОТКЕ НИ ОДНА РЫБА НЕ ПОСТРАДАЛА</p>

                    <div class="tab">
                        <a href="http://plusonecms.ru/?kind=3#anchor-order-form">
                            <div class="tab-make-order">
                                ЗАКАЗАТЬ
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="red-block">

                <div class="wrapper-inner">
                    <div class="dev-info">
                        <a href="http://plusonedev.ru/" target="_blank  ">
                            <div class="circle-base circle-devlogo">
                            </div>
                        </a>

                        <div class="dev-name">
                            <p>&copy; ООО &laquo;Плюс один&raquo;, 2015</p>
                        </div>
                    </div>
                    <div class="socials">
                        <div class="circle-base circle-socials">
                            <a href="https://vk.com/plusodin_web" target="_blank"><i class="icon-vk"></i></a>
                        </div>
                        <div class="circle-base circle-socials">
                            <a href="https://www.facebook.com/plusodin" target="_blank"><i class="icon-fb"></i></a>
                        </div>
                        <div class="circle-base circle-socials">
                            <a href="https://www.linkedin.com/company/plus-odin-web" target="_blank"><i
                                    class="icon-in"></i></a>
                        </div>
                        <div class="circle-base circle-socials">
                            <a href="https://twitter.com/plusodinn" target="_blank"><i class="icon-tw"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php endif; ?>

</div>

</body>
</html>