`<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C__setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		get_breadcrumb();	
		$this->load->model('M__app');
		access(1);
	}

	public function index()
	{
		$data['title']       ="Setting Toko";
		$data['active']      ="shop";
		$data['active_open'] ="setting";
		$data['get']         =$this->M__app->getdata('setting')->row_array();
		$data['content']     ="setting/index.php";

		$this->breadcrumb->append_crumb('Setting Toko', site_url('setting.aspx'));
		$this->load->view('backend/template.php',$data);	
	}

	public function edit()
	{
		$data['title']       ="Setting Data Toko | Setting Toko";
		$data['active']      ="shop";
		$data['active_open'] ="setting";
		$data['get']         =$this->M__app->getdata('setting')->row_array();
		$data['content']     ="setting/edit.php";

		$this->breadcrumb->append_crumb('Setting Toko', site_url('setting.aspx'));
		$this->breadcrumb->append_crumb('Setting Data Toko', site_url('setting.aspx'));
		$this->load->view('backend/template.php',$data);	
	}

	public function edit_tambahan()
	{
		$data['title']       ="Setting Data Tambahan | Setting Toko";
		$data['active']      ="shop";
		$data['active_open'] ="setting";
		$data['provinsi']    =curlProv();
		$data['kabupaten']   =curlKab();
		$data['get']         =$this->M__app->gradeone('options','state','1')->result();
		$data['gett']        =$this->M__app->gradeone('options','state','2')->result();
		$data['content']     ="setting/edit_tambahan.php";

		$this->breadcrumb->append_crumb('Setting Data Toko', site_url('setting.aspx'));
		$this->breadcrumb->append_crumb('Setting Data Tambahan', site_url('setting.aspx'));
		$this->load->view('backend/template.php',$data);	
	}

	public function update()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('shortname', 'shortname', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('motto', 'motto', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('location', 'location', 'trim|required|max_length[120]');
		$this->form_validation->set_rules('manager', 'manager', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('propinsi', 'propinsi', 'trim|required');
		$this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->session->set_flashdata('error','Data Gagal Di Validasi, Silahkan Cek Data Lagi!');
			redirect('setting.aspx');
		} 
		else 
		{
			$get=$this->M__app->getdata('setting')->row_array();
			if($_FILES['logo']['name']=="")
			{
				$logo=$get['logo_shop'];
			}
			else
			{
				$logo=compress_logo('logo','Logo');
				unlink('uploads/'.$get['logo_shop']);
			}
			$data=array(
				"shortname_shop"        =>filter($this->input->post('shortname')),
				"longname_shop"         =>filter($this->input->post('longname')),
				"motto_shop"            =>filter($this->input->post('motto')),
				"location_shop"         =>filter($this->input->post('location')),
				"name_manage"           =>strtoupper(filter($this->input->post('manager'))),
				"bbm_contact"           =>filter($this->input->post('bbm')),
				"wa_contact"            =>filter($this->input->post('wa')),
				"phone_contact"         =>filter($this->input->post('phone')),
				"email_shop"            =>$this->input->post('email'),
				"propinsi_shop"         =>filter($this->input->post('propinsi')),
				"kabupaten_shop"        =>filter($this->input->post('kabupaten')),
				"logo_shop"             =>$logo,
				"pos"                   =>$this->input->post('pos'),
				"jne"                   =>$this->input->post('jne'),
				"tiki"                  =>$this->input->post('tiki'),
				"gratis_ongkir_wilayah" =>$this->input->post('gratis_ongkir_wilayah'),
				"cod_wilayah"           =>$this->input->post('cod_wilayah'),
				"facebook"              =>$this->input->post('facebook'),
				"twitter"               =>$this->input->post('twitter'),
				"google"                =>$this->input->post('google'),
				"instagram"             =>$this->input->post('instagram'),
				"youtube"               =>$this->input->post('youtube'),
			);

			$this->M__app->update_setting('setting',$data);
			$this->session->set_flashdata('success','Data Toko Berhasil Di Perbarui');
			redirect('edit_setting.aspx');
		}
	}

	public function update_tambahan()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('propinsi', 'propinsi', 'trim|required');
		$this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim|required');
		
		$jenis     =filter($this->input->post('jenis'));
		$kabupaten =filter($this->input->post('kabupaten'));
		$provinsi  =filter($this->input->post('propinsi'));

		$cek=$this->M__app->cek($jenis, $kabupaten, $provinsi)->num_rows();
		
		if($this->form_validation->run() == FALSE) 
		{
			$this->session->set_flashdata('error','Data Gagal Di Validasi, Silahkan Cek Data Lagi!');
			redirect('edit_setting_tambahan.aspx');
		} 
		elseif($cek>0)
		{
			$this->session->set_flashdata('error','Data Provinsi Dan Kabupaten Sudah Dimasukkan!');
			redirect('edit_setting_tambahan.aspx');
		}
		else 
		{
			$data=array(
				"id_provinsi" =>$provinsi,
				"id_kab"      =>$kabupaten,
				"state"       =>$jenis,
			);

			$this->M__app->saved('options',$data);
			$this->session->set_flashdata('success','Data tambahan toko berhasil ditambahkan');
			redirect('edit_setting_tambahan.aspx');
		}
	}

	public function delete_options()
	{
		$id=$this->input->post('id');

		for ($i=0; $i < count($id); $i++)
		{
			$this->M__app->delete('options','id',$id[$i]);
		}

		$this->session->set_flashdata('success','Data Tambahan Toko Berhasil Di Hapus');
		redirect('edit_setting_tambahan.aspx');
	}

	public function skin()
	{
		$data['title']       ="Skin Halaman";
		$data['active']      ="skin";
		$data['active_open'] ="setting";
		$data['skin']        =$this->M__app->getdata('skin')->result();
		$data['content']     ="skin/index.php";
		$this->breadcrumb->append_crumb('Skin Halaman', site_url('skin.aspx'));
		$this->load->view('backend/template-skin.php',$data);	
	}

	public function skin_update()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_skin', 'id_skin', 'trim|required|max_length[2]');
		if($this->form_validation->run() == FALSE) 
		{
			$this->session->set_flashdata('error','Data Gagal Di Validasi, Silahkan Cek Data Lagi!');
			redirect('skin.aspx');
		} 
		else 
		{
			$status=array(
				"skin_status"=>0,
			);
			$this->M__app->update_skin('skin',$status);
			$data=array(
				"skin_status"=>1,
			);
			$this->M__app->update('skin',$data,'id_skin',$this->input->post('id_skin'));
			$this->session->set_flashdata('success','Tema Toko Anda telah diperbarui, silahkan cek halaman depan toko anda!');
			redirect('skin.aspx');
		}
	}
}

/* End of file  */
/* Location: ./application/controllers/ */