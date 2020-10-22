<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C__bank extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		get_breadcrumb();
		$this->load->model('M__app');
		access(1);
	}

	public function index()
	{
		$data['title']       ="Bank";
		$data['active']      ="bank";
		$data['active_open'] ="master";
		$data['all']         =$this->M__app->getdata('bank')->result();
		$data['content']     ="bank/index.php";

		$this->breadcrumb->append_crumb('Bank', site_url('bank.aspx'));

		$this->load->view('backend/template.php',$data);
	}
	
	public function add()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('bank', 'bank', 'trim|required|max_length[100]');

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Data Gagal Di Validasi, Silahkan Cek Data Lagi!');
			redirect('bank.aspx');
		}
		else
		{
			$data=array(
				"name_bank"  =>$this->input->post('bank'),
				"logo_bank"  =>compress_image('logo','Logo','assets/images/bank/'),
				"state_bank" =>1,
			);
			$this->M__app->saved('bank',$data);

			$this->session->set_flashdata('success','Data Bank <strong>'.$this->input->post('bank').'</strong> Berhasil Di Simpan');
			redirect('bank.aspx');
		}
	}

	public function view_update()
	{
		$id          =$this->input->post('id');
		$get         =$this->M__app->gradeone('bank','id_bank',$id)->row_array();
		$data['get'] =$get;

		$this->load->view('backend/bank/edit.php', $data);
	}

	public function update($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('bank', 'bank', 'trim|required|max_length[100]');

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Data Gagal Di Validasi, Silahkan Cek Data Lagi!');
			redirect('bank.aspx');
		}
		else
		{
			$get=$this->M__app->gradeone('bank','id_bank',$id)->row_array();

			if($_FILES['logo']['name']=="")
			{
				$picture=$get['logo_bank'];
			}
			else
			{
				$picture=compress_image('logo','Logo','assets/images/bank/');
				unlink('assets/images/bank/'.$get['logo_bank']);
			}

			$data=array(
				"name_bank" =>$this->input->post('bank'),
				"logo_bank" =>$picture,
			);
			$this->M__app->update('bank',$data,'id_bank',$id);

			$this->session->set_flashdata('success','Data Bank Berhasil Di Perbarui');
			redirect('bank.aspx');
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
				"state_bank"=>$state,
			);
			$this->M__app->update('bank',$data,'id_bank',$total[$i]);
		}

		$this->session->set_flashdata('success','Data Bank Berhasil Di Perbarui');
		redirect('bank.aspx');
	}
}

/* End of file  */
/* Location: ./application/controllers/ */
