<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C__admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		get_breadcrumb();	
		$this->load->model('M__app');
	}

	public function index()
	{
		$tanggal=date('Y-m-d');
		$data['title']       ="Dashboard";
		$data['active']      ="dashboard";
		$data['active_open'] ="dashboard";
		$data['content']     ="dashboard/index.php";
		$data['product']     =$this->M__app->gradeone('product','state_product',1)->num_rows();
		$data['category']    =$this->M__app->gradeone('category','state',1)->num_rows();
		$data['transaction'] =$this->M__app->getdaytrans($tanggal)->num_rows();
		$data['user']        =$this->M__app->gradeone_not_in('user','state_user',1)->num_rows();

		$this->breadcrumb->append_crumb('Dashboard', site_url('myshop'));

		$this->load->view('backend/template.php',$data);	
	}

	public function out()
	{
		$this->session->unset_userdata('myAqua');
		unset($_SESSION['CIPTASHOP']['KCFINDER']);
		redirect('auth.aspx');
	}

	public function modal_user()
	{
		$this->load->view('backend/dashboard/user.php');
	}

	public function update_account()
	{
		$id       =getuser("id_user");
		$password =getuser("password_user");
		$get      =$this->M__app->gradeone('user','id_user',$id)->row_array();
		$username =filter($this->input->post('username'));
		
		if($get['username_user']!=strtolower($username))
		{
			$to=$this->M__app->gradeone('user','username_user',$username)->num_rows();

			if($to>0)
			{
				$this->session->set_flashdata('error','Username Sudah Digunakan!');
				redirect('myshop.aspx');
			}

		}

		if($this->input->post('password')=="*****")
		{
			$new_password=$password;
		}
		else
		{
			$new_password=md5($this->input->post('password'));
		}

		$data=array(
			"name_user"     =>strtoupper($this->input->post('name')),
			"username_user" =>$this->input->post('username'),
			"password_user" =>$new_password
		);

		$this->M__app->update('user',$data,'id_user',getuser('id_user'));
		$this->session->set_flashdata('success','Data Berhasil Di Perbarui');

		redirect('myshop.aspx');
	}
}

/* End of file  */
/* Location: ./application/controllers/ */