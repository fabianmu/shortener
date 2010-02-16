<?php

class Url extends AppModel {
	var $name = 'Url';
	
	var $validate = array(
		'long_url' => array(
			'rule' => array('url', true),
			'message' => 'The URL is invalid. Here is an example for a valid Domain: http://www.wesc.com',
		)
	);
	
}
