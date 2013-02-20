<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ','rb');
define('FOPEN_READ_WRITE','r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE','wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE','w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE','ab');
define('FOPEN_READ_WRITE_CREATE','a+b');
define('FOPEN_WRITE_CREATE_STRICT','xb');
define('FOPEN_READ_WRITE_CREATE_STRICT','x+b');



/*
|--------------------------------------------------------------------------
 */
define('CODE','code');
define('MSG','message');
define('DATA','data');
define('CONTENT_TYPE','Content-type');
define('JSON_CONTENT_TYPE','application/json');


define('ECAN500_PRICE',1);
define('ECAN1500_PRICE',2.85);
define('ECAN2500_PRICE',4.50);
define('ECAN5000_PRICE',8.80);
define('ECAN10000_PRICE',17.20);
define('ECAN25000_PRICE',42.50);
define('ECAN50000_PRICE',80);
define('ECAN100000_PRICE',156.00);

/**
 * ECAN Button ID's
 */
define('ECAN500_BUTTON_ID',1);
define('ECAN1500_BUTTON_ID',2.85);
define('ECAN2500_BUTTON_ID',4.50);
define('ECAN5000_BUTTON_ID',8.80);
define('ECAN10000_BUTTON_ID',17.20);
define('ECAN25000_BUTTON_ID',42.50);
define('ECAN50000_BUTTON_ID',80);
define('ECAN100000_BUTTON_ID',156.00);

/**
 * ECAN item names
 */

define('ECAN500_PRODUCT_NAME',1);
define('ECAN1500_PRODUCT_NAME',2.85);
define('ECAN2500_PRODUCT_NAME',4.50);
define('ECAN5000_PRODUCT_NAME',8.80);
define('ECAN10000_PRODUCT_NAME',17.20);
define('ECAN25000_PRODUCT_NAME',42.50);
define('ECAN50000_PRODUCT_NAME',80);
define('ECAN100000_PRODUCT_NAME',156.00);

/**
 * Paypal URL's
 */
define('PAYPAL_PRODUCTION_URL','https://www.paypal.com/cgi-bin/webscr');
define('PAYPAL_SANDBOX_URL','https://www.sandbox.paypal.com/cgi-bin/webscr');
define('PAYPAL_NOTIFY_URL',  base_url()."/paypal/notify_paypal");
define('PAYPAL_CALLBACK_URL',base_url()."/paypal/thankyou");


/* End of file constants.php */
/* Location: ./application/config/constants.php */