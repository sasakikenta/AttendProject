<?php

class AuthController extends BaseController {

	public function getLogin()
	{
		$default = ['' => '選択してください'];
		$users = $default + MstUser::select('id', DB::raw('CONCAT(id, ".", name1) AS name1'))->lists('name1','id');
		return View::make('auth.login', compact('users'));
	}

	public function postLogin()
	{
		$input = Input::only(array('username', 'password'));

		$auth = User::whereId($input['username'])->wherePass($input['password'])->first();
		if ($auth) {
			Auth::login($auth);
			return Redirect::route('hiro.index');
		} else {
			return Redirect::back()->withInput();
		}
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('/login');
	}

}
