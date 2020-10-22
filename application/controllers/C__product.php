<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C__product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		get_breadcrumb();
		$this->load->model('M__app');
	}

	public function index($off=0)
	{
		$this->load->library('pagination');
		$jumlah=$this->M__app->getdata('product')->num_rows();
		$data['title']       ="Produk";
		$data['active']      ="product";
		$data['active_open'] ="master";
		$data['all']         =$this->M__app->getdatapage_('product',$off)->result();
		$data['category']    =$this->M__app->gradeone('category','state',1)->result();
		$data['page']        =halaman($jumlah,'product.aspx',2,10);
		$data['off']         =$off;
		$data['content']     ="product/index.php";

		$this->breadcrumb->append_crumb('Produk', site_url('product.aspx'));

		$this->load->view('backend/template.php',$data);
	}

	public function filter($off=0)
	{
		$this->load->library('pagination');
		if ($this->input->post('search')==1)
		{
			$session=array(
				"product"    =>$this->input->post('product'),
				"price"      =>$this->input->post('price'),
				"filter-dis" =>$this->input->post('filter-dis'),
				"stock"      =>$this->input->post('stock'),
				"weight"     =>$this->input->post('weight'),
				"category"   =>$this->input->post('category'),
			);
			$this->session->set_userdata($session);
		}

		$jumlah=$this->M__app->getJumlahFilter()->num_rows();
		$data['title']       ="Filter | Produk";
		$data['active']      ="product";
		$data['active_open'] ="master";
		$data['all']         =$this->M__app->getDataFilter($off)->result();
		$data['category']    =$this->M__app->gradeone('category','state',1)->result();
		$data['page']        =halaman($jumlah,'filter_product.aspx',2,10);
		$data['off']         =$off;
		$data['jumlah']      =$jumlah;
		$data['content']     ="product/search.php";

		$this->breadcrumb->append_crumb('Produk', site_url('product.aspx'));
		$this->breadcrumb->append_crumb('Filter', site_url());

		if($jumlah==0)
		{
			$this->session->set_flashdata('error', 'Data tidak ditemukan!');
			redirect('product.aspx');
		}
		else
		{
			$this->load->view('backend/template.php',$data);
		}
	}

	public function add()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('product', 'product', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('information', 'information', 'trim|required');
		$this->form_validation->set_rules('price', 'price', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('weight', 'weight', 'trim|required|max_length[11]|numeric');
		$this->form_validation->set_rules('category', 'category', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('stock', 'stock', 'trim|required|max_length[5]|numeric');
		$this->form_validation->set_rules('slug', 'slug', 'trim|required');
		$repSlug=$this->input->post('slug');
		$slug=preg_replace('/[^a-zA-Z0-9]/','_',$repSlug);
		$slugNum=$this->M__app->gradeone('product','slug_product',$slug)->num_rows();
		if($slugNum>0)
		{
			$this->session->set_flashdata('error','Nama slug sudah digunakan silahkan ganti slug anda dengan menambahkan angka atau kata lainnya!');
			redirect('product.aspx');
		}
		elseif ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error',validation_errors());
			redirect('product.aspx');
		}
		else
		{
			$picture=compress_image('picture','Produk');
			$data=array(
				"name_product"        =>$this->input->post('product'),
				"information_product" =>nl2br(trim($this->input->post('information'))),
				"price_product"       =>str_replace('.', '', $this->input->post('price')),
				"weight_product"      =>$this->input->post('weight'),
				"category_product"    =>$this->input->post('category'),
				"image_product"       =>$picture,
				"state_product"       =>1,
				"slug_product"        =>$slug,
				"discount_product"    =>str_replace('.', '', $this->input->post('discount')),
				"stock_product"       =>$this->input->post('stock'),
				"state_discount"      =>$this->input->post('stateDiscount')?
										$this->input->post('stateDiscount')
										:0,
			);

			$this->M__app->saved('product',$data);
			$this->session->set_flashdata('success','Data Produk <strong>'.$this->input->post('product').'</strong> Berhasil Di Simpan');
			redirect('product.aspx');
		}
	}

	public function view_update()
	{
		$id               =$this->input->post('id');
		$get              =$this->M__app->gradeone('product','id_product',$id)->row_array();
		$data['get']      =$get;
		$data['category'] =$this->M__app->gradeone('category','state',1)->result();

		$this->load->view('backend/product/edit.php', $data);
	}

	public function view_detail()
	{
		$id               =$this->input->post('id');
		$get              =$this->M__app->gradeone('product','id_product',$id)->row_array();
		$data['get']      =$get;
		$data['category'] =$this->M__app->gradeone('category','state',1)->result();

		$this->load->view('backend/product/detail.php', $data);
	}

	public function update($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('product', 'product', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('information', 'information', 'trim|required');
		$this->form_validation->set_rules('price', 'price', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('weight', 'weight', 'trim|required|max_length[11]|numeric');
		$this->form_validation->set_rules('stock', 'stock', 'trim|required|max_length[5]|numeric');
		$this->form_validation->set_rules('category', 'category', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('slug_edit', 'slug', 'trim|required');

		$repSlug=$this->input->post('slug_edit');
		$slug=preg_replace('/[^a-zA-Z0-9]/','_',$repSlug);
		$slugNum=$this->M__app->slugEdit($slug,$id)->num_rows();
		if($slugNum>0)
		{
			$this->session->set_flashdata('error','Nama slug sudah digunakan silahkan ganti slug anda dengan menambahkan angka atau kata lainnya!');
			redirect('product.aspx');
		}
		elseif ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Data Gagal Di Validasi, Silahkan Cek Data Lagi!');
			redirect('product.aspx');
		}
		else
		{
			$get=$this->M__app->gradeone('product','id_product',$id)->row_array();
			if($_FILES['picture']['name']=="")
			{
				$picture=$get['image_product'];
			}
			else
			{
				$picture=compress_image('picture','Produk');
				unlink('uploads/'.$get['image_product']);
			}

			$data=array(
				"name_product"        =>$this->input->post('product'),
				"information_product" =>nl2br(trim($this->input->post('information'))),
				"price_product"       =>str_replace('.', '', $this->input->post('price')),
				"weight_product"      =>$this->input->post('weight'),
				"category_product"    =>$this->input->post('category'),
				"image_product"       =>$picture,
				"image_product"       =>$picture,
				"discount_product"    =>str_replace('.', '', $this->input->post('discountEdit')),
				"slug_product"        =>$slug,
				"state_discount"      =>$this->input->post('stateDiscountEdit')?
										$this->input->post('stateDiscountEdit'):0,
			);
			$this->M__app->update('product',$data,'id_product',$id);
			$this->session->set_flashdata('success','Data Produk Berhasil Di Perbarui');
			redirect('product.aspx');
		}
	}

	public function update_state()
	{
		$total=$this->input->post('id');
		if($this->input->post('active'))
		{
			$state=1;
		}
		elseif($this->input->post('delete'))
		{
			for ($i=0; $i < count($total); $i++)
			{
				$product=$this->M__app->gradeone('product','id_product',$total[$i])->row_array();
				$image=$this->M__app->gradeone('image_product','id_product',$total[$i])->result();
				foreach ($image as $r)
				{
					$this->M__app->delete('image_product','id_image_product',$r->id_image_product);
					unlink('uploads/'.$r->image);
				}
				$this->M__app->delete('product','id_product',$total[$i]);
				unlink('uploads/'.$product['image_product']);
			}
		}
		else
		{
			$state=0;
		}

		if(!$this->input->post('delete'))
		{
			for ($i=0; $i < count($total); $i++)
			{
				$data=array(
					"state_product"=>$state,
				);
				$this->M__app->update('product',$data,'id_product',$total[$i]);
			}
		}

		$this->session->set_flashdata('success','Data Produk Berhasil Di Perbarui');
		redirect('product.aspx');
	}

	public function picture($id)
	{
		$get                 =$this->M__app->gradeone('product','id_product',$id)->row_array();
		$data['get']         =$get;
		$data['all']         =$this->M__app->gradeone('image_product','id_product',$id)->result();
		$data['title']       ="Detail Gambar Produk {$get['name_product']} | Produk";
		$data['active']      ="product";
		$data['active_open'] ="master";
		$data['content']     ="product/picture.php";

		$this->breadcrumb->append_crumb('Produk', site_url('product.aspx'));
		$this->breadcrumb->append_crumb('Galeri <b>'.$get['name_product'].'</b>', site_url());

		$this->load->view('backend/template.php', $data);
	}

	public function upload($id)
	{
		$image =compress_image('userfile','Pendukung');
		$token =$this->input->post('token_gambar');
		$data=array(
			"id_product" =>$id,
			"image"      =>$image,
			"token"      =>$token,
		);
		$this->M__app->saved('image_product',$data);
	}

	public function delete_picture()
	{
		$token =$this->input->post('token');
		$get   =$this->M__app->gradeone('image_product','token',$token);
		if($get->num_rows()>0)
		{
			$row =$get->row_array();
			unlink('uploads/'.$row['image']);
			$this->M__app->delete('image_product','token',$token);
		}
		echo "{}";
	}

	public function delete_image()
	{
		$total =$this->input->post('id');
		$id    =$this->input->post('id_product');

		for ($i=0; $i < count($total); $i++)
		{
			$get =$this->M__app->gradeone('image_product','id_image_product',$total[$i])->row_array();
			unlink('uploads/'.$get['image']);
			$this->M__app->delete('image_product','id_image_product',$total[$i]);
		}

		$this->session->set_flashdata('success','Data Gambar Pendukung Produk Berhasil Di Hapus');
		redirect('picture_product.aspx/'.$id);
	}
	
}

/* End of file  */
/* Location: ./application/controllers/ */
