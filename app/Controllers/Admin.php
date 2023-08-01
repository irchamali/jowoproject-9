<?php

namespace App\Controllers;

class Admin extends BaseController
{
	protected $db, $builder;
	public function __construct()
	{
		$this->db	= \Config\Database::connect();
		$this->builder = $this->db->table('users');
	}

	public function index()
	{
		$data['title'] = 'User List';
		// $users = new \Myth\Auth\Models\UserModel();
		// $data['users'] = $users->findAll();
		// $db		= \Config\Database::connect();
		// $builder = $db->table('users');
		$this->builder->select('users.id as userid, username, email, name');
		$this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
		$this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
		$query = $this->builder->get(); 

		$data['users'] = $query->getResult();
		
		return view('admin/index', $data);
	}

	public function detail($id = 0)
	{
		$data['title'] = 'User Detail';
		
		$this->builder->select('users.id as userid, username, email, fullname, user_image, name');
		$this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
		$this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
		$this->builder->where('users.id', $id);
		$query = $this->builder->get(); 
		
		//ngambil satu baris= getrow
		$data['user'] = $query->getRow(); 

		if(empty($data['user'])){
			return redirect()->to('/admin');
		}
		
		return view('admin/detail', $data);
	}
	
}
