<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C__user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		get_breadcrumb();	
		$this->load->model('M__app');
		access(1);
	}

	public function index()
	{
		$data['title']       ="User";
		$data['active']      ="user";
		$data['active_open'] ="user";
		$data['all']         =$this->M__app->getdata_user('user')->result();
		$data['content']     ="user/index.php";

		$this->breadcrumb->append_crumb('User', site_url('user.aspx'));
		$this->load->view('backend/template.php',$data);	
	}

	public function add()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('username', 'username', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('level', 'level', 'trim|required');

		$get=$this->M__app->gradeone('user','username_user',strtolower($this->input->post('username')))->num_rows();
		if($this->input->post('password')!=$this->input->post('confirm'))
		{
			$this->session->set_flashdata('error','Konfirmasi Password Tidak Sama!');
			redirect('user.aspx');
		}
		elseif($this->form_validation->run() == FALSE) 
		{
			$this->session->set_flashdata('error','Data Gagal Di Validasi, Silahkan Cek Data Lagi!');
			redirect('user.aspx');
		}
		elseif($get>0)
		{
			$this->session->set_flashdata('error','Username Sudah Digunakan!');
			redirect('user.aspx');
		}
		else 
		{
			$data=array(
				"name_user"     =>strtoupper($this->input->post('name')),
				"username_user" =>strtolower($this->input->post('username')),
				"password_user" =>md5($this->input->post('password')),
				"access_user"   =>$this->input->post('level'),
				"state_user"    =>1,
			);
			$this->M__app->saved('user',$data);
			$this->session->set_flashdata('success','Data User <strong>'.$this->input->post('name').'</strong> Berhasil Di Simpan');
			redirect('user.aspx');
		}
	}

	public function view_update()
	{
		$id          =$this->input->post('id');
		$get         =$this->M__app->gradeone('user','id_user',$id)->row_array();
		$data['get'] =$get;
		$this->load->view('backend/user/edit.php', $data);
	}

	public function update($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('username', 'username', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('level', 'level', 'trim|required');
		if ($this->form_validation->run() == FALSE) 
		{
			$this->session->set_flashdata('error','Data Gagal Di Validasi, Silahkan Cek Data Lagi!');
			redirect('user.aspx');
		} 
		else 
		{
			$get=$this->M__app->gradeone('user','id_user',$id)->row_array();
			if($get['username_user']!=strtolower($this->input->post('username')))
			{
				$to=$this->M__app->gradeone('user','username_user',$this->input->post('username'))->num_rows();
				if($to>0)
				{
					$this->session->set_flashdata('error','Username Sudah Digunakan!');
					redirect('user.aspx');
				}

			}

			if(!empty($this->input->post('password_update')))
			{
				$password=md5($this->input->post('password_update'));
			}
			else
			{
				$password=$get['password_user'];
			}

			$data=array(
				"name_user"     =>strtoupper($this->input->post('name')),
				"username_user" =>strtolower($this->input->post('username')),
				"password_user" =>$password,
				"access_user"   =>$this->input->post('level'),
			);
			$this->M__app->update('user',$data,'id_user',$id);
			$this->session->set_flashdata('success','Data User Berhasil Di Perbarui');
			redirect('user.aspx');
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
				"state_user"=>$state,
			);
			$this->M__app->update('user',$data,'id_user',$total[$i]);
		}
		$this->session->set_flashdata('success','Data User Berhasil Di Perbarui');
		redirect('user.aspx');
	}
}

/* End of file  */
/* Location: ./application/controllers/ */