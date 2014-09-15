<?php
require_once 'application/controllers/base/base.php';
class admin extends base{
	public function __construct(){
		parent::__construct();
	}
	
	//ADMIN LOGIN
	public function index(){
		//CLEAR  ALL SESSION
		if($this->session->userdata('admin_logged_in')){
			redirect(site_url('admin/dashboard'));
		} else {
			$this->session->sess_destroy();
			$data['title'] = 'Admin Login | ';
			$this->defaultdisplay('admin/login',$data);
		}		
		
	}
	//ADMIN DASHBOARD
	public function dashboard(){
		if(!$this->session->userdata('admin_logged_in')){
			redirect(site_url('admin'));
		}
		$data['title'] = 'Dashboard | ';
		$this->defaultdisplay('admin/dashboard',$data);
	}

	////////////////////////////////////////////////////////////////////
	/////////////// ALL ABOUT PROCESSING ///////////////////////////////
	////////////////////////////////////////////////////////////////////

	public function login(){
		$email = $this->input->post('txtEmail');
		$password = md5($this->input->post('txtPassword'));
		
	}
}