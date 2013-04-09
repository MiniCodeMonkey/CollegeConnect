<?php

class CollegesController extends BaseController {

	public function getIndex()
	{
		// Only show colleges with more than 1500 students
		return College::where('student_population', '>', 1500)->get();
	}

}