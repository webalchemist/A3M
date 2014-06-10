<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Static pages
 *
 * This controller is for the home page and any other top level static pages.
 * 
 * @package A3M
 * @subpackage Controllers
 */
class Home extends CI_Controller
{
	
	/**
	 * Constructor
	 */
	function __construct()
	{
		parent::__construct();
		
		// Load the necessary stuff...
		$this->load->helper(array('language', 'url', 'form', 'account/ssl'));
		$this->load->library(array('account/authentication', 'account/authorization'));
		$this->load->model('account/Account_model');
	}
	
	/**
	 * Home page
	 *
	 * This is the controller for the home page
	 */
	function index()
	{
		maintain_ssl();
		
		if ($this->authentication->is_signed_in())
		{
			$data['account'] = $this->Account_model->get_by_id($this->session->userdata('account_id'));
		}
		
		$data['content'] = $this->load->view('home', isset($data) ? $data : NULL, TRUE);
		$this->load->view('template', $data);
	}

}


/* End of file Home.php */
/* Location: ./system/application/controllers/Home.php */