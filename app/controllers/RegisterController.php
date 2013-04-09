<?php

class RegisterController extends BaseController {

	public function getStudent()
	{
		Session::put('user_type', 'STUDENT');

		return Redirect::to('/login');
	}

	public function getAmbassador()
	{
		Session::put('user_type', 'AMBASSADOR');

		return Redirect::to('/login');
	}

}