<?php
use Orm\Model;

class Model_User extends Model {

    protected static $_table_name = "user";

	protected static $_properties = array(
		'id',
		'fb_id',
		'fb_name',
        'email',
        'dob',
        'gender',
        'registered',
        'registered_at',
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
		$val->add_field('fb_name', 'Fb Name', 'required|max_length[255]');
        $val->add_field('email', 'E-Mail', 'required|valid_email');

		return $val;

	}

}
