<?php

defined('BASEPATH') or exit('No direct script access allowed');

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
defined('SHOW_DEBUG_BACKTRACE') or define('SHOW_DEBUG_BACKTRACE', TRUE);

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
defined('FILE_READ_MODE') or define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') or define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE') or define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE') or define('DIR_WRITE_MODE', 0755);

/*
  |--------------------------------------------------------------------------
  | File Stream Modes
  |--------------------------------------------------------------------------
  |
  | These modes are used when working with fopen()/popen()
  |
 */
defined('FOPEN_READ') or define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE') or define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE') or define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE') or define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE') or define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE') or define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT') or define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT') or define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

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
defined('EXIT_SUCCESS') or define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR') or define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG') or define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE') or define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS') or define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') or define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT') or define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE') or define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN') or define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX') or define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

defined('NUM_DEC') or define('NUM_DEC', ','); // SEPARADOR NUMERICO DECIMAL
defined('NUM_SEP') or define('NUM_SEP', '.'); // SEPARADOR NUMERICO DE MILHAR
defined('DATE_HM_FORMAT') or define('DATE_HM_FORMAT', 'H:i'); // FORMATAÇÃO DE HORA
defined('DATE_DMY_HM_FORMAT') or define('DATE_DMY_HM_FORMAT', 'd/m/Y &\a\g\r\a\v\e;\s H:i'); // FORMATAÇÃO DE DIA E HORA
defined('DATE_DMY') or define('DATE_DMY', 'd/m/Y'); // FORMATAÇÃO DE DIA E HORA

define('DOMINIOAPP', 'cakedigital.com.br');

define('LIMITE_BUSCA', 20);

define('PREFIXOPAG', 'CUPOM');
define('PREFIXOPROD', 'CPG'); //WLY

define('CACHEVERSION', 2);

define('CHAVE_ENCRIPT', "sdlkhfkaqqfhkldsakcsadkjfhdsajkl");
define('DOC_CNPJ', '');
define('DOC_IM', '');
define('DIAS_TRIAL', 3);


DEFINE('URL_S3', 'https://s3-sa-east-1.amazonaws.com/cakemoney/cakepages');

define('DOMINIO', 'cupom.cakedigital.com.br/');
define('APP_NAME', 'Cupom Primeira Compra');
define('PATH_RAIZ', '/');
// Validação para rodar o projeto local ( sendo em localhost ou .test )
if (VALIDATEHOST) define('URL', 'https://app.salveadata.com.br');
else define('URL', 'https://app.salveadata.com.br');

define('IDEMPRESA', 'user');
define('TABLEEMPRESA', 'usuario');
define('MODO_INTEGRACAO', true);

define('KEY', 'c924dd2371218e0711f9861b8d6f1736');
define('SECRET', '656ec224687e256ae586219ece3c9109');
define('SCOPE', 'read_products,read_customers,read_orders,read_checkouts'); //,read_all_orders
define('KEY_MONDAY', '67428b68jsnbf4hb5gfs65j');

$AGORA = time();
$HOJE = strtotime('TODAY 00:00:00');
$LANGLIST = array('en' => 'English', 'pt-br' => 'Português (Brasil)');


$SMTP = array(
  'PHP' => array(
    'HOST' => 'localhost',
    'PORT' => '587',
    'CRYPTO' => '',
    'USER' => "contato@salveadata.com.br",
    'PASSWORD' => "F(pZ-xem_zDS",
    'FROM' => array('contato@salveadata.com.br', 'Salve a Data'),
    'ALT' => 'PHP' //
  ),
  'SUPORTE' => array(
          'HOST' => 'ssl://massivo.cakeserver.com.br',
          'PORT' => '587',
          'USER' => "cakedigital",
          'PASSWORD' => "envio",
          'FROM' => array('noreply@cupomprimeiracompra.com.br', 'Cupom primeira Compra'),
          'ALT' => 'SUPORTE'//
      ),
);

// $SMTP = array(
//   'SUPORTE' => array(
//       'HOST' => 'ssl://massivo.cakeserver.com.br',
//       'PORT' => '587',
//       'USER' => "cakedigital",
//       'PASSWORD' => "envio",
//       'FROM' => array('noreply@cupomprimeiracompra.com.br', 'Cupom primeira Compra'),
//       'ALT' => 'SUPORTE'//
//   ),
//   'REPLY-AWS' => array(
//     'HOST' => 'ssl://email-smtp.us-east-1.amazonaws.com',
//     'PORT' => '465',
//     'USER' => 'AKIAYZZOQZRXE5APLNIK',
//     'PASSWORD' => 'BIv7XV+hGwbw5EocKVmdV3MXZA05CYu6MGzccgdAPnvE',
//     'FROM' => array('reply@dropnacional.com.br', 'Drop Nacional'),
//     'ALT' => 'SUPORTE'//
//   ),
// );