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
$config['dev_mode']=FALSE;

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
	'agent2buyer.com'=>array(
		'name'=>'Agent to Buyer',
		'ga_code'=>'UA-43422603-3',
	),
	'agenttobuyer.com'=>array(
		'name'=>'Agent to Buyer',
		'ga_code'=>'UA-43422603-4',
	),
	'austinfeature.com'=>array(
		'name'=>'Austin Feature',
		'ga_code'=>'UA-43422603-1',
	),
	'austinhousehunting.biz'=>array(
		'name'=>'Austin House Hunting',
		'ga_code'=>'UA-43422603-5',
	),
	'austinhousehunting.com'=>array(
		'name'=>'Austin House Hunting',
		'ga_code'=>'UA-43422603-2',
	),
	'austinhousehunting.net'=>array(
		'name'=>'Austin House Hunting',
		'ga_code'=>'UA-43422603-7',
	),
	'austinhousehunting.org'=>array(
		'name'=>'Austin House Hunting',
		'ga_code'=>'UA-43422603-6',
	),
	'austinjunkcar.com'=>array(
		'name'=>'Austin Junk Car',
		'ga_code'=>'UA-43422603-8',
	),
	'bostonfeature.com'=>array(
		'name'=>'Boston Feature',
		'ga_code'=>'UA-43422603-9',
	),
	'bottletronic.com'=>array(
		'name'=>'Bottle Tronic',
		'ga_code'=>'UA-43422603-10',
	),
	'canadafeature.com'=>array(
		'name'=>'Canada Feature',
		'ga_code'=>'UA-43422603-11',
	),
	'cashedcar.com'=>array(
		'name'=>'Cashed Car',
		'ga_code'=>'UA-43422603-12',
	),
	'cashoutmycar.com'=>array(
		'name'=>'Cash Out My Car',
		'ga_code'=>'UA-43422603-13',
	),
	'compositestoneproducts.com'=>array(
		'name'=>'Composite Stone Products',
		'ga_code'=>'UA-43422603-14',
	),
	'dallasfeature.com'=>array(
		'name'=>'Dallas Feature',
		'ga_code'=>'UA-43422603-15',
	),
	'dallasjunkcar.com'=>array(
		'name'=>'Dallas Junk Car',
		'ga_code'=>'UA-43422603-16',
	),
	'foundnowtext.com'=>array(
		'name'=>'Found Now Text',
		'ga_code'=>'UA-43422603-17',
	),
	'foundnowtext.org'=>array(
		'name'=>'Found Now Text',
		'ga_code'=>'UA-43422603-18',
	),
	'heyscrapit.com'=>array(
		'name'=>'Hey Scrap It',
		'ga_code'=>'UA-43422603-19',
	),
	'houstonfeature.com'=>array(
		'name'=>'Houston Feature',
		'ga_code'=>'UA-43422603-20',
	),
	'lajunkcar.com'=>array(
		'name'=>'LA Junk Car',
		'ga_code'=>'UA-43422603-21',
	),
	'lifthouseholdings.com'=>array(
		'name'=>'Lift House Holdings',
		'ga_code'=>'UA-43422603-22',
	),
	'lifthouselab.com'=>array(
		'name'=>'Lift House Lab',
		'ga_code'=>'UA-43422603-23',
	),
	'likemyhouse.com'=>array(
		'name'=>'Like My House',
		'ga_code'=>'UA-43422603-24',
	),
	'losangelesfeature.com'=>array(
		'name'=>'Los Angeles Feature',
		'ga_code'=>'UA-43422603-25',
	),
	'miamifeature.com'=>array(
		'name'=>'Miami Feature',
		'ga_code'=>'UA-43422603-26',
	),
	'myquickid.com'=>array(
		'name'=>'My Quick ID',
		'ga_code'=>'UA-43422603-27',
	),
	'newyorkfeature.com'=>array(
		'name'=>'New York Feature',
		'ga_code'=>'UA-43422603-28',
	),
	'pleasetakemycar.com'=>array(
		'name'=>'Please Take My Car',
		'ga_code'=>'UA-43422603-29',
	),
	'pleasetowmycar.com'=>array(
		'name'=>'Please Tow My Car',
		'ga_code'=>'UA-43422603-30',
	),
	'polltronic.com'=>array(
		'name'=>'Poll Tronic',
		'ga_code'=>'UA-43422603-31',
	),
	'promptpayprocessing.com'=>array(
		'name'=>'Prompt Pay Processing',
		'ga_code'=>'UA-43422603-32',
	),
	'quiztronic.biz'=>array(
		'name'=>'Quiz Tronic',
		'ga_code'=>'UA-43422603-33',
	),
	'quiztronic.com'=>array(
		'name'=>'Quiz Tronic',
		'ga_code'=>'UA-43422603-34',
	),
	'quiztronic.net'=>array(
		'name'=>'Quiz Tronic',
		'ga_code'=>'UA-43422603-35',
	),
	'quiztronic.org'=>array(
		'name'=>'Quiz Tronic',
		'ga_code'=>'UA-43422603-36',
	),
	'quotecashbuy.com'=>array(
		'name'=>'Quote Cash Buy',
		'ga_code'=>'UA-43422603-37',
	),
	'quotecashtow.com'=>array(
		'name'=>'Quote Cash Tow',
		'ga_code'=>'UA-43422603-38',
	),
	'sajunkcar.com'=>array(
		'name'=>'SA Junk Car',
		'ga_code'=>'UA-43422603-39',
	),
	'sanantoniofeature.com'=>array(
		'name'=>'San Antonio Feature',
		'ga_code'=>'UA-43422603-40',
	),
	'stoneaesthetics.com'=>array(
		'name'=>'Stone Aesthetics',
		'ga_code'=>'UA-43422603-41',
	),
	'tablequick.com'=>array(
		'name'=>'Table Quick',
		'ga_code'=>'UA-43422603-42',
	),
	'usafeature.com'=>array(
		'name'=>'USA Feature',
		'ga_code'=>'UA-43422603-43',
	),
	'valuemyautomobile.com'=>array(
		'name'=>'Value My Automobile',
		'ga_code'=>'UA-43422603-44',
	),
	'vancouverfeature.com'=>array(
		'name'=>'Vancouver Feature',
		'ga_code'=>'UA-43422603-45',
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
	$config['domain']=$site_name_key;
}
else
{
	$config['site_name']=$config['base_url'];
	$config['ga_code']=FALSE;
	$config['domain']='';
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
	'send_to'=>'mike.lifthousedesign@gmail.com',
);

/* End of file app.php */
/* Location: ./application/config/app.php */