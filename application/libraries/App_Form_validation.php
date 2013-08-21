<?php

	class App_Form_validation extends CI_Form_validation
	{
		public function set_error($message,$field=FALSE)
		{
			if($field===FALSE)
				$this->_error_array[]=$message;
			else
			{
				$this->_error_array[$field]=$message;
				$this->_field_data[$field]['error']=$message;
			}
		}
		
		public function get_errors()
		{
			return $this->_error_array;
		}
	}