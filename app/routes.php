<?php

	Route::get('/', function()
	{

		$facebook = new Facebook(array(
		  'appId'  => Config::get('facebook.app_id'),
		  'secret' => Config::get('facebook.app_secret'),
		));

		$user = $facebook->getUser();

		if ($user) {
		  try {
		    // Proceed knowing you have a logged in user who's authenticated.
		    $user_profile = $facebook->api('/me');
		  } catch (FacebookApiException $e) {
		    error_log($e);
		    $user = null;
		  }
		}

		if ($user) {
		  $url = $facebook->getLogoutUrl();
		} else {
		  $url = $facebook->getLoginUrl();
		}


		return View::make('pages.index')
			->with('url', $url);
	});

	

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