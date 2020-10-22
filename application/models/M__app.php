<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M__app extends CI_Model {


	public function getdata($table)
	{
		return $this->db->get('shop_'.$table);
	}

	public function getdatagroup($table,$group)
	{
		$this->db->group_by($group);
		return $this->db->get('shop_'.$table);
	}

	public function getdata_user($table)
	{
		$this->db->where_not_in('id_user', '1');
		$q=$this->db->get('shop_'.$table);
		return $q;
	}

	public function saved($table,$data)
	{
		$this->db->insert('shop_'.$table, $data);
	}

	public function update($table,$data,$column_id,$id)
	{
		$this->db->where($column_id, $id);
		$this->db->update('shop_'.$table, $data);
	}

	public function update_skin($table,$data)
	{
		$this->db->update('shop_'.$table, $data);
	}

	public function update_setting($table,$data)
	{
		$this->db->update('shop_'.$table, $data);
	}

	public function gradeone($table,$column,$where)
	{
		$this->db->where($column, $where);
		return $this->db->get('shop_'.$table);
	}

	public function gradeone_not_in($table,$column,$where)
	{
		$this->db->where_not_in('id_user', '1');
		$this->db->where($column, $where);
		return $this->db->get('shop_'.$table);
	}

	public function getdataproduct()
	{
		$this->db->select('*');
		$this->db->from('shop_product');
		$this->db->join('shop_category', 'shop_product.category_product = shop_category.id_category');
		return $this->db->get();
	}

	public function getdatapayment()
	{
		$this->db->select('*');
		$this->db->from('shop_payment');
		$this->db->join('shop_bank', 'shop_payment.id_bank = shop_bank.id_bank');
		return $this->db->get();
	}

	public function getdatapaymentfront()
	{
		$this->db->select('*');
		$this->db->from('shop_payment');
		$this->db->join('shop_bank', 'shop_payment.id_bank = shop_bank.id_bank');
		$this->db->where('shop_payment.state', 1);
		return $this->db->get();
	}

	public function getdatapage($table,$offset)
	{
		$this->db->where('state_product', 1);
		$this->db->where("stock_product!='0'");
		$this->db->join('shop_category', 'shop_product.category_product = shop_category.id_category');
		$this->db->order_by('name_product','asc');
		return $this->db->get('shop_'.$table, 24, $offset);
	}

	public function getdatapage_($table,$offset)
	{
		$this->db->join('shop_category', 'shop_product.category_product = shop_category.id_category');
		$this->db->order_by('id_product', 'desc');
		return $this->db->get('shop_'.$table, 10, $offset);
	}

	public function getdatapagetransaction($offset)
	{
		$this->db->order_by('time_transaction', 'desc');
		return $this->db->get('shop_transaction', 24, $offset);
	}

	public function getdatasearch($q)
	{
		$v=htmlspecialchars($q);
		return $this->db->query("SELECT *
								FROM shop_product
								WHERE state_product='1'
								AND stock_product!='0'
								AND name_product LIKE '%$v%'
								OR price_product LIKE '%$v%'
								");
	}

	public function getdatasearchpage($q, $offset)
	{
		$v=htmlspecialchars($q);
		return $this->db->query("SELECT *
								FROM shop_product
								WHERE state_product='1'
								AND stock_product!='0'
								AND name_product LIKE '%$v%'
								OR price_product LIKE '%$v%'
								LIMIT 24 OFFSET $offset
								");
	}

	public function getdatacategory($id,$offset)
	{
		$this->db->where('category_product', $id);
		$this->db->where('state_product', 1);
		$this->db->where("stock_product!='0'");
		return $this->db->get('shop_product', 24, $offset);
	}

	public function getnewproduct()
	{
		$this->db->select('*');
		$this->db->from('shop_product');
		$this->db->where("stock_product!='0'");
		$this->db->where("state_product='1'");
		$this->db->join('shop_category', 'shop_product.category_product = shop_category.id_category');
		$this->db->order_by('id_product', 'desc');
		$this->db->limit(10);
		return $this->db->get();
	}

	public function getdetails($id)
	{
		$this->db->select('*');
		$this->db->from('shop_transaction_details');
		$this->db->join('shop_product', 'shop_transaction_details.id_product = shop_product.id_product');
		$this->db->where('shop_transaction_details.id_transaction', $id);
		return $this->db->get();
	}

	public function delete($table,$column,$id)
	{
		$this->db->where($column, $id);
		$this->db->delete('shop_'.$table);
	}

	public function getdaytrans($tanggal)
	{
		$this->db->where("LEFT(time_transaction,10)='$tanggal'");
		return $this->db->get('shop_transaction');
	}

	public function getDataFilter($off)
	{
		$where=$this->formSearch();
		$db=$this->db->query("SELECT * FROM
							shop_product
							JOIN shop_category
							ON shop_product.category_product=shop_category.id_category
							".$where."
							LIMIT 10
							OFFSET $off");
		return $db;
	}

	public function getJumlahFilter()
	{
		$where=$this->formSearch();
		$db=$this->db->query("SELECT * FROM
							shop_product
							JOIN shop_category
							ON shop_product.category_product=shop_category.id_category
							".$where."");
		return $db;
	}

	public function formSearch()
	{
		$where="";
		$product=$this->session->userdata('product');
		$price=$this->session->userdata('price');
		$dis=$this->session->userdata('filter-dis');
		$stock=$this->session->userdata('stock');
		$weight=$this->session->userdata('weight');
		$category=$this->session->userdata('category');
		if($product!=""){
			$where .= " AND name_product LIKE '%$product%'";
		}
		if($dis!=""){
			if($dis=="2"){
				$dis_=0;
			}else{
				$dis_=$dis;
			}
			$where .= " AND state_discount='$dis_'";
			if($price!=""){
				$where .= " AND discount_product LIKE '%$price%'";
			}
		}else{
			if($price!=""){
				$where .= " AND price_product LIKE '%$price%'";
			}
		}
		if($stock!=""){
			$where .= " AND stock_product='$stock'";
		}
		if($weight!=""){
			$where .= " AND weight_product='$weight'";
		}
		if($category!=""){
			$where .= " AND category_product='$category'";
		}
		return $where;
	}

	public function getInvoice(){
		$q = $this->db->query("SELECT MAX(RIGHT('no_invoice',9)) AS idmax FROM shop_transaction");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->idmax)+1;
            	$kd = sprintf("%09s", $tmp);
            }
        }else{
            $kd = "000000001";
        }
        $kodemax =  'INV-'.$kd;
        return $kodemax;
	}

	public function getdatapaymentId($id)
	{
		$this->db->select('*');
		$this->db->from('shop_payment');
		$this->db->join('shop_bank', 'shop_payment.id_bank = shop_bank.id_bank');
		$this->db->where('id_payment', $id);
		return $this->db->get();
	}

	public function getTransSearch($off='')
	{
		$where=$this->formSearchTrans();
		$db=$this->db->query("SELECT * FROM
							shop_transaction
							WHERE id_transaction!=''
							".$where."
							LIMIT 24
							OFFSET $off");
		return $db;
	}

	public function getTransNum()
	{
		$where=$this->formSearchTrans();
		$db=$this->db->query("SELECT * FROM
							shop_transaction
							WHERE id_transaction!=''
							".$where."");
		return $db;
	}

	public function formSearchTrans()
	{
		$where="";
		$nama=$this->session->userdata('nama');
		$email=$this->session->userdata('email');
		$telepon=$this->session->userdata('telepon');
		$tanggal=$this->session->userdata('tanggal');
		$status=$this->session->userdata('status');
		if($nama!=""){
			$where .= " AND name_customer LIKE '%$nama%'";
		}
		if($email!=""){
			$where .= " AND email LIKE '%$email%'";
		}
		if($telepon!=""){
			$where .= " AND phone LIKE '%$telepon%'";
		}
		if($tanggal!=""){
			$where .= " AND LEFT(time_transaction,10)='$tanggal'";
		}
		if($status!=""){
			$where .= " AND state='$status'";
		}
		return $where;
	}

	public function getTestimoni($off,$state=1)
	{
		if ($state==1) {
			$this->db->where('state', $state);
		}else{
		}
		$this->db->order_by('time', 'desc');
		return $this->db->get('shop_testimoni', 10, $off);
	}

	public function getPage($table,$off)
	{
		return $this->db->get('shop_'.$table, 10, $off);
	}

	public function getProductTerkait($id_category,$id_product)
	{
		$this->db->where("id_product!='$id_product'");
		$this->db->where('category_product', $id_category);
		return $this->db->get('shop_product',5);
	}

	public function slugEdit($slug,$product_id)
	{
		$this->db->where('slug_product',$slug);
		$this->db->where("id_product!='$product_id'");
		return $this->db->get('shop_product');
	}

	function cek($jenis, $kabupaten, $provinsi)
	{
		$this->db->where('id_kab', $kabupaten);
		$this->db->where('id_provinsi', $provinsi);
		$this->db->where('state', $jenis);
		return $this->db->get('shop_options');
	}
}

/* End of file M__app.php */
/* Location: ./application/models/M__app.php */
