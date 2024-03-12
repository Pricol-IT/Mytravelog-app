<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{

    public function mytripexpenses()
    {
        $user_id = auth()->user()->id;
        $trips = Trip::where('user_id', $user_id)->where('status', '=', 'approved')->orderBy('id', 'desc')->get();
        // return $trips;
        return view('user.expense.mytrip', compact('trips'));
    }

    public function viewexpensesummary($id)
    {
        $trip = Trip::with(['flight', 'train', 'bus', 'taxi', 'accommodation', 'advance', 'connectivity', 'forex', 'history'])->find($id);

        return view('user.expense.summary', compact('trip'));
    }

    public function addexpense(Request $request)
    {
        return view('user.expense.addexpense');
    }

    public function storeexpense(Request $request)
    {
        $input = [
            'tripid' => $request->tripid,
            'service' => $request->service,
            'from' => $request->from,
            'to' => $request->to,
            'cost' => $request->cost,
        ];

        if ($image = $request->ticket[0]) {
            $url = uploadImage($image, 'proofs');
            $input['ticket'] = $url;
        }
        return $input;
    }

}
