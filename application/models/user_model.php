<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class User_model extends App_Model
	{
		public $_table='user';

		protected $protected_attributes=array('id');
		
		public $has_many=array();
		
		public $belongs_to=array();
		
		public $after_get=array('after_get');

		public $before_create=array('_filter_data','created_at');

		public $before_update=array('_filter_data','updated_at');

		public $before_delete=array('before_delete');

	/*-----------------------------------------------------------------------*/

		public $logged_in=FALSE;
		
		public $data;
		
		public function __construct()
		{
			parent::__construct();
			
			$user=$this->session->userdata('user');
			$this->logged_in=!empty($user);
			
			if($this->logged_in)
				$this->data=$user;
		}

		protected function after_get($data)
		{
			if(!empty($data))
			{
				$query=$this->_database->get_where('role',array(
					'user_id'=>$data['id'],
				));

				$data['roles']=array();
				foreach($query->result_array() as $row)
				{
					$data['roles'][]=$row['role'];
				}
			}

			return $data;
		}

		public function before_delete($id)
		{
			$this->_database->delete('role',array(
				'user_id'=>$id,
			));
		}
		
		public function log_in()
		{
			$rules=array(
				array(
					'field'=>'email',
					'label'=>'E-mail',
					'rules'=>'required|max_length[64]|valid_email',
				),
				array(
					'field'=>'password',
					'label'=>'Password',
					'rules'=>'required|sha1',
				),
			);

			$this->load->library('form_validation');
			$this->form_validation->set_rules($rules);

			if($this->form_validation->run()!==FALSE)
			{
				$user=$this
					->get_by(array(
						'email'=>$this->input->post('email'),
						'password'=>$this->input->post('password'),
					));
				
				if(empty($user))
				{
					$this->form_validation->set_error('The e-mail address or password you entered was incorrect. Please try again.');
					return FALSE;
				}
				
				$this->session->set_userdata('user',$user);

				$this->update($user['id'],array(
					'last_login'=>date('Y-m-d H:i:s'),
				));

				return TRUE;
			}
			
			return FALSE;
		}
		
		public function log_out()
		{
			$this->session->unset_userdata('user');

			return TRUE;
		}

		public function has_role($role)
		{
			if($this->logged_in)
			{
				foreach($this->data['roles'] as $user_role)
				{
					if($role==$user_role)
						return TRUE;
				}
			}

			return FALSE;
		}

		/*public function has_role($id,$role)
		{
			$query=$this->_database->get_where('role',array(
				'user_id'=>$id,
				'role'=>$role,
			));

			if($query->row_array())
				return TRUE;
			else
				return FALSE;
		}*/

		public function save_roles($id,$roles)
		{
			$this->_database->trans_start();
			$this->_database->delete('role',array(
				'user_id'=>$id,
			));

			foreach($roles as $role)
			{
				$this->_database->insert('role',array(
					'user_id'=>$id,
					'role'=>$role,
				));
			}
			$this->_database->trans_complete();
			return $this->_database->trans_status();
		}

		public function get_all_roles()
		{
			return array(
				'administrator'=>'User may log in to the back-end of the website and make changes to the front-end.',
			);
		}
	}
	
/* End of file user_model.php */
/* Location: ./application/models/user_model.php */