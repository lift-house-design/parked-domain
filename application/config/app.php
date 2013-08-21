<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Development Mode
|--------------------------------------------------------------------------
|
| Set to true to display errors and debugging information.
|
|--------------------------------------------------------------------------
*/
$config['dev_mode']=TRUE;

/*
|--------------------------------------------------------------------------
| Database Configuration
|--------------------------------------------------------------------------
|
| http://ellislab.com/codeigniter/user-guide/database/configuration.html
|
|--------------------------------------------------------------------------
*/
if($config['dev_mode']===TRUE)
{
        $config['database']=array(
                'hostname'=>'localhost',
                'username'=>'root',
                'password'=>'root',
                'database'=>'domainforsale',
                'dbdriver'=>'mysql',
                'db_debug'=>$config['dev_mode'],
        );
}
else
{
        $config['database']=array(
                'hostname'=>'localhost',
                'username'=>'thomas',
                'password'=>'Dsb6Zf3npPi8',
                'database'=>'thomas_domainforsale',
                'dbdriver'=>'mysql',
                'db_debug'=>$config['dev_mode'],
        );
}
/*
|--------------------------------------------------------------------------
| Domain Configuration
|--------------------------------------------------------------------------
*/
$config['domains']=array(
	'austinfeature.com'=>array(
		'name'=>'Austin Feature',
		'ga_code'=>'UA-XXXXX-X',
	),
	'domainforsale.com'=>array(
		'name'=>'Domain For Sale',
		'ga_code'=>'UA-XXXXX-X',
	),
);

/*
|--------------------------------------------------------------------------
| URL/Path Configuration
|--------------------------------------------------------------------------
|
| 'base_url'			Base site URL (prefix with http://)
|
| 'assets_url'			URL prefix to the assets directory
|
| 'module_path'			Base module directory path
|
*/

$host=$_SERVER['HTTP_HOST'];
if(substr($host,0,8)!='http://')
	$host='http://'.$host;

$config['base_url']=$host;
$config['assets_url']='/assets';
$config['module_path']=APPPATH.'modules';

/*
|--------------------------------------------------------------------------
| General Site Configuration
|--------------------------------------------------------------------------
|
| 'site_name'			The name of the site to be used in the title bar
|						and various other locations
|
| 'site_description'	A short description or tagline to be used as the
|						default meta description and possibly other places
|						on the site
|
| 'title_format'		The formatting of the title used on every page,
|						where the first argument is the site name and the
|						second is the page name
|
| 'copyright_format'	The formatting of the copyright used at the bottom
|						of every page and in the meta tag, where the first
|						argument is the site name and the second is the 
|						current year
|
*/
$regexp='/(https?\:\/\/)?(www\.)?(.+)/';
if(preg_match($regexp,$_SERVER['HTTP_HOST'],$matches) && !empty($config['domains'][$matches[3]]))
{
	$site_name_key=$matches[3];
	$site_name=empty($config['domains'][$site_name_key]['name']) ? $_SERVER['HTTP_HOST'] : $config['domains'][$site_name_key]['name'];
	$ga_code=empty($config['domains'][$site_name_key]['ga_code']) ? FALSE : $config['domains'][$site_name_key]['ga_code'];
	
	$config['site_name']=$site_name;
	$config['ga_code']=$ga_code;
}
else
{
	$config['site_name']=$config['base_url'];
	$config['ga_code']=FALSE;
}
	
//$config['site_name']='Project Template';
$config['site_description']='Making projects work';
$config['title_format']='%1$s | %2$s';
$config['copyright_format']='Copyright &copy; %1$s %2$d. All Rights Reserved.';

/*
|--------------------------------------------------------------------------
| Google Analytics
|--------------------------------------------------------------------------
|
| 'ga_code'				The "UA-XXXXX-X" code for google analytics, or FALSE
|						to disable
|
*/
//$config['ga_code']=FALSE;

/*
|--------------------------------------------------------------------------
| E-mail Notifications Configuration
|--------------------------------------------------------------------------
|
| 'sender_email'		The e-mail address displayed as the sender on
|						outgoing e-mails
|
| 'sender_name'			The name displayed as the sender on outgoing
|						e-mails
|
| 'config'				Configuration array passed to the e-mail component
|
*/
$config['email_notifications']=array(
	'sender_email'=>'no-reply@lifthousedesign.com',
	'sender_name'=>'Lifthouse Design',
	'config'=>array(
		'protocol'=>'smtp',
		'smtp_host'=>'mail.lifthousedesign.com',
		'smtp_user'=>'noreply@lifthousedesign.com',
		'smtp_pass'=>'9sbZdlAklydT',
		'smtp_port'=>'25',
		'mailtype'=>'html',
	),
);

/*
|--------------------------------------------------------------------------
| SMS Notifications Configuration
|--------------------------------------------------------------------------
|
| 'config'				Configuration array used by the Twilio component
|
*/
$config['sms_notifications']=array(
	'config'=>array(
		'mode'=>'prod',
		'account_sid'=>'AC295178e1f333781132528cd16d55e49b',
		'auth_token'=>'81905b30336cc2fb674adf13e3f17fb2',
		'api_version'=>'2010-04-01',
		'number'=>'+15128618405',
	),
);

/*
|--------------------------------------------------------------------------
| Contact Form Configuration
|--------------------------------------------------------------------------
*/
$config['contact_form']=array(
	'send_to'=>'nick@mvbeattie.com',
);

/* End of file app.php */
/* Location: ./application/config/app.php */