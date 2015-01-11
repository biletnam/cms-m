<?php
Yii::app()->clientScript->registerScript('product',"
  $('.addFasad').on('click', function() {
	  block = $(this).parent('p').parent('div');
		$('<p class=\"more_img\"><input type=\"file\" name=\"CatalogImage[image][]\"><span class=\"addFasad\">+</span><span class=\"delFasad\">&ndash;</span></p>').appendTo(block);
	});
  $('.delFasad').on('click', function() {
	  block = $(this).parent('p');
		$(block).remove();
	});
  $('.addPlan').on('click', function() {
	  number = 0+String(parseInt($(this).prev('input').attr(\"name\").replace('CatalogProductAttribute[0', ''))+1);
	  attr = 0+String(parseInt($(this).prev('input').attr(\"name\").replace('CatalogProductAttribute[0', '')));

	  text = '<div class=\"attribute clear\"><input type=\"hidden\" id=\"kind_'+number+'\" name=\"kind['+number+']\" value=\"14\" \/><input type=\"text\" id=\"CatalogProductAttribute_'+number+'_title\" name=\"CatalogProductAttribute['+number+'][title]\" value=\"\" \/><input type=\"file\" id=\"CatalogProductAttribute_'+number+'_value\" name=\"CatalogProductAttribute['+number+'][value]\" value=\"\" \/><span class=\"addPlan\">+<\/span><span class=\"delPlan\">-<\/span><\/div>';
		$(this).parent('div').after(text);
		$(this).next('span').remove();
		$(this).remove();

	});
  $('.delPlan').on('click', function() {
	  attr = $(this).parent('div').prev('div');
		$('<span class=\"addPlan\">+</span><span class=\"delPlan\">-</span>').appendTo(attr);

	  block = $(this).parent('div');
		$(block).remove();
	});
", CClientScript::POS_LOAD);

$cs=Yii::app()->clientScript;
$cs->registerScriptFile('/js/jquery.synctranslit.js', CClientScript::POS_HEAD);
$cs->registerScript('translit', "
    $('#productTitle').syncTranslit({destination: 'slug'});

", CClientScript::POS_READY);

$cs->registerScript('photo_delete', "
        $('#photo-list a.delete').on('click',function() {
            if(!confirm('Вы уверены в удалении фотографии?')) return false;
            var th=this;
            var afterDelete=function(){};
            $.fn.yiiListView.update('photo-list', {
                type:'POST',
                url:$(this).attr('href'),
                success:function(data) {
                    $.fn.yiiListView.update('photo-list');
                    afterDelete(th,true,data);
                },
                error:function(XHR) {
                    return afterDelete(th,false,XHR);
                }
            });
            return false;
        });

", CClientScript::POS_READY);

?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'catalog-product-form',
	'htmlOptions'=>array('enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>


	<p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_category'); ?>
		<?php echo $form->dropDownList($model,'id_category',CatalogCategory::getListed()); ?>
		<?php echo $form->error($model,'id_category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>256, 'id'=>'productTitle')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>256, 'id'=>'slug')); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textArea($model,'keywords', array('rows'=>5)); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'article'); ?>
		<?php echo $form->textField($model,'article',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'article'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>60)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<?php
	$this->widget('application.modules.catalog.components.InputAttributesForm', array('productAttributes'=>$model->productAttrubute, 'category'=>$model->idCategory));
	?>
	<!--div class="row">
		<?/*php echo $form->labelEx($model,'currency'); ?>
		<?php echo $form->dropDownList($model, 'currency', CatalogCurrency::arrayDropList()); ?>
		<?php echo $form->error($model,'currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'priceprofile'); ?>
		<?php echo $form->dropDownList($model, 'priceprofile', CatalogPriceprofile::arrayDropList(), array('empty'=>'Не применять')); ?>
		<?php echo $form->error($model,'priceprofile'); */?>
	</div-->

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
        <?php
            if ($model->image)
            echo CHtml::image('/upload/catalog/product/small/'.$model->image);
        ?>
		<?php echo $form->fileField($model,'image'); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>


	<div class="row">
		<p class="label">Дополнительные фото</p>
		<!--?php/*
		if($model->catalogImages)
			foreach($model->catalogImages as $image) {
				echo '<div class="image_block">';
				echo '<div class="image"><a href="#" class="thumb"><span>';
				echo CHtml::image('/upload/catalog/product/moreimages/small/'.$image->image);
				echo '</span></a>';
				echo "</div>";
				echo CHtml::link('', array(
									'image/delete',
									'id' => $image->id), array(
										'confirm' => 'Вы уверены в удалении изображения?', 'class' => 'delete'));
				echo "</div>";
			}*/
		//echo '<div class="clear"></div>';
		?>-->
        <?php $this->widget('zii.widgets.CListView', array(
            'id'=>'photo-list',
            'dataProvider'=>$imageDataProvider,
            'itemView'=>'_photoview',
            'emptyText'=>'Нет фотографий',
            'template'=>'{items}',
        )); ?>
        <div class="clear"></div>
		<p class="more_img"><?php echo $form->fileField($productImages,'image[]'); ?><span class="addFasad">+</span></p>
	</div>

	<div class="row">

        <h3>Спецразмещение</h3>
        <div class="inlined">
        <?php echo $form->labelEx($model,'on_main'); ?>
        <?php echo $form->checkBox($model,'on_main'); ?>
        <?php echo $form->error($model,'on_main'); ?>
        </div>
        <!--div class="inlined">
        <?/*php echo $form->labelEx($model,'hit'); ?>
        <?php echo $form->checkBox($model,'hit'); ?>
        <?php echo $form->error($model,'hit'); ?>
        </div>
        <div class="inlined">
        <?php echo $form->labelEx($model,'recomended'); ?>
        <?php echo $form->checkBox($model,'recomended'); ?>
        <?php echo $form->error($model,'recomended'); */?>
        </div-->
        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'hide'); ?>
        <?php echo $form->checkBox($model,'hide',array('checked'=>(!$model->hide)?'checked':false)); ?>
        <?php echo $form->error($model,'hide'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'noyml'); ?>
        <?php echo $form->checkBox($model,'noyml',array('checked'=>(!$model->noyml)?'checked':false)); ?>
        <?php echo $form->error($model,'noyml'); ?>
    </div>

    <div class="row">
		<?php echo $form->labelEx($model,'views'); ?>
		<?php echo $form->textField($model,'views'); ?>
		<?php echo $form->error($model,'views'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php $this->widget('application.extensions.ckeditor.CKEditor', array(
				'model'=>$model,
				'attribute'=>'description',
				'language'=>'ru',
				'editorTemplate'=>'full',
		)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->