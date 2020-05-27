<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function distributors_list($limit='0')
	{
		$query=$this->db->get('distributors');
		return $query->result();
	}

	//get user detail
	public function getUserDetail($id)
	{
		$condition=array('id'=>$id);
		$query=$this->db->get_where('users', $condition);
		return $query->row_array();
	}
	
	//insert user
	public function insert_distributor($data)
	{
		$this->db->insert('distributors', $data);
		//$insertId = $this->db->insert_id();
		if ($this->db->affected_rows() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	//update user
	public function update_distributor($id, $userData)
	{
		$query=$this->db->update('distributors', $userData, array('id'=>$id));
		return $query;
	}

	//delete user
	public function delete_distributor($id)
	{
		$query=$this->db->delete('distributors', array('id'=>$id));
		return $query;
	}

	//deactivate user
	function deactivate_distributor($id)
	{
		$status = array(
			'status'  => 0
		);
		$query = $this->db->update('distributors', $status, array('id'=>$id));
		return $query;
	}

	function activate_distributor($id)
	{
		$status = array(
			'status'  => 1
		);
		$query = $this->db->update('distributors', $status, array('id'=>$id));
		return $query;
	}
	

	function _getMethodName()
	{
		return $this->router->method;
	}

	function userField()
	{
		return $this->_getMethodName()=="add_distributor"?'enabled':'disabled';
	}

	function isEditPage()
	{
		return $this->_getMethodName()=="view"?true:false;
	}

	function btnName()
	{
		return $this->_getMethodName()=="add_distributor"?'Add User':'Edit User';
	}
}