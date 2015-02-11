FB.init({
    appId      : '439397266212203',
    xfbml      : true,
    version    : 'v2.2'
});

var registered = false;

var photo_data;

var dataURItoBlob = function(dataURI,mime) {
    // convert base64 to raw binary data held in a string
    // doesn't handle URLEncoded DataURIs

    var byteString = window.atob(dataURI);
    // separate out the mime component

    // write the bytes of the string to an ArrayBuffer
    //var ab = new ArrayBuffer(byteString.length);
    var ia = new Uint8Array(byteString.length);
    for (var i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
    }

    // write the ArrayBuffer to a blob, and you're done
    var blob = new Blob([ia], { type: mime });

    return blob;

};

$(document).ready(function(){

    /* check user login */
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            FB.api('/me',function(res){

                $('#fb-id').val(res.id);
                $('#fb-name').val(res.name);

                $.ajax({
                    'url': url_base + "api/saveUser",
                    'type': "POST",
                    'dataType': 'json',
                    data: {
                        fb_id: res.id,
                        fb_name: res.name
                    },
                    success: function(res){

                        console.log(res);

                        if(res.success){
                            registered = (res.registered && (res.registered == 1 || res.registered == "1"))?true:false;
                        }

                        $('.loading').hide();
                        $('.block').hide();

                    }
                });

            });
        } else {
            FB.login(function(){

                FB.api('/me',function(res){

                    $('#fb-id').val(res.id);
                    $('#fb-name').val(res.name);

                    $.ajax({
                        'url': url_base + "api/saveUser",
                        'type': "POST",
                        'dataType': 'json',
                        data: {
                            fb_id: res.id,
                            fb_name: res.name
                        },
                        success: function(res){

                            console.log(res);

                            if(res.success){
                                registered = (res.registered && (res.registered == 1 || res.registered == "1"))?true:false;
                            }

                            $('.loading').hide();
                            $('.block').hide();

                        }
                    });

                });

            }, {scope: 'publish_actions,user_likes'});
        }
    });

    /* index */
    $('#start-button').click(function(){

        if(registered)
            self.location.href = url_base+"app/upload";
        else
            self.location.href = url_base+"app/register";

        /*FB.api('/me/likes/120717091292823',function(res){

            var liked = false;

            console.log(res.data);

            if(res.data.length) liked = true;

            if(liked){

                console.log("You've already liked the page.");

                if(registered)
                    self.location.href = url_base+"app/upload";
                else
                    self.location.href = url_base+"app/register";

            } else {

                $('.block').show();

                $('#like-popup').animate({
                    opacity: 1,
                    duration: 500
                }).show();

                var checkLikeInterval = setInterval(function(){

                    FB.api('/me/likes/120717091292823',function(res){

                        var liked = false;

                        console.log(res.data);

                        if(res.data.length) liked = true;

                        if(liked){

                            if(registered)
                                self.location.href = url_base+"app/upload";
                            else
                                self.location.href = url_base+"app/register";

                        } else
                            console.log("You haven't liked the page yet.");

                    });

                },1000);
            }

        });*/

    });

    /* register */
    $('#register-form-submit').click(function(){

        var email = $('#email').val();
        var dob_dd = $('#dob-dd').val();
        var dob_mm = $('#dob-mm').val();
        var dob_yyyy = $('#dob-yyyy').val();
        var gender = $('input[name=gender]:checked').val();

        var re = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$./igm;

        if(!email.length){
            $('#email').focus();
            alert("กรุณากรอก E-mail");
            return false;
        } /*else if(!re.test(email)){
            $('#email').focus();
            alert("กรุณากรอก E-mail ให้ถูกต้องตามรูปแบบ เช่น test@example.com");
            return false;
        }*/

        if(!dob_dd.length){
            $('#dob-dd').focus();
            alert("กรุณากรอกวันเกิด");
            return false;
        } else if(dob_dd.length != 2 || parseInt(dob_dd,10) < 1 || parseInt(dob_dd,10) > 31){
            $('#dob-dd').focus();
            alert("กรุณากรอกวันเกิดให้มีค่าอยู่ในช่วง 01 - 31");
            return false;
        }

        if(!dob_mm.length){
            $('#dob-mm').focus();
            alert("กรุณากรอกเดือนเกิด");
            return false;
        } else if(dob_mm.length != 2 || parseInt(dob_mm,10) < 1 || parseInt(dob_mm,10) > 12){
            $('#dob-mm').focus();
            alert("กรุณากรอกวันเกิดให้มีค่าอยู่ในช่วง 01 - 12");
            return false;
        }

        if(!dob_yyyy.length){
            $('#dob-yyyy').focus();
            alert("กรุณากรอกปี ค.ศ. ที่เกิด");
            return false;
        } else if(dob_yyyy.length != 4){
            $('#dob-yyyy').focus();
            alert("กรุณากรอกปี ค.ศ. ที่เกิดให้มีค่าอยู่ในรูปเลข 4 หลัก เช่น 1980");
            return false;
        }

        if(!gender || !gender.length){
            alert("กรุณาเลือกเพศ");
            return false;
        }

        var data = {
            fb_id: $('#fb-id').val(),
            fb_name: $('#fb-name').val(),
            email: email,
            dob: dob_yyyy + "-" + dob_mm + "-" + dob_dd,
            gender: gender
        };

        $.ajax({
            'url': url_base + "api/registerUser",
            'type': "POST",
            'dataType': 'json',
            data: data,
            success: function(res){
                console.log(res.success);
                if(res.success)
                    self.location.href = url_base+"app/upload/";
            }
        });

    });

    /* menu bar */
    $(".menu-1:not(.active)").hover(function(){
        $(".menu-1 img").attr('src',url_base+"public/assets/img/menu-1-active.png");
    },function(){
        $(".menu-1 img").attr('src',url_base+"public/assets/img/menu-1.png");
    });

    $(".menu-2:not(.active)").hover(function(){
        $(".menu-2 img").attr('src',url_base+"public/assets/img/menu-2-active.png");
    },function(){
        $(".menu-2 img").attr('src',url_base+"public/assets/img/menu-2.png");
    });

    $(".menu-3:not(.active)").hover(function(){
        $(".menu-3 img").attr('src',url_base+"public/assets/img/menu-3-active.png");
    },function(){
        $(".menu-3 img").attr('src',url_base+"public/assets/img/menu-3.png");
    });

    $(".menu-4:not(.active)").hover(function(){
        $(".menu-4 img").attr('src',url_base+"public/assets/img/menu-4-active.png");
    },function(){
        $(".menu-4 img").attr('src',url_base+"public/assets/img/menu-4.png");
    });

    /* upload */
    $('#photo-browse-button').click(function(){
        $('#photo-file').click();
    });

    $('#photo-file').change(function(){

        if (this.files && this.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {
                $('#photo').attr('src', e.target.result);
                photo_data = e.target.result;
                console.log(photo_data);
            }

            reader.readAsDataURL(this.files[0]);

        }

    });

    $('#submit-button').click(function(){

        $('#preview-photo').attr('src',photo_data);
        $('#preview-message').html($('#message').val()+'<br><strong>#CHINAWORLD 6THANNIVERSARY<br>ศูนย์ผ้าม้วนใหญ่ที่สุด</strong>strong>');

        $('.block').show();

        $('#confirm-upload-popup').show();
        $('#confirm-upload-popup-close').show();

    });

    $('#confirm-upload-popup-close').click(function(){

        $('.block').hide();

        $('#confirm-upload-popup').hide();
        $('#confirm-upload-popup-close').hide();

    });

    $('#upload-button').click(function(){

        $('#confirm-upload-popup').hide();
        $('#confirm-upload-popup-close').hide();

        $('.loading').show();

        if(photo_data && photo_data.length){

            var blobData;
            var mime;

            if(photo_data.search("data:image/jpeg;base64,") != -1){
                blobData = photo_data.replace("data:image/jpeg;base64,","");
                mime = "image/jpeg";
            } else if(photo_data.search("data:image/png;base64,") != -1){
                blobData = photo_data.replace("data:image/png;base64,","");
                mime = "image/png";
            }

            try {

                var blob = dataURItoBlob(blobData,mime);
                var message = $('#message').val();

                FB.getLoginStatus(function(res) {

                    if (res.status === 'connected') {

                        var accessToken = res.authResponse.accessToken;

                        var data = new FormData();

                        data.append("access_token",accessToken);
                        data.append("source",blob);
                        data.append("message",message+" #CHINAWORLD 6THANNIVERSARY ศูนย์ผ้าม้วนใหญ่ที่สุด");

                        $.ajax({
                            url: "https://graph.facebook.com/me/photos?access_token="+accessToken,
                            type: "POST",
                            data: data,
                            processData:false,
                            contentType:false,
                            cache:false,
                            success:function(res){

                                console.log(res);

                                if(res.id && res.post_id){
                                    $.ajax({
                                        url: url_base + "api/savePhoto",
                                        type: "POST",
                                        dataType: 'json',
                                        data: {
                                            fb_id: $('#fb-id').val(),
                                            photo_id: res.id,
                                            post_id: res.post_id,
                                            photo: photo_data,
                                            message: message
                                        },
                                        success: function(res){
                                            console.log(res);
                                            if(res.success){

                                                $('.loading').hide();
                                                $('.checked').show();

                                                setTimeout(function(){
                                                    self.location.href = url_base + "app/gallery";
                                                },3000);

                                            } else {

                                                alert(res.message);

                                                $('.block').hide();
                                                $('.loading').hide();

                                            }
                                        }
                                    });

                                } else {

                                    alert("เกิดปัญหาในการอัพโหลดรูป โปรดลองใหม่อีกครั้ง");

                                    $('.block').hide();
                                    $('.loading').hide();

                                }

                            }
                        });

                    } else {
                        return false;
                    }
                });

            } catch(e){
                console.log(e);
            }

        } else {

            $('.loading').hide();
            return false;

        }

    });

});