<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C__transaction extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('M__app');
		$this->load->library(array('pagination','form_validation'));
		get_breadcrumb();	
		access(1);
	}

	public function index($off=0)
	{
		$jumlah=$this->M__app->getdata('transaction')->num_rows();
		$data['title']       ="Transaksi";
		$data['active']      ="transaction";
		$data['active_open'] ="transaction";
		$data['content']     ='transaction/index.php';
		$data['all']         =$this->M__app->getdatapagetransaction($off)->result();
		$data['page']        =halaman($jumlah,'transaction.aspx',2);

		$this->breadcrumb->append_crumb('Transaksi', site_url('transaction.aspx'));

		$this->load->view('backend/template',$data);
	}

	public function view_detail_transaction($id)
	{
		$data['title']       ="Detail Transaksi | Transaksi";
		$data['active']      ="transaction";
		$data['active_open'] ="transaction";
		$trans=$this->M__app->gradeone('transaction','id_transaction',$id)->row_array();
		if(in_array($trans['city'], getarr(1)))
		{
            $data['content']='transaction/details.php';
        }
        else
        { 
            $data['content']='transaction/detail.php';
        }

		$data['details'] =$this->M__app->getdetails($id)->result_array();
		$data['get']     =$trans;
		$data['pay']     =$pay=$this->M__app->getdatapaymentId($trans['payment_transaction'])->row_array();

		$this->breadcrumb->append_crumb('Transaksi', site_url('transaction.aspx'));
		$this->breadcrumb->append_crumb('Detail Transaksi', site_url('transaction.aspx'));

		$this->load->view('backend/template',$data);
	}

	public function filter_transaction($offset=0)
	{
		$this->load->library('pagination');
		if ($this->input->post('search')==1)
		{
			$session=array(
				"nama"    =>$this->input->post('nama'),
				"email"   =>$this->input->post('email'),
				"telepon" =>$this->input->post('telepon'),
				"tanggal" =>$this->input->post('tanggal'),
				"status"  =>$this->input->post('status'),
			);
			$this->session->set_userdata($session);
		}
		$to=$this->M__app->getTransSearch($offset);

		if($to->num_rows()==0)
		{
			$this->session->set_flashdata('error', 'Data tidak ditemukan!');
			redirect('transaction.aspx');	
		}
		else
		{
			$jumlah=$this->M__app->getTransNum()->num_rows();
			$data['title']       ="Filter | Transaksi";
			$data['active']      ="transaction";
			$data['active_open'] ="transaction";
			$data['content'] ='transaction/search.php';
			$data['all']     =$to->result();
			$data['page']    =halaman($jumlah,'filter_transaction.aspx',2);
			$data['jumlah']  =$jumlah;
			$this->breadcrumb->append_crumb('Transaksi', site_url('transaction.aspx'));
			$this->breadcrumb->append_crumb('Filter', site_url('transaction.aspx'));
			$this->load->view('backend/template',$data);
		}
	}

	public function update_state()
	{
		$total=$this->input->post('id');
		if($this->input->post('warning'))
		{
			$state=0;
			$alert="Data Transaksi Berhasil Di Perbarui";
		}
		elseif($this->input->post('fixed'))
		{
			$state=2;
			$alert="Data Transaksi Berhasil Di Perbarui";
		}
		else
		{
			for ($i=0; $i < count($total); $i++) 
			{ 
				$id       =$total[$i];
				$getTrans =$this->M__app->gradeone('transaction','id_transaction',$id)->row_array();
				if(file_exists('uploads/bukti/'.$getTrans['bukti']))
				{
					unlink('uploads/bukti/'.$getTrans['bukti']);
				}
				$get=$this->M__app->gradeone('transaction_details','id_transaction',$id)->result_array();

				foreach ($get as $items)
				{
					$prd       =$this->M__app->gradeone('product','id_product',$items['id_product'])->row_array();
					$new_stock =$prd['stock_product']+$items['qty_transaction'];
		            $update=array(
		            	"stock_product"=>$new_stock,
		            );
		            $this->M__app->update('product',$update,'id_product',$items['id_product']);
				}

				$this->M__app->delete('transaction','id_transaction',$total[$i]);
				$this->M__app->delete('transaction_details','id_transaction',$total[$i]);
			}

			$this->session->set_flashdata('success','Data Transaksi Berhasil Di Hapus');
			redirect('transaction.aspx');
		}

		if(!$this->input->post('delete'))
		{
			for ($i=0; $i < count($total); $i++) 
			{ 
				$data=array(
					"state"=>$state,
				);
				$this->M__app->update('transaction',$data,'id_transaction',$total[$i]);
			}
			$this->session->set_flashdata('success',$alert);
			redirect('transaction.aspx');
		}
	}

	public function send()
	{
		$this->form_validation->set_rules('id', 'id', 'trim|required');
		$id =filter($this->input->post('id'));
		$get =$this->M__app->gradeone('transaction','id_transaction',$id)->row_array();
        $this->form_validation->set_rules('no_resi', 'resi', 'trim|required');

		if(!in_array($get['city'], getarr(1)))
		{
			
        }
        else
        { 
            
        }
		if ($this->form_validation->run() == FALSE) 
		{
			$this->session->set_flashdata('error', 'Data Tidak Valid, Cek Data Anda Kembali!');
			redirect('detail_transaction.aspx/'.$this->input->post('id'));
		} 
		else 
		{
			$update=array(
				"no_resi"=>filter($this->input->post('no_resi')),
				"state"=>1
			);
			$this->M__app->update('transaction',$update,'id_transaction',$get['id_transaction']);
			
			email_config();
			$this->email->from(gettoko('email_shop'), gettoko('longname_shop')?gettoko('longname_shop'):gettoko('shortname_shop'));
		    $this->email->to($get['email']);
		    $this->email->set_newline("\r\n");
		    $this->email->subject('Konfirmasi Bukti Transfer');

		    if(gettoko('gratis_ongkir_wilayah')==1)
		    {
		    	if($get['city']==gettoko('kabupaten_shop'))
		    	{
		    		$this->email->message('Selamat pesanan anda dengan kode pembelian '.$get['kode_pembelian'].' telah dikirim!<br><br>Cek status pemesanan anda di menu <b><a href="'.site_url('order.aspx').'">Cek Pesanan</a></b><br> Terimakasih telah mempercayai kami.');
		    		
		    	}
		    	else
		    	{
		    		$this->email->message('Selamat pesanan anda dengan kode pembelian '.$get['kode_pembelian'].' telah dikirim!<br><br>Dengan No Resi :<b>'.$update['no_resi'].'</b><br>Cek status pemesanan anda di menu <b><a href="'.site_url('order.aspx').'">Cek Pesanan</a></b><br> Terimakasih telah mempercayai kami.');
		    	}
		    }

		    $this->email->message('Selamat pesanan anda dengan kode pembelian '.$get['kode_pembelian'].' telah dikirim!<br><br>Dengan No Resi :<b>'.$update['no_resi'].'</b><br>Cek status pemesanan anda di menu <b><a href="'.site_url('order.aspx').'">Cek Pesanan</a></b><br> Terimakasih telah mempercayai kami.');
			$this->email->send();

			$this->session->set_flashdata('success', 'Data Berhasil Di Perbarui');
			redirect('detail_transaction.aspx/'.$get['id_transaction']);
		}
	}

	public function print_transaction($id)
	{
		$trans=$this->M__app->gradeone('transaction','id_transaction',$id)->row_array();
		$data['details'] =$this->M__app->getdetails($id)->result_array();
		$data['get']     =$trans;

		if(in_array($trans['city'], getarr(1)))
		{
            $this->load->view('backend/transaction/prints.php',$data);
        }
        else
        { 
            $this->load->view('backend/transaction/print.php',$data);
        }
	}
}

