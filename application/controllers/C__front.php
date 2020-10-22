<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C__front extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$config['tag_open'] = '<ul class="breadcrumb" style="border:0px solid #FFF;margin-left:70px;">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> &raquo; </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model('M__app');
		$this->load->library(array('pagination','cart','form_validation'));
	}

	public function index($off=0)
	{
		$jumlah=$this->M__app->gradeone('product','state_product',1)->num_rows();

		$data['title']      ="Beranda";
		$data['active']     ="beranda";
		$data['content']    ='product/index.php';
		$data['all']        =$this->M__app->getdatapage('product',$off)->result();
		$data['category']   =$this->M__app->gradeone('category','state',1)->result();
		$data['new']        =$this->M__app->getnewproduct()->result_array();
		$data['bank']       =$this->M__app->getdatapaymentfront()->result();
		$data['slider']     =$this->M__app->getdata('slider')->result();
		$data['slider_yes'] =1;
		$data['page']       =halaman($jumlah,'shop.aspx',2);

		$this->load->view('frontend/template',$data);
	}

	public function search()
	{
		$offset=trim(preg_replace('/[^a-zA-Z0-9]/',' ',$this->input->get('per_page')));
		if($offset=="")
		{
			$offset=0;
		}

		$data['title']               ="Cari Produk | Beranda";
		$data['active']              ="cari";
		$data['content']             ='page/search.php';
		$q                           =trim(preg_replace('/[^a-zA-Z0-9]/',' ',$this->input->get('q')));
		$data['all']                 =$this->M__app->getdatasearchpage($q, $offset)->result();
		$jumlah                      =$this->M__app->getdatasearch($q)->num_rows();
		$data['category']            =$this->M__app->gradeone('category','state',1)->result();
		$data['bank']                =$this->M__app->getdatapaymentfront()->result();
		$config['base_url']          =site_url('search.aspx?q='.$q);
		$config['total_rows']        =$jumlah;
		$config['per_page']          =24;
		$config['uri_segment']       =2;
		$config['full_tag_open']     = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
		$config['full_tag_close']    ="</ul>";
		$config['num_tag_open']      = '<li>';
		$config['num_tag_close']     = '</li>';
		$config['cur_tag_open']      = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close']     = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open']     = "<li>";
		$config['next_tagl_close']   = "</li>";
		$config['prev_tag_open']     = "<li>";
		$config['prev_tagl_close']   = "</li>";
		$config['first_tag_open']    = "<li>";
		$config['first_tagl_close']  = "</li>";
		$config['last_tag_open']     = "<li>";
		$config['last_tagl_close']   = "</li>";
		$config['prev_link']         = '&larr;';
		$config['next_link']         = '&rarr;';
		$config['first_link']        = 'Awal';
		$config['last_link']         = 'Akhir';
		$config['page_query_string'] = TRUE;

		$this->pagination->initialize($config);
		$data['page']=$this->pagination->create_links();

		$this->breadcrumb->append_crumb('Beranda', site_url());
		$this->breadcrumb->append_crumb('Cari Produk', site_url());
		$this->load->view('frontend/template',$data);
	}

	public function category($id,$off=0)
	{
		$get=$this->M__app->gradeone('category','id_category',$id)->row_array();

		$data['title']    ="Kategori ".$get['category'].' | Beranda';
		$data['active']   ="category";
		$data['get']      =$get;
		$data['content']  ='category/index.php';
		$data['all']      =$this->M__app->getdatacategory($get['id_category'],$off)->result();
		$jumlah           =$this->M__app->gradeone('product','category_product',$get['id_category'])->num_rows();
		$data['category'] =$this->M__app->gradeone('category','state',1)->result();
		$data['bank']     =$this->M__app->getdatapaymentfront()->result();
		$data['slider']   =$this->M__app->getdata('slider')->result();
		$data['new']      =$this->M__app->getnewproduct()->result_array();
		$data['page']     =halaman($jumlah,'category.aspx/'.$id,3);

		$this->breadcrumb->append_crumb('Beranda', site_url());
		$this->breadcrumb->append_crumb($get['category'], site_url('mycategory.aspx/'.$get['id_category']));

		$this->load->view('frontend/template',$data);
	}

	public function details($id)
	{
		$get=$this->M__app->gradeone('product','slug_product',$id)->row_array();

		if($this->M__app->gradeone('product','slug_product',$id)->num_rows()==0)
		{
			redirect('shop.aspx');
		}

		$cate=$this->M__app->gradeone('category','id_category',$get['category_product'])->row_array();

		$data['title']          ="Detail Produk ".$get['name_product'].'|'.$cate['category'];
		$data['active']         ="detail";
		$data['get']            =$get;
		$data['all']            =$this->M__app->gradeone('image_product','id_product',$get['id_product'])->result();
		$data['cate']           =$cate;
		$data['content']        ='product/detail.php';
		$data['category']       =$this->M__app->gradeone('category','state',1)->result();
		$data['bank']           =$this->M__app->getdatapaymentfront()->result();
		$data['slider']         =$this->M__app->getdata('slider')->result();
		$data['new']            =$this->M__app->getnewproduct()->result_array();
		$data['productTerkait'] =$this->M__app->getProductTerkait($cate['id_category'],$get['id_product'])->result();

		$this->breadcrumb->append_crumb('Beranda', site_url());
		$this->breadcrumb->append_crumb($cate['category'], site_url('mycategory.aspx/'.$cate['id_category']));
		$this->breadcrumb->append_crumb($get['name_product'], site_url());

		$this->load->view('frontend/template',$data);
	}

	public function login()
	{
		in_access();
		$this->load->view('frontend/login.php');
	}

	public function process()
	{
		$this->load->model('M__auth');
		$username =strtolower($this->security->sanitize_filename($this->input->post('username')));
		$password =$this->security->sanitize_filename($this->input->post('password'));
		$check    =$this->M__auth->signin($username,md5($password));

		if($check->num_rows()==1)
		{
			$get=$check->row_array();
			$data=array(
				"myAqua"=>$get['id_user'],
			);

			$_SESSION['KCFINDER']=array();
			$this->session->set_userdata($data);
			create_sess_kcfinder();
			$this->session->set_flashdata('success','Selamat Datang <strong> '.getuser('name_user').' </strong>');
			redirect('myshop.aspx');
		}
		else
		{
			$this->session->set_flashdata('error','Maaf Login Gagal Dilakukan Silahkan Cek Kembali '.$username);
			redirect('auth.aspx');
		}
	}

	public function getcity()
	{
		$province =$this->input->post('propinsi');
		$curl     = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL            => get_api('url')."starter/city?province=$province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => "",
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_TIMEOUT        => 30,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => "GET",
			CURLOPT_HTTPHEADER     => array(
				"key: ".get_api('key')
			),
		));

		$response = curl_exec($curl);
		$err      = curl_error($curl);

		curl_close($curl);

		if ($err)
		{
		  echo "cURL Error #:" . $err;
		}
		else
		{
		  $data = json_decode($response, true);
		  for ($j=0; $j < count($data['rajaongkir']['results']); $j++)
		  {
			$kabupaten     =$data['rajaongkir']['results'][$j]['city_id'];
			$kabupatenName =$data['rajaongkir']['results'][$j]['city_name'];
		    echo "<option value='".$kabupaten."'>".$kabupatenName."</option>";

		  }
		}
	}

	public function getcityfirst()
	{
		$province =$this->input->post('propinsi');
		$city     =$this->input->post('kabupaten');
		$curl     = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL            => get_api('url')."starter/city?province=$province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => "",
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_TIMEOUT        => 30,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => "GET",
			CURLOPT_HTTPHEADER     => array(
				"key: ".get_api('key')
			),
		));

		$response = curl_exec($curl);
		$err      = curl_error($curl);

		curl_close($curl);

		if ($err)
		{
		  echo "cURL Error #:" . $err;
		}
		else
		{
		  $data = json_decode($response, true);

		  for ($j=0; $j < count($data['rajaongkir']['results']); $j++)
		  {
			$kabupaten     =$data['rajaongkir']['results'][$j]['city_id'];
			$kabupatenName =$data['rajaongkir']['results'][$j]['city_name'];
		    echo "<option value='".$kabupaten."' ".select($kabupaten,$city).">".$kabupatenName."</option>";

		  }
		}
	}

	public function cost()
	{
		$origin      = gettoko('kabupaten_shop');
		$destination = $this->input->get('destination');
		$berat       = $this->input->get('berat');
		$courier     = $this->input->get('courier');

		if(gettoko($courier)!=1)
		{
			echo "Error";
		}
		else
		{
			$data = array(
				'origin'      => $origin,
				'destination' => $destination,
				'berat'       => $berat,
				'courier'     => $courier
			);
			$this->load->view('frontend/page/rajaongkir/getCost', $data);
		}
	}

	public function costfirst()
	{
		$origin      = $this->input->get('origin');
		$destination = $this->input->get('destination');
		$berat       = $this->input->get('berat');
		$courier     = $this->input->get('courier');
		$data = array(
			'origin'      => $origin,
			'destination' => $destination,
			'berat'       => $berat,
			'courier'     => $courier
		);
		$this->load->view('frontend/page/rajaongkir/Cost', $data);
	}

	public function cart()
	{
		$data['title']    ="Keranjang Belanja | Beranda";
		$data['active']   ="cart";
		$data['content']  ='page/cart.php';
		$data['category'] =$this->M__app->gradeone('category','state',1)->result();
		$data['bank']     =$this->M__app->getdatapaymentfront()->result();

		$this->breadcrumb->append_crumb('Beranda', site_url());
		$this->breadcrumb->append_crumb('Keranjang Belanja', site_url());

		$this->load->view('frontend/template',$data);
	}

	public function checkout()
	{
		$data['title']    ="Lakukan Pembayaran | Keranjang Belanja | Beranda";
		$data['active']   ="cart";
		$data['content']  ='page/checkout.php';
		$data['category'] =$this->M__app->gradeone('category','state',1)->result();
		$data['bank']     =$this->M__app->getdatapaymentfront()->result();

		$this->breadcrumb->append_crumb('Beranda', site_url());
		$this->breadcrumb->append_crumb('Keranjang Belanja', site_url('viewcart.aspx'));
		$this->breadcrumb->append_crumb('Lakukan Pembayaran', site_url());

		$this->load->view('frontend/template',$data);
	}

	public function total()
	{
		$total  =$this->input->post('total');
		$ongkir =$this->input->post('ongkir');
		$b      =explode(":",$ongkir);
		$jumlah =$b[2]+$total;

		echo "Rp.".uang($jumlah);
	}

	public function notfound()
	{
		redirect();
	}

	public function verifCart()
	{
		$id  =$this->input->post('id');
		$get =$this->M__app->gradeone('product','id_product',$id)->row_array();

		if($this->M__app->gradeone('product','id_product',$id)->num_rows()>0)
		{
			$data['id']  =$id;
			$data['get'] =$get;

			$this->load->view('frontend/product/modalCart.php',$data);
		}
	}

	public function unsubcribe($kode)
	{
		$get=$this->M__app->gradeone('email','kode',$kode)->result();

		foreach ($get as $key)
		{
			$update = array('state' => 0 );
			$this->M__app->update('email',$update,'id_email',$key->id_email);
		}

		$this->session->set_flashdata('success', 'Proses Pemberhentian Notifikasi Berhasil Di Lakukan!');
		redirect();
	}
}
