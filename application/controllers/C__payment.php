<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C__payment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		get_breadcrumb();	
		$this->load->model('M__app');
		access(1);
	}

	public function index()
	{
		$data['title']       ="Data Pembayaran";
		$data['active']      ="pay";
		$data['active_open'] ="master";
		$data['all']         =$this->M__app->getdatapayment()->result();
		$data['bank']        =$this->M__app->gradeone('bank','state_bank',1)->result();
		$data['content']     ="pay/index.php";

		$this->breadcrumb->append_crumb('Data Pembayaran', site_url('pay.aspx'));

		$this->load->view('backend/template.php',$data);	
	}

	public function add()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('bank', 'bank', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('number', 'number', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('name', 'name', 'trim|required|max_length[100]');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->session->set_flashdata('error','Data Gagal Di Validasi, Silahkan Cek Data Lagi!');
			redirect('pay.aspx');
		} 
		else 
		{
			$data=array(
				"id_bank" =>$this->input->post('bank'),
				"number"  =>$this->input->post('number'),
				"name"    =>strtoupper($this->input->post('name')),
				"state"   =>1,
			);
			$this->M__app->saved('payment',$data);
			$this->session->set_flashdata('success','Data Data Pembayaran Berhasil Di Simpan');
			redirect('pay.aspx');
		}
	}

	public function view_update()
	{
		$id           =$this->input->post('id');
		$get          =$this->M__app->gradeone('payment','id_payment',$id)->row_array();
		$data['bank'] =$this->M__app->gradeone('bank','state_bank',1)->result();
		$data['get']  =$get;
		$this->load->view('backend/pay/edit.php', $data);
	}

	public function update($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('bank', 'bank', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('number', 'number', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('name', 'name', 'trim|required|max_length[100]');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->session->set_flashdata('error','Data Gagal Di Validasi, Silahkan Cek Data Lagi!');
			redirect('pay.aspx');
		} 
		else 
		{
			$data=array(
				"id_bank" =>$this->input->post('bank'),
				"number"  =>$this->input->post('number'),
				"name"    =>strtoupper($this->input->post('name')),
			);
			$this->M__app->update('payment',$data,'id_payment',$id);
			$this->session->set_flashdata('success','Data Data Pembayaran Berhasil Di Perbarui');
			redirect('pay.aspx');
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
			$this->M__app->update('payment',$data,'id_payment',$total[$i]);
		}
		
		$this->session->set_flashdata('success','Data Data Pembayaran Berhasil Di Perbarui');
		redirect('pay.aspx');
	}
}

/* End of file  */
/* Location: ./application/controllers/ */