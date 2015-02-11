<?php
use Orm\Model;

class Model_Photo extends Model {

    protected static $_table_name = "photo";

	protected static $_properties = array(
		'id',
		'fb_id',
        'photo_id',
        'post_id',
        'type',
        'message',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory){

		$val = Validation::forge($factory);

		$val->add_field('fb_id', 'Fb Id', 'required|max_length[255]');
		$val->add_field('post_id', 'Post Id', 'required|max_length[255]');

		return $val;

	}

    /* methods */
    public static function get_photos(){

        $query = DB::select('*')->from('photo')
            ->order_by('updated_at','desc')
            ->execute()->as_array();

        $result = array();

        foreach($query as $q){

            $row = array();

            $row['id'] = $q['id'];
            $row['fb_id'] = $q['fb_id'];
            $row['photo_id'] = $q['photo_id'];

            $ext = "";

            if($q['type'] == "data:image/jpeg") $ext = ".jpg";
            else if($q['type'] == "data:image/png") $ext = ".png";

            $row['photo'] = $q['post_id'].$ext;

            $result[] = $row;

        }

        return $result;

    }

}
