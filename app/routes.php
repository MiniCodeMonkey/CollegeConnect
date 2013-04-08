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
	$stdout = $stderr = NULL;
	shell_exec("/bin/bash /home/codemonkey/collegeconnect-push.sh", $stdout, $stderr);
	Log::info(print_r($stdout, true) . PHP_EOL . print_r($stderr, true));

	function cmd_exec($cmd, &$stdout, &$stderr)
	{
	    $outfile = tempnam(".", "cmd");
	    $errfile = tempnam(".", "cmd");
	    $descriptorspec = array(
	        0 => array("pipe", "r"),
	        1 => array("file", $outfile, "w"),
	        2 => array("file", $errfile, "w")
	    );
	    $proc = proc_open($cmd, $descriptorspec, $pipes);

	    if (!is_resource($proc)) return 255;

	    fclose($pipes[0]);    //Don't really want to give any input

	    $exit = proc_close($proc);
	    $stdout = file($outfile);
	    $stderr = file($errfile);

	    unlink($outfile);
	    unlink($errfile);
	    return $exit;
	}
});