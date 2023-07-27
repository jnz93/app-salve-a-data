<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['opauth_config'] = array(
	'path' => base_url_ajax('/Auth/login/'), //example: /ci_opauth/auth/login/
	'callback_url' =>base_url_ajax('/Auth/authenticate/'), //example: /ci_opauth/auth/authenticate/
	'callback_transport' => 'get', //Codeigniter don't use native session
	'security_salt' => 'fkalsdjfoeiwfapfjkdsjladfjlakewj',
	'debug' => false,
	'Strategy' => array( //comment those you don't use
		'Facebook' => array(
			'app_id' =>'1718637458387518',// '1044384289005888',
			'app_secret' => '15b456faa34008b240cd17366f1677de',//'924fe3b0bebdcdfd98f4e9cac9bff047',
			'fields' => 'email',
			'scope' => 'email'

		),
		'Google' => array(
				'client_id' => '765521769078-7h10i9fegbts06o9c857sm9nqkg00qsn.apps.googleusercontent.com',// '328563913623-1lhj03q56q0n4681gugpsdnt5snmamoe.apps.googleusercontent.com',
				'client_secret' =>'QinYCZodjizqq_RapAqtDamr',// 'ZlRUHw48ujAJndQ4MjTpXhB5'
		),

		'LinkedIn' => array(
				'api_key' =>'78fwpyrum7920g',// '77xghkdnktirs8',
				'secret_key' =>'0Usa3m6fYIKgMRJp',// 'pRTrmnFKt3NjhFFs'
		),
	)
);

/* End of file ci_opauth.php */
/* Location: ./application/config/ci_opauth.php */
