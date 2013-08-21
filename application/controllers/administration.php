<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administration extends App_Controller
{
	public $nav=array();

	protected $layout='layouts/administration';

	protected $authenticate=array('administrator');

	protected $authentication_redirect='administration/log_in';

	public function __construct()
	{
		parent::__construct();

		$this->css=array('reset.css','administration.css');
		//$this->js[]='pages/administration.js';

		$this->_load_modules();

		$this->data['nav']=$this->nav;
	}

	/**
	 * Instantiates all the admin modules
	 */
	protected function _load_modules()
	{
		$this->load->library('modules');

		foreach($this->modules->get_modules('admin') as $admin_module)
		{
			$module=$this->modules->get_instance($admin_module,'admin');
		}
	}

	/**
	 * Allows the module to access protected and private members of the controller
	 */
	public function _module_get($name)
	{
		return $this->$name;
	}

	/**
	 * Allows the module to set protected and private members of the controller
	 */
	public function _module_set($name,$value)
	{
		$this->$name=$value;
	}

	/**
	 * Allows the module to call protected and private methods of the controller
	 */
	public function _module_call($method,$args)
	{
		call_user_func_array(array($this,$method),$args);
	}

	public function index(){}

	/**
	 * Loads the specified module and executes it
	 */
	public function module()
	{
		$this->view=FALSE;
		$args=func_get_args();

		if(count($args)>0)
		{
			if(count($args)==1)
			{
				$module_name=array_shift($args);
				$method='index';
				$module_args=array();
			}
			else
			{
				$module_name=array_shift($args);
				$method=array_shift($args);
				$module_args=$args;
			}

			$this->load->library('modules');
			$module=$this->modules->get_instance($module_name,'admin');
			$this->view=$method;

			@call_user_func_array(array($module,$method),$module_args);

			$this->data=array_merge_recursive($this->data,$module->data);
			$this->js=array_merge_recursive($this->js,$module->js);
			$this->css=array_merge_recursive($this->css,$module->css);
		}
	}

	public function log_in()
	{
		$this->authenticate=FALSE;

		if($this->input->post())
		{
			if($this->user->log_in())
			{
				redirect('administration');
			}
		}
	}

	public function log_out()
	{
		$this->authenticate=FALSE;
		
		$this->user->log_out();

		redirect('administration/log_in');
	}
}

/* End of file administration.php */
/* Location: ./application/controllers/administration/administration.php */