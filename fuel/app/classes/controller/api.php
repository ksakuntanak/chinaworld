<?php

class Controller_Api extends Controller_Rest {

    public function post_saveUser(){

        $data = Input::post();

        $user = Model_User::query()->where('fb_id',$data['fb_id'])->get_one();

        if(!$user){

            $user = Model_User::forge(array(
                'fb_id' => $data['fb_id'],
                'fb_name' => $data['fb_name'],
                'email' => "",
                'dob' => "0000-00-00",
                'gender' => "",
                'registered' => 0,
                'registered_at' => 0
            ));

        } else {

            $user->fb_name = $data['fb_name'];

        }

        if($user->save()){
            return $this->response(array(
                'success' => true,
                'registered' => $user->registered
            ));
        } else {
            return $this->response(array(
                'success' => false
            ));
        }

    }

    public function get_user(){

        $id = Input::get('id');

        $user = Model_User::query()->where('fb_id',$id)->get_one();

        if($user){
            return $this->response(array(
                'success' => true,
                'registered' => $user->registered
            ));
        } else {
            return $this->response(array(
                'success' => false
            ));
        }

    }

    public function post_registerUser(){

        $data = Input::post();

        $user = Model_User::query()->where('fb_id',$data['fb_id'])->get_one();

        if($user){

            $user->email = $data['email'];
            $user->dob = $data['dob'];
            $user->gender = $data['gender'];
            $user->registered = 1;
            $user->registered_at = time();

        } else {

            $user = Model_User::forge(array(
                'fb_id' => $data['fb_id'],
                'fb_name' => $data['fb_name'],
                'email' => $data['email'],
                'dob' => $data['dob'],
                'gender' => $data['gender'],
                'registered' => 1,
                'registered_at' => time()
            ));

        }

        if($user->save()){
            return $this->response(array(
                'success' => true
            ));
        } else {
            return $this->response(array(
                'success' => false
            ));
        }

    }

    public function post_savePhoto(){

        try {

            $data = Input::post();

            list($type,$photoData) = explode(';',$data['photo']);
            list(,$photoData)      = explode(',',$photoData);
            $photoData = base64_decode($photoData);

            $ext = "";

            if($type == "data:image/png") $ext = ".png";
            else if($type == "data:image/jpeg") $ext = ".jpg";

            file_put_contents(UPLOADPATH.$data['post_id'].$ext,$photoData);

            $photo = Model_Photo::query()->where('fb_id',$data['fb_id'])->get_one();

            if($photo){

                /*if($photo->type == "data:image/png")
                    $ext = ".png";
                else if($photo->type == "data:image/jpeg")
                    $ext = ".jpg";

                @unlink(UPLOADPATH.$photo->post_id.$ext);*/

                $photo->photo_id = $data['photo_id'];
                $photo->post_id = $data['post_id'];
                $photo->type = $type;
                $photo->message = $data['message'];

            } else {

                $photo = Model_Photo::forge(array(
                    'fb_id' => $data['fb_id'],
                    'photo_id' => $data['photo_id'],
                    'post_id' => $data['post_id'],
                    'type' => $type,
                    'message' => $data['message']
                ));

            }

            if($photo->save()){
                return $this->response(array(
                    'success' => true
                ));
            } else {
                return $this->response(array(
                    'success' => false,
                    'message' => "ไม่สามารถบันทึกข้อมูลของคุณได้ โปรดลองใหม่อีกครั้ง"
                ));
            }

        } catch (Exception $e){
            return $this->response(array(
                'success' => false,
                'message' => $e->getMessage()
            ));
        }

    }

}