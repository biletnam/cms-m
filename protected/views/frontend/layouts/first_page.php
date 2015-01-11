<?php $this->beginContent('//layouts/main_layout'); ?>
    <?php $this->widget('application.modules.banners.widgets.BannersWidget', array('areaname' => 'slider-to-firstpage')); ?>
    <?php $this->widget('application.modules.catalog.widgets.CatalogProductToMainWidget'); ?>
<?php $this->endContent(); ?>