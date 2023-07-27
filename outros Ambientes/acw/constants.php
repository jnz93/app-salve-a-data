<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  |--------------------------------------------------------------------------
  | Display Debug backtrace
  |--------------------------------------------------------------------------
  |
  | If set to TRUE, a backtrace will be displayed along with php errors. If
  | error_reporting is disabled, the backtrace will not display, regardless
  | of this setting
  |
 */
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
  |--------------------------------------------------------------------------
  | File and Directory Modes
  |--------------------------------------------------------------------------
  |
  | These prefs are used when checking and setting modes when working
  | with the file system.  The defaults are fine on servers with proper
  | security, but you may wish (or even need) to change the values in
  | certain environments (Apache running a separate process for each
  | user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
  | always be used to set the mode correctly.
  |
 */
defined('FILE_READ_MODE') OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE') OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE') OR define('DIR_WRITE_MODE', 0755);

/*
  |--------------------------------------------------------------------------
  | File Stream Modes
  |--------------------------------------------------------------------------
  |
  | These modes are used when working with fopen()/popen()
  |
 */
defined('FOPEN_READ') OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE') OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE') OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE') OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT') OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT') OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
  |--------------------------------------------------------------------------
  | Exit Status Codes
  |--------------------------------------------------------------------------
  |
  | Used to indicate the conditions under which the script is exit()ing.
  | While there is no universal standard for error codes, there are some
  | broad conventions.  Three such conventions are mentioned below, for
  | those who wish to make use of them.  The CodeIgniter defaults were
  | chosen for the least overlap with these conventions, while still
  | leaving room for others to be defined in future versions and user
  | applications.
  |
  | The three main conventions used for determining exit status codes
  | are as follows:
  |
  |    Standard C/C++ Library (stdlibc):
  |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
  |       (This link also contains other GNU-specific conventions)
  |    BSD sysexits.h:
  |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
  |    Bash scripting:
  |       http://tldp.org/LDP/abs/html/exitcodes.html
  |
 */
defined('EXIT_SUCCESS') OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR') OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG') OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE') OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS') OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT') OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE') OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN') OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX') OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

defined('NUM_DEC') OR define('NUM_DEC', ','); // SEPARADOR NUMERICO DECIMAL
defined('NUM_SEP') OR define('NUM_SEP', '.'); // SEPARADOR NUMERICO DE MILHAR
defined('DATE_HM_FORMAT') OR define('DATE_HM_FORMAT', 'H:i'); // FORMATAÇÃO DE HORA
defined('DATE_DMY_HM_FORMAT') OR define('DATE_DMY_HM_FORMAT', 'd/m/Y &\a\g\r\a\v\e;\s H:i'); // FORMATAÇÃO DE DIA E HORA
defined('DATE_DMY') OR define('DATE_DMY', 'd/m/Y'); // FORMATAÇÃO DE DIA E HORA

define('PRECO_VAGA', 0.01);

define('LIMITE_BUSCA', 20);

$SMTP = array(	
	'SES'=>array(
		'HOST'=>'ssl://email-smtp.us-east-1.amazonaws.com',
		'PORT'=>'465',
		'USER'=>'AKIAI22DFPCG6LPDC7FA',
		'PASSWORD'=>'Ao+il/SLIZ6NW5mLbvwL4ENP1aUhsZqSawWBjjbYMYXL',
		'FROM'=>array('contato@agendadoprodutor.com', 'Agenda do Produtor'),
		'ALT'=>'PHP'
	)
);
define('EMAILRESPOSTA', 'reply.agendadoprodutor.com');


define('CACHEVERSION', 4);

define('CHAVE_ENCRIPT', "sdlkhfkaqqfhkldsakcsadkjfhdsajkl");
define('DOC_CNPJ', '23740353000123');
define('DOC_IM', '07337956');

DEFINE('PLANO_NOME','WhatsApp Cart Recover');
DEFINE('PLANO_VALOR',14.90);

define('DOMINIO', 'whatsapp.empreender.com.br');
//define('URL', 'https://whatsapp.empreender.com.br');
//define('PATH_RAIZ', '/');
define('URL', 'http://localhost');
define('PATH_RAIZ', '/raiz/empreender/whatsapp2/');
define('URLSHOPIFY',"https://whatsapp.empreender.com.br/");


define('KEY','e7b2011f20c403b4006df4bc3f149c38');
define('SECRET','5ac1f419704d08d62b0f8c2d2f04c6a1');
define('SCOPE','read_products,read_customers,read_orders,read_checkouts,read_all_orders');

$AGORA = time();
$HOJE = strtotime('TODAY 00:00:00');
$LANGLIST = array('en'=>'English','pt-br'=>'Português (Brasil)');