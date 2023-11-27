<?php 
use Illuminate\Support\Facades\Session;
// use Carbon\Carbon;
use Illuminate\Support\Carbon;

if (! function_exists('authUser')) {
    function authUser()
    {
        return auth()->user();
    }
}

if (! function_exists('split_timestamp')) {
  function split_timestamp($timestamp) {
    	$datetime = new DateTime($timestamp);
    	$date = $datetime->format('Y-m-d');
    	$time = $datetime->format('H:i:s');
    	return array($date, $time);
	}
}

if (! function_exists('dateFormat')) {
    function dateFormat($date, $format = 'F Y')
    {
        return \Carbon\Carbon::createFromFormat($format, $date)->toDateTimeString();
    }
}


