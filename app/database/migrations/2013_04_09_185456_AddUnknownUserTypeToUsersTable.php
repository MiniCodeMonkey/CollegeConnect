<?php

use Illuminate\Database\Migrations\Migration;

class AddUnknownUserTypeToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($t)
		{
			$t->dropColumn('user_type');
			$t->dropColumn('college_id');
		});

		Schema::table('users', function($t)
		{
			$t->enum('user_type', array('UNKNOWN', 'STUDENT', 'AMBASSADOR'))->default('UNKNOWN');
			$t->integer('college_id')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($t)
		{
			$t->dropColumn('user_type');
		});

		Schema::table('users', function($t)
		{
			$t->enum('user_type', array('STUDENT', 'AMBASSADOR'));
		});
	}

}