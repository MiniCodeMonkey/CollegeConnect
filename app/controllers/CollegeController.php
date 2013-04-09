<?php

class CollegeController extends BaseController {
	
	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	public function showCollege($college_id)
	{
		$college = College::find($college_id);

		return View::make('pages.students.college')
			->with('college', $college)
			->with('user', Auth::user());
	}

}