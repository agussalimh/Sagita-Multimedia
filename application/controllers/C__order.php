<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C__order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M__app');
		$this->load->library(array('pagination','cart','form_validation'));
	}

	public function fixed()
	{
		$this->load->library('form_validation');
		$pay=$this->input->post('payment');
		$this->validationTransaction();

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('checkout.aspx');
		}
		else
		{
			if (count($this->cart->contents())==0)
			{
				$this->session->set_flashdata('error', 'Keranjang Anda Kosong');
				redirect();
			}

			$kab=getoption(1);
			$ak=array();

			foreach ($kab as $key) 
			{
				$ak[]=$key->id_kab;
			}

			if(in_array($this->input->post('destination'), $ak))
	        {
	            $b[0]='-';
	            $b[1]='-';
	            $b[2]='0';
	        }
	        else
	        {
	        	$details=$this->input->post('kurir');
				$b=explode(":",$details);
	        }

			$harga    =array();
			$id_trans =date('YmdHis').$this->input->post('nomor');

            if(count($this->cart->contents())==0)
            {
            	$this->session->set_flashdata('error', 'Data Tidak Valid, Harap Lengkapi Data Anda');
				redirect();
            }

            foreach ($this->cart->contents() as $items)
            {
	            $harga[]=$items['price'];
	            $in=array(
					"id_transaction"  =>$id_trans,
					"id_product"      =>$items['id_product'],
					"qty_transaction" =>$items['qty'],
					"information"     =>$items['information'],
	            );

				$prd       =$this->M__app->gradeone('product','id_product',$items['id_product'])->row_array();
				$new_stock =$prd['stock_product']-$items['qty'];

	            if($new_stock<=0)
	            {
	            	$new=0;
	            }
	            else
	            {
	            	$new=$new_stock;
	            }

	            $update=array(
	            	"stock_product"=>$new,
	            );

	            $this->M__app->update('product',$update,'id_product',$items['id_product']);
	            $this->M__app->saved('transaction_details',$in);
            }

			$data=array(
				"id_transaction"      =>$id_trans,
				"no_invoice"          =>$this->M__app->getInvoice(),
				"kode_pembelian"      =>randomPrefix(10),
				"name_customer"       =>filter(strtoupper($this->input->post('name'))),
				"email"               =>filter($this->input->post('email')),
				"province"            =>$this->input->post('propinsi_tujuan'),
				"city"                =>$this->input->post('destination'),
				"address"             =>nl2br($this->input->post('alamat')),
				"packet"              =>$b[0],
				"to_customer"         =>$b[1],
				"price_ongkir"        =>$b[2],
				"total_transaction"   =>array_sum($harga)+$b[2],
				"payment_transaction" =>1,
				"bank"                =>$this->input->post('bank'),
				"phone"               =>$this->input->post('phone'),
				"bukti"               =>'',
				"no_resi"             =>'',
				"courier"             =>$this->input->post('courier'),
			);
			$this->M__app->saved('transaction',$data);

			if($this->input->post('email')!="")
			{
				email_config();
			    $this->email->from(gettoko('email_shop'), gettoko('longname_shop')?gettoko('longname_shop'):gettoko('shortname_shop'));
			    $this->email->to($this->input->post('email'));
			    $this->email->set_newline("\r\n");
			    $this->email->subject('Konfirmasi Pemesanan');
			    $get=$this->M__app->gradeone('transaction','id_transaction',$id_trans)->row_array();

			    if($get['bank']=="cod")
			    {
			    	$bank_text='<tr>
			                        <td>Pembayaran</td>
			                        <td>:</td>
			                        <td>COD</td>
			                    </tr>';
			    }
			    else
			    {
					$pay=$this->M__app->getdatapaymentId($get['payment_transaction'])->row_array();
					$bank_text='<tr>
			                        <td>Bank</td>
			                        <td>:</td>
			                        <td> '.$pay['name_bank'].' ['.$pay['number'].'] - [ '.$pay['name'].' ]</td>
			                    </tr>';
			    }

			    if($get['courier']!="")
			    {
			    	$kurir_text='<tr>
									<td>Kurir</td>
									<td>:</td>
									<td> '.$get['courier'].'</td>
								</tr>
								<tr>
									<td>Jenis</td>
									<td>:</td>
									<td> '.$get['packet'].'</td>
								</tr>';
					$ongkir_text='<tr>
									<td>Harga Ongkir</td>
									<td>:</td>
									<td>Rp. '.uang($get['price_ongkir']).'</td>
								</tr>';
			    }
			    else
			    {
			    	$kurir_text="";
			    	$ongkir_text="";
			    }

				$propinsi  =$get['province'];
				$kabupaten =$get['city'];
				$prov      =getProvinsi($propinsi);
				$city      =getKabupaten($kabupaten);
				$pesan     =array();

				$details=$this->M__app->getdetails($id_trans)->result_array();

			    $no=0;
			    foreach ($details as $key)
			    {
			    	$no++;
				    if ($key['state_discount']==1)
				    {
						$price=$key['discount_product'];
					}
					else
					{
						$price=$key['price_product'];
					}

					$total[] =$price*$key['qty_transaction'];
					$pesan[] = '
						    <tr>
								<td>  '.$no.'</td>
								<td>  '.$key['name_product'].'</td>
								<td>Rp.'.uang($price).'</td>
								<td>  '.$key['qty_transaction'].'</td>
								<td>  '.$key['information'].'</td>
								<td>  '.$key['weight_product']*$key['qty_transaction'].' gram </td>
								<td>Rp.'.uang($price*$key['qty_transaction']).'</td>
							</tr>';
				};

				$pesan[]="<tr>
                    <td colspan='6'><center>Total</center></td>
                    <td><b>Rp.".uang(array_sum($total))."</b></td>
                </tr>";

				$tableBody='<table class="table table-bordered" style="text-alignment:left;">
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td>'.$get['name_customer'].'</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td> '.$get['email'].'</td>
						</tr>
						<tr>
							<td>Telepon</td>
							<td>:</td>
							<td> '.$get['phone'].'</td>
						</tr>
						<tr>
							<td>Provinsi</td>
							<td>:</td>
							<td>'.$prov.'</td>
						</tr>
						<tr>
							<td>Kabupaten</td>
							<td>:</td>
							<td> '.$city.'</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td> '.$get['address'].'</td>
						</tr>
						'.$kurir_text.'
						<tr>
							<td>Waktu</td>
							<td>:</td>
							<td> '.$get['time_transaction'].'</td>
						</tr>
						'.$bank_text.'
						<tr>
							<td>Total Harga</td>
							<td>:</td>
							<td>Rp. '.uang(array_sum($total)).'</td>
						</tr>
						'.$ongkir_text.'<tr>
							<td>Total Transaksi</td>
							<td>:</td>
							<td>Rp. '.uang($get['total_transaction']).'</td>
						</tr>
					</table>
					<br><br>
					<center>Detail Pembelian</center>
					<hr>
					<table border="1px" class="table table-bordered">
						<tr>
							<th>No</th>
							<th>Nama Produk</th>
							<th>Harga Satuan</th>
							<th>Jumlah</th>
							<th>Keterangan</th>
							<th>Berat</th>
							<th>Total</th>
						</tr>';


			    $view='
			        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
			        <br>
			        <h1>Selamat Pesanan Anda Berhasil Dilakukan!</h1>
					<b>*)Mohon segera mengunggah bukti pembayaran anda ke menu <b><a href="'.site_url('order.aspx').'">Cek Pesanan</a></b> agar kami segera memproses pesanan anda, bila ada kesulitan silahkan hubungi kontak kami.</b>
					<br>
					<br>
					Dengan data pemesanan sebagai Berikut <br>
					<b style="color:#e74c3c;font-size:16px;">Kode : '.$get["kode_pembelian"].'</b>
					'.$tableBody.'
					';
				$akhir='</table>
					<br>
					Terimakasih';

				$this->email->message($view.' '.implode(' ', $pesan).' '.$akhir);
			    $this->email->send();
			    
			    $this->email->from(email_name(), gettoko('longname_shop')?gettoko('longname_shop'):gettoko('shortname_shop'));
			    $this->email->to(gettoko('email_shop'));
			    $this->email->set_newline("\r\n");
			    $this->email->subject('Pesanan Pelanggan');

			    $view='<br>
			        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
					<h4>Pelanggan Melakukan Pemesanan!</h4> <br>
					Dengan data pemesanan sebagai Berikut <br>
					<b style="color:#e74c3c;font-size:16px;">Kode : '.$get["kode_pembelian"].'</b>
					'.$tableBody.'';
				$akhir='</table>
					<br>
					Terimakasih';

				$this->email->message($view.' '.implode(' ', $pesan).' '.$akhir);
			    $this->email->send();
			}
			$this->cart->destroy();

			$this->session->set_flashdata('success','Data Pesanan Berhasil Dilakukan, Cek Email Untuk Melihat Detail Pembelian dan Kode Pembelian Anda.');
			redirect();
		}
	}

	public function validationTransaction()
	{
		$this->form_validation->set_rules('name', 'nama', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[200]');
		$this->form_validation->set_rules('propinsi_tujuan', 'propinsi', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('destination', 'kota', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		
		$kab=getoption(1);
		$ak=array();

		foreach ($kab as $key) 
		{
			$ak[]=$key->id_kab;
		}

		$ongkir=getoption(2);
		$ok=array();

		foreach ($ongkir as $ky) 
		{
			$ok[]=$ky->id_kab;
		}

		$kabupaten=$this->input->post('destination');
		$bank=$this->input->post('bank');

		if(in_array($kabupaten, $ak))
		{
	       	
	    }
	    else
	    {
	    	$this->form_validation->set_rules('kurir', 'kurir', 'trim|required|max_length[100]');
			$this->form_validation->set_rules('courier', 'paket', 'trim|required|max_length[10]');
	    }

	    if((!in_array($kabupaten, $ok)) && ($bank=='cod'))
		{
	       	$this->session->set_flashdata('error', 'Data Tidak Valid, Harap Lengkapi Data Anda');
			redirect('checkout.aspx');
	    }

	    $this->form_validation->set_rules('phone', 'telepon', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('bank', 'bank', 'trim|required|max_length[3]');
	}
}

/* End of file C__order.php */
/* Location: ./application/controllers/C__order.php */
