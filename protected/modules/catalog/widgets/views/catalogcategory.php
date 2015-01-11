<?php $iteration = 1;?>
<ul class="info">
    <?foreach($categories as $category):?>
       <a>
            <li class="item" id="<?php echo $category['id']; ?>"><?php echo $category['title']; ?></li>
       </a>
        <?php if(isset($category['children'])): ?>
            <ul class="sub-cat<?php echo $iteration; $iteration++;?>">
                <?php foreach($category['children'] as $child_cat): ?>
                <a href="<?php echo '/catalog/'.$child_cat['link']; ?>">
                    <li class="item" id="<?php echo 'p'.$child_cat['id_category']; ?>"><?php echo $child_cat['title']; ?></li>
                </a>
                <? endforeach; ?>
            </ul>
        <?php endif; ?>
    <?endforeach?>
</ul>