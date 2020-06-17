<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lang extends CI_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_portfolio');
    }

	public function index($ln)
	{

		if( !$ln ) {
			redirect($this->agent->referrer());
		}

    	$array = array(
            'language' => $ln
        );
        $this->session->set_userdata($array);
        
		redirect($this->agent->referrer());
	}
}