<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;

 class HomeController extends BaseController
{
	
	
   public function getIndex()
	{
		$users =  User::all();
		
		return \View::make('home.index', ['users' => $users]);
	}

	public function postIndex()
	{
		$users =  User::all();
		$username = \Input::get('username');
		$password = \Input::get('password');

		if (\Auth::attempt(['username' => $username, 'password' => $password]))
		{
			return \View::make('user.index', ['users' => $users]);
		}

	return \View::make('user.index', ['users' => $users]);
	}

	public function getLogin()
	{
		return \Redirect::to('/');
	}

	public function getLogout()
	{
		\Auth::logout();

		return \Redirect::to('/');
	}

}
