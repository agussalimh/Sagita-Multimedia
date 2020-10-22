<?php 
function active($aktif,$menu)
{	
	if($aktif==$menu)
	{
		return "active";
	}
	else
	{
		return "";
	}
}
function active_open($aktif,$menu)
{	
	if($aktif==$menu)
	{
		return "nav-active";
	}
	else
	{
		return "";
	}
}
function selected($i,$j)
{
	if($i==$j)
	{
		echo "selected";
	}
}
function select($i,$j)
{
	if($i==$j)
	{
		return "selected";
	}
}
function akses($menu)
{
	$ci =& get_instance();
	$n=akses_modul($menu,1);
	if($n!=1)
	{
		$ci->session->set_flashdata('error','Anda Tidak Memiliki Akses Halaman Ini');
		redirect('myshop');
	}
}
function in_access()
{
	$ci=& get_instance();
	if($ci->session->userdata('myAqua'))
	{
		redirect('myshop.aspx');
	}
}
function getakses($aks)
{
	$ci=& get_instance();
	return $ci->session->userdata($aks);
}
function no_access()
{
	$ci=& get_instance();
	if(!$ci->session->userdata('myAqua'))
	{
		$ci->session->set_flashdata('error','Silahkan Login Terlebih Dahulu');
		redirect('auth.aspx');
	}
}
function get_breadcrumb()
{
	$ci=& get_instance();
	$config['tag_open'] = '<ul class="breadcrumb">';
	$config['tag_close'] = '</ul>';
	$config['li_open'] = '<li>';
	$config['li_close'] = '</li>';
	$config['divider'] = '<span class="divider"> » </span>';
	return $ci->breadcrumb->initialize($config);
}
function alert()
{
	$ci =& get_instance();
	$success=ucfirst(strtolower($ci->session->flashdata('success')));
	if ($success!=null)
	{
	    echo '<div class="alert alert-success alert-block fade in">
	      <button type="button" class="close close-sm" data-dismiss="alert">
            <i class="fa fa-times"></i>
          </button>
	      <p>
	          <strong> Sukses! </strong><span>'.$success.'</span>
	      </p>
	    </div>';
	}       
	$error=ucfirst(strtolower($ci->session->flashdata('error')));
	if ($error!=null)
	{
	     echo '<div class="alert alert-danger alert-block fade in">
	      <button type="button" class="close close-sm" data-dismiss="alert">
            <i class="fa fa-times"></i>
          </button>
	      <p>
	          <strong> Error! </strong><span>'.$error.'</span>
	      </p>
	    </div>';
	}       
}
function get_state($state)
{
	if($state==1)
	{
		return "<span class='label label-success'>Aktif</span>";
	}
	else
	{
		return "<span class='label label-danger'>Nonaktif</span>";
	}
}
function get_statetransaction($state)
{
	if($state==0)
	{
		return "<span class='label label-warning'>Pending</span>";
	}elseif($state==2)
	{
		return "<span class='label label-success'>Sampai</span>";
	}elseif($state==3)
	{
		return "<span class='label label-default'>Sudah Transfer</span>";
	}
	else
	{
		return "<span class='label label-primary'>Dikirim</span>";
	}
}
function get_level($level)
{
	if($level==1)
	{
		return "Superadmin";
	}
	else
	{
		return "Admin";
	}
}

function compress_image($file,$new_name,$cd="uploads/")
{
	$CI =& get_instance();
	$foto=$_FILES[$file]['name'];
	$dir="upload/";
	$dirs=$cd;
	$file=$file;
	$new_name=$new_name.date('Y-m-d-H-i-s').'.png';
	$vdir_upload = $dir;
	$file_name=$_FILES[''.$file.'']["name"];
	$vfile_upload = $vdir_upload . $file;
	$tmp_name=$_FILES[''.$file.'']["tmp_name"];
	move_uploaded_file($tmp_name, $dir.$file_name);
	$source_url=$dir.$file_name;
	$config['image_library'] = 'gd2';
	$config['source_image'] = 'upload/'.$foto;
	$config['new_image'] = $cd.''.$new_name;
	$config['maintain_ratio'] = FALSE;
	$config['width']         = 285;
	$config['height']       = 380;
	$CI->load->library('image_lib', $config);
	$CI->image_lib->resize();
	unlink($source_url);
	return($new_name);
}

function compress_logo($file,$new_name,$cd="uploads/")
{
	$CI =& get_instance();
	$foto=$_FILES[$file]['name'];
	$dir="upload/";
	$dirs=$cd;
	$file=$file;
	$new_name=$new_name.date('Y-m-d-H-i-s').'.png';
	$vdir_upload = $dir;
	$file_name=$_FILES[''.$file.'']["name"];
	$vfile_upload = $vdir_upload . $file;
	$tmp_name=$_FILES[''.$file.'']["tmp_name"];
	move_uploaded_file($tmp_name, $dir.$file_name);
	$source_url=$dir.$file_name;
	$config['image_library'] = 'gd2';
	$config['source_image'] = 'upload/'.$foto;
	$config['new_image'] = $cd.''.$new_name;
	$config['maintain_ratio'] = FALSE;
	$config['width']         = 500;
	$config['height']       = 500;
	$CI->load->library('image_lib', $config);
	$CI->image_lib->resize();
	unlink($source_url);
	return($new_name);
}

function compress_slider($file,$new_name)
{
	$CI =& get_instance();
	$foto=$_FILES[$file]['name'];
	$dir="upload/";
	$dirs="uploads/";
	$file=$file;
	$new_name=$new_name.date('Y-m-d-H-i-s').'.png';
	$vdir_upload = $dir;
	$file_name=$_FILES[''.$file.'']["name"];
	$vfile_upload = $vdir_upload . $file;
	$tmp_name=$_FILES[''.$file.'']["tmp_name"];
	move_uploaded_file($tmp_name, $dir.$file_name);
	$source_url=$dir.$file_name;
	$config['image_library'] = 'gd2';
	$config['source_image'] = 'upload/'.$foto;
	$config['new_image'] = 'uploads/'.$new_name;
	$config['maintain_ratio'] = FALSE;
	$config['width']         = 1920;
	$config['height']       = 800;
	$CI->load->library('image_lib', $config);
	$CI->image_lib->resize();
	unlink($source_url);
	return($new_name);
}
function uang($number)
{
    return number_format($number,2,',','.');
}
function gettoko($get)
{
    $ci =& get_instance();
    $ci->db->select($get);
    $db=$ci->db->get('shop_setting')->row_array();;
    return $db[$get];
}
function getuser($get)
{
    $ci =& get_instance();
    $session=$ci->session->userdata('myAqua');
    $ci->db->select($get);
    $ci->db->where('id_user',$session);
    $db=$ci->db->get('shop_user')->row_array();;
    return $db[$get];
}
function access($access)
{
	$ci =& get_instance();
    $level=getuser('access_user');
    if($level!=$access)
    {
    	redirect('myshop.aspx');
    	$ci->session->set_flashdata('error','Maaf Anda Tidak Memiliki Akses Halaman Ini');
    }
}
function halaman($jumlah,$url,$segment,$limit=24)
{
	$config['base_url']         =site_url($url);
	$config['total_rows']       =$jumlah;
	$config['per_page']         =$limit;
	$config['uri_segment']      =$segment;
	$config['full_tag_open']    = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
	$config['full_tag_close']   ="</ul>";
	$config['num_tag_open']     = '<li>';
	$config['num_tag_close']    = '</li>';
	$config['cur_tag_open']     = "<li class='disabled'><li class='active'><a href='#'>";
	$config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
	$config['next_tag_open']    = "<li>";
	$config['next_tagl_close']  = "</li>";
	$config['prev_tag_open']    = "<li>";
	$config['prev_tagl_close']  = "</li>";
	$config['first_tag_open']   = "<li>";
	$config['first_tagl_close'] = "</li>";
	$config['last_tag_open']    = "<li>";
	$config['last_tagl_close']  = "</li>";
	$config['prev_link']        = '&larr;';
	$config['next_link']        = '&rarr;';
	$config['first_link']       = 'Awal';
	$config['last_link']        = 'Akhir';
	$ci =& get_instance();
	$ci->pagination->initialize($config);
    return $ci->pagination->create_links();
}
function in_cart($product_id="")
{
	$ci =& get_instance();
	foreach ($ci->cart->contents() as $items)
	{
		if($items['id_product']==$product_id)
		{
			$data=array();
			$data['rowid']=$items['rowid'];
			$data['qty']=$items['qty'];
			$data['id']=$items['id'];
			$data['price']=$items['price'];
			$data['berat']=$items['berat'];
			$data['id_product']=$items['id_product'];
			$data['information']=$items['information'];
			return $data;
		}
	}
}

function getProvinsi($propinsi)
{
	$curl = curl_init();
	curl_setopt_array($curl, array(
	    CURLOPT_URL => get_api('url')."starter/province?id=$propinsi",
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_ENCODING => "",
	    CURLOPT_MAXREDIRS => 10,
	    CURLOPT_TIMEOUT => 30,
	    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	    CURLOPT_CUSTOMREQUEST => "GET",
	    CURLOPT_HTTPHEADER => array(
	     "key: ".get_api('key')
	    ),	
    ));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) 
	{
	  
	} 
	else 
	{
	  $data = json_decode($response, true);
	  $prov=str_replace('"','',json_encode($data['rajaongkir']['results']['province']));
	  return $prov;
	}
}

function getKabupaten($kabupaten)
{
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => get_api('url')."starter/city?id=$kabupaten",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "key: ".get_api('key')
	  ),
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) 
	{
	    
	} 
	else 
	{
		$data = json_decode($response, true);
	    $city=str_replace('"','',json_encode($data['rajaongkir']['results']['city_name']));
	    return $city;
	}
}

function curlProv()
{
	$arr=array();
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => get_api('url')."starter/province",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "key: ".get_api('key')
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) 
	{
	  
	} 
	else 
	{
	  $data = json_decode($response, true);
	  
	  for ($i=0; $i < count($data['rajaongkir']['results']); $i++)
	  {

	    $val=$data['rajaongkir']['results'][$i]['province_id'];
	    $arr[$val]=$data['rajaongkir']['results'][$i]['province'];
	  
	  }

	}

	return $arr;
}

function curlKab()
{
	$curl = curl_init();
	curl_setopt_array($curl, array(
	    CURLOPT_URL => get_api('url')."starter/city",
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_ENCODING => "",
	    CURLOPT_MAXREDIRS => 10,
	    CURLOPT_TIMEOUT => 30,
	    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	    CURLOPT_CUSTOMREQUEST => "GET",
	    CURLOPT_HTTPHEADER => array(
	     "key: ".get_api('key')
	    ),	
    ));
	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) 
	{
	  
	} 
	else 
	{
	  $data = json_decode($response, true);
	  
	  for ($i=0; $i < count($data['rajaongkir']['results']); $i++)
	  {

	  	$val=$data['rajaongkir']['results'][$i]['city_id'];
	    $arr[$val]=$data['rajaongkir']['results'][$i]['city_name'];
	  
	  }

	}
	return $arr;
}

function filter($string)
{
	return htmlspecialchars(htmlentities(trim($string)));
}

function test_url()
{
	return "http://dslrartshop.ga/";
}

function getBank()
{
	$ci =& get_instance();
	$bank=$ci->M__app->gradeone('bank','state_bank',1)->result();
	$val="";
	foreach ($bank as $row) {
		$val.="<img src='".base_url('assets/images/bank/'.$row->logo_bank)."'' width='60px' height='20px;'>&nbsp;&nbsp;";
	}
	return $val;
}
function randomPrefix($length)
{
	$random= "";
	srand((double)microtime()*1000000);
	$data = "AbcDE123IJKLMN67QRSTUVWXYZ";
	$data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
	$data .= strtotime(date('YmdHis'));
	 
	for($i = 0; $i < $length; $i++)
	{
	$random .= substr($data, (rand()%(strlen($data))), 1);
	}
	return $random;
}
function start_native_session()
{
    if (session_id() == '') {
        session_start();
    }
}
function create_sess_kcfinder()
{
	$ci =& get_instance();
    if ($ci->session->userdata('myAqua')!="") {
        # start natif session
        start_native_session();

        $_SESSION['CIPTASHOP']['KCFINDER']              = array();
        $_SESSION['CIPTASHOP']['KCFINDER']['disabled']  = false;
        $_SESSION['CIPTASHOP']['KCFINDER']['uploadDir'] = "upload";
    }
}
function email_config()
{
	$ci=& get_instance();
	$config = Array(
      'protocol' => 'smtp',
	  'smtp_host' => 'ssl://smtp.googlemail.com',
	  'smtp_port' => 465,
	  'smtp_user' => 'ariyadwipangga15@gmail.com',
	  'smtp_pass' => 'ariya123',
	  'mailtype'  => 'html', 
    );
    $ci->load->library('email', $config);
    return $ci->email->initialize($config);
}

function email_name()
{
	return 'tokoonlinegratisciptasoft@gmail.com';
}

function getoption($value='')
{
	$ci =& get_instance();

	$arr=array();
	if($value==1)
	{
		$get         =$ci->M__app->gradeone('options','state','1')->result();
	}
	else
	{
		$get        =$ci->M__app->gradeone('options','state','2')->result();
	}

	return $get;
}

function getarr($value='')
{
	$ci =& get_instance();

	$arr=array();
	if($value==1)
	{
		$get         =$ci->M__app->gradeone('options','state','1')->result();
	}
	else
	{
		$get        =$ci->M__app->gradeone('options','state','2')->result();
	}

	foreach ($get as $key) {
		$arr[]=$key->id_kab;
	}
	return $arr;
}

function get_api($val='key')
{
	if($val=='key')
	{
		// return "7498db4fb83e2d82dc4d8ac12c642080";
		return "b982580b03111805a7778fb118ccf780";
	}
	else
	{
		return "https://api.rajaongkir.com/";
	}
}