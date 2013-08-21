<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notifications_admin_module extends Admin_module
{
	public $name='Notifications';

	public function __construct($CI)
	{
		parent::__construct($CI);

		$this->load->model('notification_model','notification');
	}

	public function index()
	{
		// Load dataTables
		$this->js[]=array(
			'file'=>'js/jquery.dataTables.min.js',
			'type'=>'plugins/datatables',
		);
		$this->css[]=array(
			'file'=>'css/jquery.dataTables.css',
			'type'=>'plugins/datatables',
		);
		$this->js[]='pages/administration-notifications-index.js';

		$this->data['entries']=$this->notification->get_all();
	}

	public function configure($id)
	{
		if($data=$this->input->post())
		{
			$data['email_enabled']=isset($data['email_enabled']) ? 1 : 0;
			$data['sms_enabled']=isset($data['sms_enabled']) ? 1 : 0;

			if($this->notification->update($data['id'],$data))
			{
				$this->set_notification('The notification was successfully saved.');

				redirect('administration/notifications');
			}
		}

		$this->js[]='pages/administration-notifications-configure.js';

		$this->data['entry']=$this->notification->get($id);
	}
}