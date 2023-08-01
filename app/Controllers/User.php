<?php

namespace App\Controllers;

class User extends BaseController
{
	public function index()
	{
		$data['title'] = 'My Profile';
		
		return view('user/index', $data);
	}
}
