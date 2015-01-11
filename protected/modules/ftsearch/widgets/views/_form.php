<?echo CHtml::beginForm(array('/ftsearch'), 'get', array('class' => 'search-form'));?>
<?echo CHtml::textField('q', '', array('class' => 'search-field'));?>
<?echo CHtml::submitButton('',array('class'=>'search-btn'));?>
<?echo CHtml::endForm('');?>