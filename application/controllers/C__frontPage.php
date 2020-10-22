<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C__frontPage extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();

		$config['tag_open']  = '<ul class="breadcrumb" style="border:0px solid #FFF;margin-left:70px;">';
		$config['tag_close'] = '</ul>';
		$config['li_open']   = '<li>';
		$config['li_close']  = '</li>';
		$config['divider']   = '<span class="divider"> &raquo; </span>';
		$this->breadcrumb->initialize($config);

		$this->load->model('M__app');
		$this->load->library(array('pagination','cart','form_validation'));
	}

	public function testimony()
	{
		$data['title']     ="Testimoni | Beranda";
		$data['active']    ="page";
		$data['content']   ='page/testimoni.php';
		$data['category']  =$this->M__app->gradeone('category','state',1)->result();
		$data['bank']      =$this->M__app->getdatapaymentfront()->result();
		$data['testimony'] =$this->M__app->getTestimoni(0)->result();
		$data['num']       =$this->M__app->gradeone('testimoni','state',1)->num_rows();

		$this->breadcrumb->append_crumb('Beranda', site_url());
		$this->breadcrumb->append_crumb('Testimoni', site_url());

		$this->load->view('frontend/template',$data);
	}

	public function moreTestimony()
	{
		$offset=$this->input->post('offset');

		$data['offset']    =$offset;
		$data['testimony'] =$this->M__app->getTestimoni($offset)->result();
		$data['num']       =$this->M__app->getTestimoni($offset+10)->num_rows();

		$this->load->view('frontend/page/moreTestimony.php', $data);
	}

	public function submitTestimony()
	{
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('testimony', 'testimony', 'trim|required');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->session->set_flashdata('error','Cek Kembali Data Anda, Data Gagal Di Simpan!');
			redirect('testimony.aspx');
		} 
		else 
		{
			$data=array(
				"email"     =>filter($this->input->post('email')),
				"name"      =>filter(strtoupper($this->input->post('name'))),
				"time"      =>date('Y-m-d H:i:s'),
				"testimony" =>filter($this->input->post('testimony')),
				"state"     =>2,
			);
			$this->M__app->saved('testimoni',$data);

			$this->session->set_flashdata('success','Testimoni Berhasil Di Tambahkan, Pihak Toko Akan Melakukan Validasi Pada Testimoni Anda Sebelum Di Tampilkan');
			redirect('testimony.aspx');
		}
	}

	public function howtobuy()
	{
		$data['title']    ="Cara Pembelian";
		$data['active']   ="page";
		$data['content']  ='page/howtobuy.php';
		$data['category'] =$this->M__app->gradeone('category','state',1)->result();
		$data['bank']     =$this->M__app->getdatapaymentfront()->result();
		$data['page']     =$this->M__app->getdata('page')->row_array();

		$this->breadcrumb->append_crumb('Beranda', site_url());
		$this->breadcrumb->append_crumb('Cara Pembelian', site_url());

		$this->load->view('frontend/template',$data);
	}

	public function about()
	{
		$data['title']    ="Tentang Kami | Beranda";
		$data['active']   ="page";
		$data['content']  ='page/aboutus.php';
		$data['category'] =$this->M__app->gradeone('category','state',1)->result();
		$data['bank']     =$this->M__app->getdatapaymentfront()->result();
		$data['page']     =$this->M__app->getdata('page')->row_array();

		$this->breadcrumb->append_crumb('Beranda', site_url());
		$this->breadcrumb->append_crumb('Tentang Kami', site_url());

		$this->load->view('frontend/template',$data);
	}

	public function pricelist($off=0)
	{
		$data['title']    ="Daftar Harga | Beranda";
		$data['active']   ="pricelist";
		$data['content']  ='page/pricelist.php';
		$data['all']      =$this->M__app->getdatapage('product',$off)->result();
		$jumlah           =$this->M__app->gradeone('product','state_product',1)->num_rows();
		$data['category'] =$this->M__app->gradeone('category','state',1)->result();
		$data['bank']     =$this->M__app->getdatapaymentfront()->result();
		$data['page']     =halaman($jumlah,'pricelist.aspx',2);

		$this->breadcrumb->append_crumb('Beranda', site_url());
		$this->breadcrumb->append_crumb('Daftar Harga', site_url());

		$this->load->view('frontend/template',$data);
	}

	public function ongkir()
	{
		$data['title']    ="Cek Ongkir | Beranda";
		$data['active']   ="ongkir";
		$data['content']  ='page/ongkir.php';
		$data['category'] =$this->M__app->gradeone('category','state',1)->result();
		$data['bank']     =$this->M__app->getdatapaymentfront()->result();

		$this->breadcrumb->append_crumb('Beranda', site_url());
		$this->breadcrumb->append_crumb('Cek Ongkir', site_url());

		$this->load->view('frontend/template',$data);
	}
}
