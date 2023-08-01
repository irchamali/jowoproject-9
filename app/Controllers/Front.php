<?php

namespace App\Controllers;

class Front extends BaseController
{
	public function index()
	{
		return view('home/index');
	}
}