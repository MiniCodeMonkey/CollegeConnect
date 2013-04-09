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
				->with('user_profile', $fbUserProfile);
		}

		// We are authenticated!
		Auth::loginUsingId($user->id);
		return Redirect::to('/');
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