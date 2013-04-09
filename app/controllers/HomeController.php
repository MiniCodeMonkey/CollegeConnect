<?php

class HomeController extends BaseController {

	public function showWelcome()
	{
		// Is user logged in
		if (Auth::check())
		{
			$user = Auth::user();

			if ($user->user_type == 'AMBASSADOR')
			{
				if (is_null($user->college_id)) {
					return Redirect::to('login');
				}

				return View::make('pages.ambassadors.index')
					->with('user', $user);
			}
			elseif ($user->user_type == 'STUDENT')
			{
				return View::make('pages.students.index')
					->with('user', $user);
			}
		}

		return View::make('pages.index');
	}

}