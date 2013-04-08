<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/gitpush', function()
{
	$outfile = tempnam(".", "cmd");
    $errfile = tempnam(".", "cmd");
    $descriptorspec = array(
        0 => array("pipe", "r"),
        1 => array("file", $outfile, "w"),
        2 => array("file", $errfile, "w")
    );
    $proc = proc_open("/bin/bash /home/codemonkey/collegeconnect-push.sh", $descriptorspec, $pipes);

    if (is_resource($proc))
    {
	    fclose($pipes[0]);    //Don't really want to give any input

	    $exit = proc_close($proc);
	    $stdout = file($outfile);
	    $stderr = file($errfile);

	    unlink($outfile);
	    unlink($errfile);

		Log::info(print_r($stdout, true) . PHP_EOL . print_r($stderr, true));
	}
	else
	{
		Log::error('Could not open process for gitpush');
	}
});