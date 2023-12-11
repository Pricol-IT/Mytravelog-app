<?php

namespace App\Services\User;

use DB;
use App\Models\Trip;

/**
 * Class UserDashboard.
 */
class UserDashboard
{
	public function execute()
	{
		$trips = DB::table('trips')
                ->select('status', DB::raw('count(*) as total'))
                ->where('user_id', auth()->user()->id)
                ->groupBy('status')
                ->get();
        $notifications = auth()->user()->notifications()->orderBy('created_at','desc')->get();

        return [
            'trips' => $trips,
            'notifications' => $notifications,
        ];
	}
}
