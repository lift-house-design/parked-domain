<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Notification_model extends App_Model
	{
		public $_table='notification';

		protected $protected_attributes=array('id');
		
		public $has_many=array();
		
		public $belongs_to=array();
		
		public $after_get=array('_filter_data','after_get');

		public $before_update=array('_filter_data','updated_at');

		public $before_delete=array();

	/*-----------------------------------------------------------------------*/
		
		protected function after_get($data)
		{
			$data['vars']=json_decode($data['vars'],TRUE);

			return $data;
		}

		public function send($key,$data,$email=FALSE,$phone=FALSE)
		{
			$notification=$this->get_by(array(
				'key'=>$key,
			));

			if(!empty($notification))
			{
				$email_successful=TRUE;
				$sms_successful=TRUE;

				if($notification['email_enabled'] && $email)
				{
					$email_successful=send_email($notification['email_subject'],$notification['email_message'],$data,$email);
				}

				if($notification['sms_enabled'] && $phone)
				{
					$sms_successful=send_sms($notification['sms_message'],$data,$phone);
				}

				return $email_successful && $sms_successful;
			}

			return FALSE;
		}
	}
	
/* End of file notification_model.php */
/* Location: ./application/models/notification_model.php */