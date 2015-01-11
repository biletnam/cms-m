<?php
$cs = Yii::app()->clientScript;
$cs->registerScriptFile('/js/jquery.slides.min.js', CClientScript::POS_HEAD);
$cs->registerScript('slider', '

 $(function(){
      $("#slides").slidesjs({
        width: 635,
        height: 262,
        play: {
      active: false,
        // [boolean] Generate the play and stop buttons.
        // You cannot use your own buttons. Sorry.
      effect: "slide",
        // [string] Can be either "slide" or "fade".
      interval: 5000,
        // [number] Time spent on each slide in milliseconds.
      auto: true,
        // [boolean] Start playing the slideshow on load.
      swap: false,
        // [boolean] show/hide stop and play buttons
      pauseOnHover: false,
        // [boolean] pause a playing slideshow on hover
      restartDelay: 1000
        // [number] restart delay on inactive slideshow
    }
      });

    });


', CClientScript::POS_READY);
?>

<div class="slider">
    <div id="slides">
        <? foreach ($banners as $banner): ?>
            <div>
                <img src="<?php echo '/' . $banner->folder . '/' . $banner->image ?>" alt=""/>

                <div class="description">
                    <?php echo $banner->description ?>
                </div>
            </div>
        <? endforeach; ?>
    </div>
</div>