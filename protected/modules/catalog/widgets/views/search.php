<form class="filter-form" id="catalog-filter-form">
    <div class="filter-title title">
        <h2>• Фильтр •</h2>
    </div>
    <div class="block">
        <div class="title">
            <h2>Цена</h2>
        </div>
        <div class="container price" style="display: block;">
            <div class="formCost">
                <label for="minCost"></label>
                <input class="minCost" type="text" id="minCost" value="<?php echo $this->minPrice ?>"
                       name="Catalog_filter[price_min]" readonly data-min="<?php echo $this->minPrice ?>"/>
                <label for="maxCost"></label>
                <input type="text" id="maxCost" class="maxCost" value="<?php echo $this->maxPrice ?>" name="Catalog_filter[price_max]"
                       readonly data-max="<?php echo $this->maxPrice ?>">
            </div>
            <div id="slider-range"></div>
        </div>
    </div>

    <?php if ($this->productAttributes): ?>
        <?php foreach ($this->productAttributes as $attribute): ?>
            <?php if ($values = $attribute->values): ?>
                <?php if ($attribute['id_attribute_kind'] != CatalogAttribute::TYPE_FLAG): ?>
                    <div class="block">
                        <div class="title">
                            <h2><?php echo $attribute->title; ?></h2>
                        </div>
                        <div class="container" style="display: none;">
                            <?php echo CHtml::checkBoxList('Catalog_filter[attributes][' . $attribute->id . ']', array(), CHtml::listData($values, 'id', 'value')); ?>
                        </div>
                    </div>
                <?php else: ?>
                <div class="block">
                    <div class="container visible">
                        <?php echo CHtml::checkBoxList('Catalog_filter[attributes][' . $attribute->id . ']', array(), CHtml::listData($values, 'id', 'value')); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <div class="circle-base circle-vertical-menu"></div>
</form>


