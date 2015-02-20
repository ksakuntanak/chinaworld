<div id="menu-bar">
    <a class="menu menu-1 active" href="javascript:void(0);">
        <img src="<?php echo Uri::base(); ?>public/assets/img/menu-1-active.png" alt="" />
    </a>
    <a class="menu menu-2" href="<?php echo Uri::create('app/rules'); ?>">
        <img src="<?php echo Uri::base(); ?>public/assets/img/menu-2.png" alt="" />
    </a>
    <a class="menu menu-3" href="<?php echo Uri::create('app/prize'); ?>">
        <img src="<?php echo Uri::base(); ?>public/assets/img/menu-3.png" alt="" />
    </a>
    <a class="menu menu-4" href="<?php echo Uri::create('app/gallery'); ?>">
        <img src="<?php echo Uri::base(); ?>public/assets/img/menu-4.png" alt="" />
    </a>
</div>
<div id="menu-1-panel">
    <p style="clear: both;"></p>
    <p class="white-space"></p>
    <table>
        <tr>
            <td style="padding-right: 18px;">
                <div id="photo-preview">
                    <div id="photo-preview-container">
                        <img id="photo" src="<?php echo Uri::base(); ?>public/assets/img/photo-placeholder.png" alt="" />
                    </div>
                    <a id="photo-browse-button" href="javascript:void(0);">
                        <img src="<?php echo Uri::base(); ?>public/assets/img/photo-browse-button.png" alt="" />
                    </a>
                </div>
            </td>
            <td>
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" onsubmit="return false;">
                    <input type="hidden" name="fb_id" id="fb-id" value="" />
                    <input type="hidden" name="fb_name" id="fb-name" value="" />
                    <textarea id="message" class="form-control" style="width: 445px; height: 144px;" placeholder="ใส่คำบรรยายภาพของคุณ..."> #CHINAWORLD 6THANNIVERSARY ที่สุดแห่งศูนย์ฯ ผ้าม้วน ใจกลางพาหุรัด</textarea>
                    <input type="file" id="photo-file" accept="image/*" style="display: none;" />
                    <p class="white-space"></p>
                    <a id="submit-button" class="pull-right" href="javascript:void(0);">
                        <img src="<?php echo Uri::base(); ?>public/assets/img/submit-button.png" alt="" />
                    </a>
                </form>
            </td>
        </tr>
    </table>
</div>
<div class="block"></div>
<div class="loading">
    <p>
        <img src="<?php echo Uri::base(); ?>public/assets/img/loader.gif" alt="" />
    </p>
    <p>กำลังโหลด...</p>
</div>
<div class="checked" style="display:none;">
    <p>
        <img src="<?php echo Uri::base(); ?>public/assets/img/checked.png" alt="" />
    </p>
    <p>อัพโหลดเรียบร้อยแล้ว!</p>
</div>
<div id="confirm-upload-popup" style="display: none;">
    <table>
        <tr>
            <td style="padding-right: 18px;">
                <div id="preview-photo-frame">
                    <div id="preview-photo-frame-container">
                        <img id="preview-photo" src="<?php echo Uri::base(); ?>public/assets/img/photo-placeholder.png" alt="" />
                    </div>
                </div>
            </td>
            <td>
                <p id="preview-message"></p>
            </td>
        </tr>
    </table>
    <p style="padding-bottom: 5px;"></p>
    <a id="upload-button" href="javascript:void(0);">
        <img src="<?php echo Uri::base(); ?>public/assets/img/upload-button.png" alt="" />
    </a>
</div>
<a id="confirm-upload-popup-close" href="javascript:void(0);" style="display: none;">
    <img src="<?php echo Uri::base(); ?>public/assets/img/confirm-upload-popup-close.png" alt="" />
</a>