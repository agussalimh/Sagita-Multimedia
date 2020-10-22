<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C__page extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		get_breadcrumb();	
		$this->load->model('M__app');
		access(1);
	}

	public function index($active=1)
	{
		$data['title']       ="Setting Halaman";
		$data['active']      ="page";
		$data['tabActive']   =$active;
		$data['active_open'] ="setting";
		$data['get']         =$this->M__app->getdata('page')->row_array();
		$data['content']     ="page/index.php";

		$this->breadcrumb->append_crumb('Setting Halaman', site_url('page.aspx'));

		$this->load->view('backend/template.php',$data);	
	}

	public function updatebuy()
	{
		
			$data=array(
				"how_to_buy"=>$this->input->post('how'),
			);
			$this->M__app->update_setting('page',$data);
			$this->session->set_flashdata('success','Data Halaman Berhasil Di Perbarui');
			redirect('page.aspx');
	}

	public function updateabout()
	{
		
			$data=array(
				"about_us"=>$this->input->post('about'),
			);
			$this->M__app->update_setting('page',$data);
			$this->session->set_flashdata('success','Data Halaman Berhasil Di Perbarui');
			redirect('page.aspx/2');
	}
}

/* End of file  */
/* Location: ./application/controllers/ */