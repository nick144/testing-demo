<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CallCache  {
   
    public function __construct($config = array())
	{
                $ci = &get_instance();
                $ci->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file')); 
	}
        
        
}