<div id="register-panel">
    <p class="register-panel-header text-center">
        <b>กรุณากรอกข้อมูลเพื่อร่วมสนุก</b>
    </p>
    <p class="white-space"></p>
    <form class="form-horizontal" id="register-form" method="post" action="" onsubmit="return false;">
        <input type="hidden" id="fb-id" name="fb_id" value="" />
        <input type="hidden" id="fb-name" name="fb_name" value="" />
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">E-mail</label>
            <div class="col-sm-7">
                <input type="email" class="form-control" id="email" placeholder="person@example.com" />
            </div>
        </div>
        <p class="white-space"></p>
        <div class="form-group">
            <label for="dob" class="col-sm-2 control-label">วันเกิด</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="dob-dd" placeholder="วัน" />
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="dob-mm" placeholder="เดือน" />
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="dob-yyyy" placeholder="ค.ศ." />
            </div>
            <p class="form-control-static col-sm-4" style="color:#999;">(Ex. 02/12/1989)</p>
        </div>
        <p class="white-space"></p>
        <div class="form-group">
            <label for="gender" class="col-sm-2 control-label">เพศ</label>
            <div class="col-sm-10">
                <label class="radio-inline">
                    <input type="radio" name="gender" id="gender-m" value="m"> ชาย
                </label>
                <label class="radio-inline">
                    <input type="radio" name="gender" id="gender-f" value="f"> หญิง
                </label>
            </div>
        </div>
        <p class="white-space"></p>
        <div class="text-center">
            <a id="register-form-submit" href="javascript:void(0);">
                <img src="<?php echo Uri::base(); ?>public/assets/img/register-button.png" alt="" />
            </a>
        </div>
    </form>
</div>