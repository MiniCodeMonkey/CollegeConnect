<?php

class College extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'colleges';
	public $timestamps = FALSE;

	public static function getByName($name)
	{
		return College::where('name', $name)->first();
	}
}