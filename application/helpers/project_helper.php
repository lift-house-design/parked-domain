<?php

if(!function_exists('trace'))
{
	function trace()
	{
		$backtrace=debug_backtrace();
		
		echo '<table width="100%">';
		
		echo '<tr>';
		echo 	'<th>Line No.</th>';
		echo 	'<th>Filename</th>';
		echo 	'<th>Method/Function</th>';
		echo 	'<th>Args</th>';
		echo '</tr>';
		
		foreach($backtrace as $trace)
		{
			echo '<tr>';
			echo 	'<td>'.$trace['line'].'</td>';
			echo 	'<td>'.$trace['file'].'</td>';
			echo 	'<td>'.( isset($trace['class']) ? $trace['class'].'::'.$trace['function'] : $trace['function'] ).'</td>';
			echo 	'<td>'.count($trace['args']).'</td>';
			echo '</tr>';
		}
		
		echo '</table>';
	}
}

if(!function_exists('states_array'))
{
	function states_array($merge_with=array())
	{
		$states_array=array(
			'AL'=>'Alabama',  
			'AK'=>'Alaska',  
			'AZ'=>'Arizona',  
			'AR'=>'Arkansas',  
			'CA'=>'California',  
			'CO'=>'Colorado',  
			'CT'=>'Connecticut',  
			'DE'=>'Delaware',  
			'DC'=>'District Of Columbia',  
			'FL'=>'Florida',  
			'GA'=>'Georgia',  
			'HI'=>'Hawaii',  
			'ID'=>'Idaho',  
			'IL'=>'Illinois',  
			'IN'=>'Indiana',  
			'IA'=>'Iowa',  
			'KS'=>'Kansas',  
			'KY'=>'Kentucky',  
			'LA'=>'Louisiana',  
			'ME'=>'Maine',  
			'MD'=>'Maryland',  
			'MA'=>'Massachusetts',  
			'MI'=>'Michigan',  
			'MN'=>'Minnesota',  
			'MS'=>'Mississippi',  
			'MO'=>'Missouri',  
			'MT'=>'Montana',
			'NE'=>'Nebraska',
			'NV'=>'Nevada',
			'NH'=>'New Hampshire',
			'NJ'=>'New Jersey',
			'NM'=>'New Mexico',
			'NY'=>'New York',
			'NC'=>'North Carolina',
			'ND'=>'North Dakota',
			'OH'=>'Ohio',  
			'OK'=>'Oklahoma',  
			'OR'=>'Oregon',  
			'PA'=>'Pennsylvania',  
			'RI'=>'Rhode Island',  
			'SC'=>'South Carolina',  
			'SD'=>'South Dakota',
			'TN'=>'Tennessee',  
			'TX'=>'Texas',  
			'UT'=>'Utah',  
			'VT'=>'Vermont',  
			'VA'=>'Virginia',  
			'WA'=>'Washington',  
			'WV'=>'West Virginia',  
			'WI'=>'Wisconsin',  
			'WY'=>'Wyoming',
		);
		
		return array_merge($merge_with,$states_array);
	}
}

if(!function_exists('send_email'))
{
	function send_email($subject,$message,$data,$to)
	{
		static $email;

		$CI=get_instance();
		$config=$CI->config->item('email_notifications');

		if(isset($email))
		{
			$email->clear();
		}
		else
		{
			$CI->load->library('email');

			// Set a reference to the email library; this will also tell
			// this function to skip initialization on the next call
			$email=$CI->email;

			if(!empty($config['config']))
				$email->initialize($config['config']);
		}

		foreach($data as $k=>$v)
		{
			$subject=str_replace('{'.$k.'}',$v,$subject);
			$message=str_replace('{'.$k.'}',$v,$message);
		}

		$email->from($config['sender_email'],$config['sender_name']);
		$email->to($to);
		$email->subject($subject);

		if($config['config']['mailtype']=='html')
			$message=nl2br($message);

		$email->message($message);

		return $email->send();
	}
}

if(!function_exists('send_sms'))
{
	function send_sms($message,$data,$to)
	{
		$CI=get_instance();
		$config=$CI->config->item('sms_notifications');
		$CI->load->library('twilio');

		foreach($data as $k=>$v)
		{
			$message=str_replace('{'.$k.'}',$v,$message);
		}

		$response=$CI->twilio->sms($config['config']['number'],$to,$message);

		return $response->IsError===FALSE;
	}
}

if(!function_exists('get_bare_hostname'))
{
	function get_bare_hostname($str)
	{
		$regexp='/(https?\:\/\/)?(www\.)?(.+)/';
		if(preg_match($regexp,$str,$matches))
			return $matches[3]; // $host should be hostname without http:// or www.
		else
			return FALSE;
	}
}

/* End of file project_helper.php */
/* Location: ./application/helpers/project_helper.php */