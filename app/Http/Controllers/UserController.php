<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;

class UserController extends BaseController {

  public function getIndex()
	{
		$users =  User::all();
		
		return \View::make('user.index', ['users' => $users]);
	}
	
	/**
	 * Display a listing of the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = \User::all();

		return \View::make('user.index', ['users' => $users]);
	}

	/**
	 * Show the form for creating a new user.
	 *
	 * @return Response
	 */
	public function create()
	{
		return \View::make('user.create');
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = new User;

		
		$user->username   = \Input::get('username');
		$user->email      = \Input::get('email');
		$user->password   = Hash::make(\Input::get('password'));

		$user->save();

		return \Redirect::to('/user');
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = \User::find($id);

		return \View::make('user.edit', [ 'user' => $user ]);
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = \User::find($id);

		$user->username   = \Input::get('username');
		$user->email      = \Input::get('email');
		$user->password   = Hash::make(\Input::get('password'));

		$user->save();

		return \Redirect::to('/user');
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		\User::destroy($id);

		return \Redirect::to('/user');
	}

}