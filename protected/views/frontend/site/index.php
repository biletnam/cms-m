<?php $this->beginClip('last-articles'); ?>
    <div class="articles">
        <div class="list-title">&bull; Статьи &bull;</div>
        <?php $this->widget('application.modules.articles.widgets.LastArticlesWidget'); ?>
    </div>
<?php $this->endClip(); ?>

<?php echo $model->content; ?>

<?php $this->beginClip('site-info'); ?>
<div class="about-shop">
    <?php $this->widget('application.widgets.OutAreaWidget', array('name' => 'o-kompanii')); ?>
</div>
<?php $this->endClip(); ?>