<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C__category extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		get_breadcrumb();	
		$this->load->model('M__app');
		access(1);
	}

	public function index()
	{
		$data['title']       ="Kategori";
		$data['active']      ="category";
		$data['active_open'] ="master";
		$data['all']         =$this->M__app->getdata('category')->result();
		$data['content']     ="category/index.php";

		$this->breadcrumb->append_crumb('Kategori', site_url('category.aspx'));
		$this->load->view('backend/template.php',$data);	
	}

	public function add()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('category', 'category', 'trim|required|max_length[30]');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->session->set_flashdata('error','Data Gagal Di Validasi, Silahkan Cek Data Lagi!');
			redirect('category.aspx');
		} 
		else 
		{
			$data=array(
				"category" =>$this->input->post('category'),
				"state"    =>1,
			);
			$this->M__app->saved('category',$data);

			$this->session->set_flashdata('success','Data Kategori <strong>'.$this->input->post('category').'</strong> Berhasil Di Simpan');
			redirect('category.aspx');
		}
	}

	public function view_update()
	{
		$id          =$this->input->post('id');
		$get         =$this->M__app->gradeone('category','id_category',$id)->row_array();
		$data['get'] =$get;

		$this->load->view('backend/category/edit.php', $data);
	}

	public function update($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('category', 'category', 'trim|required|max_length[30]');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->session->set_flashdata('error','Data Gagal Di Validasi, Silahkan Cek Data Lagi!');
			redirect('category.aspx');
		} 
		else 
		{
			$data=array(
				"category"=>$this->input->post('category'),
			);
			$this->M__app->update('category',$data,'id_category',$id);

			$this->session->set_flashdata('success','Data Kategori Berhasil Di Perbarui');
			redirect('category.aspx');
		}
	}

	public function update_state()
	{
		$total=$this->input->post('id');
		if($this->input->post('active'))
		{
			$state=1;
		}
		else
		{
			$state=0;
		}

		for ($i=0; $i < count($total); $i++) 
		{ 
			$data=array(
				"state"=>$state,
			);
			$this->M__app->update('category',$data,'id_category',$total[$i]);
		}
		
		$this->session->set_flashdata('success','Data Kategori Berhasil Di Perbarui');
		redirect('category.aspx');
	}
}

/* End of file  */
/* Location: ./application/controllers/ */