<?php

if(!function_exists('form_field'))
{
	function form_field($label, $name, $type='text', $params=array())
	{
		$CI=get_instance();

		if($type=='text')
			$type='input';

		if(is_array($params))
		{
			$params['id']=$name;
			$params['name']=$name;	
		}
		
		return $CI->load->view('asides/field',array(
			'label'=>$label,
			'name'=>$name,
			'type'=>$type,
			'params'=>$params,
		),TRUE);
	}
}