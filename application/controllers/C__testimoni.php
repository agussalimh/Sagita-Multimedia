<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C__testimoni extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		get_breadcrumb();	
		$this->load->model('M__app');
		access(1);
	}

	public function index($off=0)
	{
		$this->load->library('pagination');
		$jumlah=$this->M__app->getdata('testimoni')->num_rows();
		$data['title']       ="Testimoni";
		$data['active']      ="testimoni";
		$data['active_open'] ="testimoni";
		$data['content']     ="testimoni/index.php";
		$data['all']         =$this->M__app->getTestimoni('testimoni',$off,0)->result();
		$data['page']        =halaman($jumlah,'testimoni.aspx',2,10);
		$data['off']         =$off;

		$this->breadcrumb->append_crumb('Testimoni', site_url('testimoni.aspx'));
		$this->load->view('backend/template.php',$data);	
	}

	public function view_update()
	{
		$id          =$this->input->post('id');
		$get         =$this->M__app->gradeone('testimoni','id_testimony',$id)->row_array();
		$data['get'] =$get;

		$this->load->view('backend/testimoni/edit.php', $data);
	}

	public function view_detail()
	{
		$id          =$this->input->post('id');
		$get         =$this->M__app->gradeone('testimoni','id_testimony',$id)->row_array();
		$data['get'] =$get;
		$this->load->view('backend/testimoni/detail.php', $data);
	}

	public function update($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('testimony', 'testimony', 'trim|required');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->session->set_flashdata('error','Cek Kembali Data Anda, Data Gagal Di Edit!');
			redirect('testimoni.aspx');
		} 
		else 
		{
			$data=array(
				"email"     =>filter($this->input->post('email')),
				"name"      =>filter(strtoupper($this->input->post('name'))),
				"testimony" =>$this->input->post('testimony'),
			);
			$this->M__app->update('testimoni',$data,'id_testimony',$id);

			$this->session->set_flashdata('success','Data Berhasil Di Perbarui');
			redirect('testimoni.aspx');
		}
	}

	public function update_state()
	{
		$total=$this->input->post('id');

		if($this->input->post('active'))
		{
			$state=1;
		}elseif($this->input->post('pending'))
		{
			$state=2;
		}
		else
		{
			for ($i=0; $i < count($total); $i++) 
			{ 
				$this->M__app->delete('testimoni','id_testimony',$total[$i]);
			}
		}

		if (!$this->input->post('nonactive')) 
		{
			for ($i=0; $i < count($total); $i++) 
			{ 
				$data=array(
					"state"=>$state,
				);
				$this->M__app->update('testimoni',$data,'id_testimony',$total[$i]);
			}
		}
		
		$this->session->set_flashdata('success','Data Testimoni Berhasil Di Perbarui');
		redirect('testimoni.aspx');
	}
}

/* End of file  */
/* Location: ./application/controllers/ */