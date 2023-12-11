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

if (! function_exists('userNotifications')) {
    function userNotifications()
    {
        return auth()->user()->notifications()->orderBy('id','desc')->take(6)->get();
    }
}

if (! function_exists('userNotificationsCount')) {

    function userNotificationsCount()
    {

        return auth()->user()->notifications()->count();
    }
}

if (! function_exists('approverNotifications')) {
    function approverNotifications()
    {
        return auth()->user()->notifications()->orderBy('id','desc')->take(6)->get();
    }
}

if (! function_exists('approverNotificationsCount')) {

    function approverNotificationsCount()
    {

        return auth()->user()->notifications()->count();
    }
}

if (!function_exists('formatTime')) {
 
    function formatTime($date, $format = 'F d, Y H:i A')
    {
        return Carbon::parse($date)->format($format);
    }
}

if (!function_exists('dateFormat')) {
    function dateFormat($date, $format = 'F Y')
    {
        return \Carbon\Carbon::createFromFormat($format, $date)->toDateTimeString();
    }
}