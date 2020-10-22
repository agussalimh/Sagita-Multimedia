<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M__auth extends CI_Model {
	public function signin($username,$password)
	{
		$q=$this->db->where('username_user', $username)
						->where('password_user',$password)
						->where('state_user',1)
						->get('shop_user');
		return $q;
	}

}

/* End of file M__auth.php */
/* Location: ./application/models/M__auth.php */