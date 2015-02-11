<?php

class Controller_App extends Controller_Base {

    public $template = 'template_app';

    public function before(){
        parent::before();
    }

    public function after($response){
        $response = parent::after($response);
        return $response;
    }

    public function action_index(){
        $data = array();
        $this->template->title = 'ครบรอบ 6 ปี Chinaworld Fashion สุดชิค ต้อนรับเทศกาลตรุษจีน';
        $this->template->content = View::forge('app/index', $data);
    }

    public function action_register(){
        $data = array();
        $this->template->title = 'ลงทะเบียน - ครบรอบ 6 ปี Chinaworld Fashion สุดชิค ต้อนรับเทศกาลตรุษจีน';
        $this->template->content = View::forge('app/register', $data);
    }

    public function action_upload(){
        $data = array();
        $this->template->title = 'อัพโหลดรูป - ครบรอบ 6 ปี Chinaworld Fashion สุดชิค ต้อนรับเทศกาลตรุษจีน';
        $this->template->content = View::forge('app/upload', $data);
    }

    public function action_rules(){
        $data = array();
        $this->template->title = 'กติกา - ครบรอบ 6 ปี Chinaworld Fashion สุดชิค ต้อนรับเทศกาลตรุษจีน';
        $this->template->content = View::forge('app/rules', $data);
    }

    public function action_prize(){
        $data = array();
        $this->template->title = 'ของรางวัล - ครบรอบ 6 ปี Chinaworld Fashion สุดชิค ต้อนรับเทศกาลตรุษจีน';
        $this->template->content = View::forge('app/prize', $data);
    }

    public function action_gallery(){

        $data = array();

        $data['photos'] = Model_Photo::get_photos();

        $this->template->title = 'แกลลอรี่ - ครบรอบ 6 ปี Chinaworld Fashion สุดชิค ต้อนรับเทศกาลตรุษจีน';
        $this->template->content = View::forge('app/gallery', $data);

    }

}
