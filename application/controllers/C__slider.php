<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C__slider extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		get_breadcrumb();	
		$this->load->model('M__app');
		access(1);
	}

	public function index()
	{
		$data['title']       ="Setting Slider";
		$data['active']      ="slider";
		$data['active_open'] ="setting";
		$data['all']         =$this->M__app->getdata('slider')->result();
		$data['content']     ="slider/index.php";

		$this->breadcrumb->append_crumb('Setting Slider', site_url('slider.aspx'));
		$this->load->view('backend/template.php',$data);	
	}

	public function add()
	{
		$slider=compress_slider('slider','Slider');
		$data=array(
			"slider"=>$slider,
		);
		$this->M__app->saved('slider',$data);
		$this->session->set_flashdata('success','Data Slider Berhasil Di Tambahkan');
		redirect('slider.aspx');
	}

	public function delete()
	{
		$total   =$this->input->post('id');
		$picture =$this->input->post('picture');
		
		for ($i=0; $i < count($total); $i++) 
		{
			$this->db->where('id_slider',$total[$i]);
			$this->db->delete('shop_slider');
			unlink("uploads/".$picture[$i]);
		}
		$this->session->set_flashdata('success','Data Halaman Berhasil Di Hapus');
		redirect('slider.aspx');
	}
}

/* End of file  */
/* Location: ./application/controllers/ */