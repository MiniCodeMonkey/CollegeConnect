<?php

class LoginController extends BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth.fb'); // Make sure that we are Facebook authenticated
	}

	public function getIndex()
	{
		$facebook = new Facebook(array(
		  'appId'  => Config::get('facebook.app_id'),
		  'secret' => Config::get('facebook.app_secret'),
		));

		$fbUserProfile = $facebook->api('/me');

		$user = User::fromFacebookId($fbUserProfile['id']);

		if (!$user) {
			$user = new User;
			$user->name = $fbUserProfile['name'];
			$user->fb_id = $fbUserProfile['id'];
			$user->fb_accesstoken = $facebook->getAccessToken();
			$user->user_type = Session::get('user_type', 'STUDENT');
			$user->save();

			Session::forget('user_type');
		}

		// If user is ambassador, make sure that they have selected their college
		if ($user->user_type == 'AMBASSADOR' && is_null($user->college_id)) {
			return View::make('pages.login.register_ambassador')
				->with('user', $user)
				->with('user_profile', $fbUserProfile);
		}

		// We are authenticated!
		Auth::loginUsingId($user->id);
		return Redirect::to('/');
	}

	public function postIndex()
	{
		$rules = array(
			'college' => array('required')
		);

		$validator = Validator::make(Input::all(), $rules);
		
		if ($validator->fails())
		{
			return Redirect::to('login')->withInput()->withErrors($validator);
		}
		else
		{
			$college = Input::get('college');

			//insert into database
			$facebook = new Facebook(array(
				'appId'  => Config::get('facebook.app_id'),
				'secret' => Config::get('facebook.app_secret')
			));

			$profile = $facebook->api('/me');


			//geocode

			$facebook_id = $profile['id'];
			$user = User::fromFacebookId($facebook_id);

			//does college exist
			$db_college = College::getByName($college);

			if (!$db_college)
			{
				$db_college = new College;
				$db_college->name = $college;
				$db_college->save();
			}

			$user->college_id = $db_college->id;
			$user->save();

			Auth::loginUsingId($user->id);
			return Redirect::to('/');

		}
	
	}

	/**
	 * Log out
	 */
	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

}