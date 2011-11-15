<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Time extends CI_Controller {

	public function index()
	{
    
    $data['tahun'] = $this->Ukp4Model->TimeYears();
    $data['bodyi'] = $this->Ukp4Model->Time();
		$this->load->view('v_time',$data);
	}
  
}