<div id="menu-bar">
    <a class="menu menu-1" href="<?php echo Uri::create('app/upload'); ?>">
        <img src="<?php echo Uri::base(); ?>public/assets/img/menu-1.png" alt="" />
    </a>
    <a class="menu menu-2" href="<?php echo Uri::create('app/rules'); ?>">
        <img src="<?php echo Uri::base(); ?>public/assets/img/menu-2.png" alt="" />
    </a>
    <a class="menu menu-3" href="<?php echo Uri::create('app/prize'); ?>">
        <img src="<?php echo Uri::base(); ?>public/assets/img/menu-3.png" alt="" />
    </a>
    <a class="menu menu-4 active" href="javascript:void(0);">
        <img src="<?php echo Uri::base(); ?>public/assets/img/menu-4-active.png" alt="" />
    </a>
</div>
<div id="menu-4-panel">
    <p style="clear: both;"></p>
    <div id="gallery">
        <?php foreach($photos as $photo) { ?>
            <div class="image-frame">
                <div class="image-frame-container">
                    <a href="//www.facebook.com/photo.php?fbid=<?php echo $photo['photo_id']; ?>" target="new">
                        <img src="<?php echo Uri::create('upload/'.$photo['photo']); ?>" alt="" />
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>