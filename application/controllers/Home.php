<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_home');
        $this->load->model('Model_portfolio');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->all_setting();
		$data['page_home'] = $this->Model_common->all_page_home();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['all_news'] = $this->Model_common->all_news();
		$data['all_news_category'] = $this->Model_common->all_news_category();

		$data['sliders'] = $this->Model_home->all_slider();
		$data['services'] = $this->Model_home->all_service();
		$data['features'] = $this->Model_home->all_feature();
		$data['why_choose'] = $this->Model_home->all_why_choose();
		$data['team_members'] = $this->Model_home->all_team_member();
		$data['testimonials'] = $this->Model_home->all_testimonial();		
		$data['clients'] = $this->Model_home->all_client();
		$data['pricing_table'] = $this->Model_home->all_pricing_table();
		$data['home_faq'] = $this->Model_home->all_faq_home();

		$data['portfolio_category'] = $this->Model_portfolio->get_portfolio_category();
		$data['portfolio'] = $this->Model_portfolio->get_portfolio_data();

		$data['portfolio_footer'] = $this->Model_portfolio->get_portfolio_data();

		$this->load->view('view_header',$data);
		$this->load->view('view_home',$data);
		$this->load->view('view_footer',$data);
	}

	
}
