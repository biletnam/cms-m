<?php

class FilterWidget extends CWidget
{
    /**
     * @var int
     */
    public $categoryId = 0;

    /**
     * @var int
     */
    protected $minPrice = 0;

    /**
     * @var int
     */
    protected $maxPrice = 0;

    /**
     * @var array
     */
    protected $productAttributes = array();

    public function init()
    {
        Yii::app()->clientScript
            ->registerScript('search-widget', "

                $('#slider-range').slider({
                    range: true,
                    min: $('#minCost').data('min'),
                    max: $('#maxCost').data('max'),
                    values: [ $('#minCost').val(), $('#maxCost').val() ],
                    slide: function( event, ui ) {
                        $('#minCost').val(ui.values[0]);
                        $('#maxCost').val(ui.values[1]);
                    }
                }).on('slidestop', function( event, ui ) {
                    $(this).closest('form').submit();
                });

                $('#minCost').val($('#slider-range').slider('values', 0));
                $('#maxCost').val($('#slider-range').slider('values', 1));

                /*сворачивание-разворачивание фильтров начало*/

                $(document).on('click', '.filter-form .filter-title, .filter-form .circle-vertical-menu', function () {
                    if($(this).parent().find('.container:not(.visible)').is(':hidden')){
                        $(this).parent().find('.container:not(.visible)').slideDown();
                    }
                    else{
                        $(this).parent().find('.container:not(.visible)').slideUp();
                    }
                });
                $(document).on('click', '.filter-form .block .title', function () {
                    $(this).parent().find('.container:not(.visible)').slideToggle();
                });

                /*сворачивание-разворачивание фильтров конец*/


                $(document).on('change', '#catalog-filter-form input', function(){
                    $(this).closest('form').submit();
                });

                $(document).on('submit', '#catalog-filter-form', function(){
                    updateProductList();
                    return false;
                });


        updateProductList = function(){
            var data = $('#catalog-filter-form').serialize();

            if (data)
                data += '&';

            $.fn.yiiListView.update('product-list', {
                beforeSend: function(){
                    $('#product-list').css('opacity', 0.5);
                },
                data: data

            });
        }

            ", CClientScript::POS_READY);

        $this->minPrice = Yii::app()->db->createCommand("SELECT MIN(price) FROM catalog_product;")->queryScalar();
        $this->maxPrice = Yii::app()->db->createCommand("SELECT MAX(price) FROM catalog_product WHERE id_category=$this->categoryId;")->queryScalar();
        if ($this->maxPrice > 999999)
            $this->maxPrice = 999999;

        $this->productAttributes = CatalogAttribute::model()->findAllByAttributes(array('id_attribute_kind' => array(CatalogAttribute::TYPE_LIST, CatalogAttribute::TYPE_CHOICE,CatalogAttribute::TYPE_FLAG)));
    }

    public function run()
    {
        if($this->maxPrice) {/*Если равно 0, то товары в данной категории не найдены, значит фильтр не выводить*/
            $this->render('search');
        }
    }
}