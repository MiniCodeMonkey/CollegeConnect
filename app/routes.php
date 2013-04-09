<?php
// Home page
Route::get('/', 'HomeController@showWelcome');

// Login controller
Route::controller('login', 'LoginController');

// Register controller
Route::controller('register', 'RegisterController');

// Colleges controller
Route::controller('colleges', 'CollegesController');

// Logout
Route::get('/logout', 'LoginController@getLogout');


// gitpush route for allowing automatic "git pull" on the server
Route::any('gitpush', function()
{
	if (Input::get('token') != 'cG4mPcBh5uANgAxjwhAwkA9v') {
		Log::error('Invalid access token for gitpush');
		return Response::make('Invalid access token', 403);
	}

	$outfile = tempnam(".", "cmd");
    $errfile = tempnam(".", "cmd");
    $descriptorspec = array(
        0 => array("pipe", "r"),
        1 => array("file", $outfile, "w"),
        2 => array("file", $errfile, "w")
    );
    $proc = proc_open("sudo -u codemonkey /bin/bash /home/codemonkey/collegeconnect-push.sh", $descriptorspec, $pipes);

    if (is_resource($proc))
    {
	    fclose($pipes[0]);    //Don't really want to give any input

	    $exit = proc_close($proc);
	    $stdout = file($outfile);
	    $stderr = file($errfile);

	    unlink($outfile);
	    unlink($errfile);

		Log::info(print_r($stdout, true) . PHP_EOL . print_r($stderr, true));
		
		return Response::make('OK');
	}
	else
	{
		Log::error('Could not open process for gitpush');
		
		return Response::make('Server error', 500);
	}
});