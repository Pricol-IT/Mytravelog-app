<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Expense;
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
        $trip = Trip::with(['flight', 'train', 'bus', 'taxi', 'accommodation', 'advance', 'connectivity', 'forex', 'history', 'expense'])->find($id);
        // $expense = Expense::where('trip_id',$id)->get();

        // return $trip;

        return view('user.expense.summary', compact('trip'));
    }

    public function addexpense($tripid)
    {
        // return $tripid;
        return view('user.expense.addexpense', compact('tripid'));
    }

    public function storeexpense(Request $request)
    {
        // return $request;
        $serviceCount = count($request->service);

        for ($i = 0; $i < $serviceCount; $i++) {
            $input = [
                'trip_id' => $request->tripid,
                'service' => $request->service[$i],
                'from' => $request->from[$i],
                'to' => $request->to[$i],
                'cost' => $request->cost[$i],
            ];

            if ($image = $request->ticket[$i]) {
                $url = uploadImage($image, 'proofs');
                $input['ticket'] = $url;
            }
            $expense = Expense::create($input);
            // return $input;
        }
        if ($expense) {
            toastr()->success('Trip Expense Added');
            return redirect()->route('user.expensesummary', $request->tripid);
        } else {
            toastr()->warning('Saved your trip');
            return redirect()->back();
        }
    }

    public function overallsummary($id)
    {
        // $trip = Trip::with(['flight', 'train', 'bus', 'taxi', 'accommodation', 'advance', 'connectivity', 'forex', 'history','expense'])->find($id);
        // $expense = Expense::where('trip_id',$id)->get();
        $expenses = Trip::with([
            'expense' => function ($query) {
                $query->selectRaw('service,trip_id,SUM(cost) as servicecost,COUNT(cost) as countcost')->groupBy('service', 'trip_id');
            }
        ])->where('status', 'approved')->find($id);
        // return $expenses;

        return view('user.expense.overallsummary', compact('expenses'));
    }

}
