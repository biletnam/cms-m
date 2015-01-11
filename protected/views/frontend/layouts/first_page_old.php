<?php $this->beginContent('//layouts/main_layout'); ?>
    <div class="about-company">
		<?php $this->widget('application.modules.banners.widgets.SliderWidget', array('areaname'=>'slajder'));?>
        <?php $this->widget('application.widgets.OutAreaWidget', array('name' => 'o-kompanii')); ?>
    </div>
    <div class="middle-line">
        <h2>Ваши услуги</h2>
        <div class="rope-left"></div>
        <?php $this->widget('application.widgets.OutAreaWidget', array('name' => 'vashi-uslugi-na-glavnoj')); ?>
        <div class="rope-right"></div>
    </div>
    <div class="advantages-line">
        <h2>Преимущества</h2>
        <?php $this->widget('application.widgets.OutAreaWidget', array('name' => 'preimuschestva-na-glavnoj')); ?>
        <img src="images/boat.png" alt="">
		<h1 style="padding-top:20px;padding-bottom:8px;">Новинки магазина</h1>
		<?php $this->widget('application.modules.catalog.widgets.CatalogProductToMainWidget');?>
    </div>
<?php $this->endContent(); ?>