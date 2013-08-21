<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends App_Controller
{
	public function index()
	{
		$rules=array(
			array(
				'field'=>'email',
				'label'=>'E-mail',
				'rules'=>'trim|required|valid_email',
			),
			array(
				'field'=>'message',
				'label'=>'Message',
				'rules'=>'trim|required',
			),
		);

		$this->load->library('form_validation');
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run()!==FALSE)
		{
			// Check CAPTCHA
			require('assets/plugins/securimage/securimage.php');
			$captcha=new Securimage();

			if($captcha->check($this->input->post('captcha')))
			{
				$contact_form_config=$this->config->item('contact_form'); 

				$notification_data=array(
					'email'=>$this->input->post('email'),
					'message'=>$this->input->post('message'),
					'timestamp'=>date('Y-m-d H:i:s'),
					'site_name'=>$this->config->item('site_name'),
				);
				if($this->notification->send('contact_form',$notification_data,$contact_form_config['send_to'],FALSE))
				{
					$this->set_notification('Your message was successfully sent. We will be in touch!');
				}
				else
				{
					$this->form_validation->set_error('There was a problem sending your message. Please try again later.');
				}
			}
			else
			{
				$this->form_validation->set_error('You incorrectly entered the CAPTCHA. Please try again.');
			}
		}

		$domain=get_bare_hostname($_SERVER['HTTP_HOST']);

		if(file_exists(APPPATH.'/views/site/content/'.$domain.'.php'))
			$this->asides['well_content']='site/content/'.$domain.'.php';
		else
			$this->asides['well_content']='site/content/default.php';
	}

	public function captcha()
	{
		$this->layout=FALSE;
		$this->view=FALSE;
		require('assets/plugins/securimage/securimage_show.php');
	}

	public function test()
	{
		$this->layout=FALSE;
		$this->view=FALSE;

		var_dump($this->config->item('base_url'));
	}

	public function authentication_error(){}
}

/* End of file site.php */
/* Location: ./application/controllers/site.php */