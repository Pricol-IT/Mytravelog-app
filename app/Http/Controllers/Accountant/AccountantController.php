<?php

namespace App\Http\Controllers\Accountant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Carbon\Carbon;
use App\Models\Trip;
use App\Models\Flight;
use App\Models\Train;
use App\Models\Taxi;
use App\Models\Bus;
use App\Models\Advance;
use App\Models\Accomadation;
use App\Models\Connectivity;
use App\Models\Forex;
use App\Models\History;

class AccountantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('accountant.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function viewsummary(string $id)
    {
        $advance = Advance::find($id);

        return view('accountant.advance.summary', compact('advance'));
        // return dd($advance);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function allrequests()
    {
        $advances = Advance::with('trip')->whereHas('trip', function ($query) {
            $query->where('status', 'approved');
        })->orderBy('id', 'desc')->get();
        return view('accountant.advance.allrequests', compact('advances'));
        // return $advances;
    }
    public function notprocessed()
    {
        $advances = Advance::with('trip')->whereHas('trip', function ($query) {
            $query->where('status', 'approved');
        })->where('status', 'not processed')->orderBy('id', 'desc')->get();
        return view('accountant.advance.notprocessed', compact('advances'));
    }

    public function inprogress()
    {
        $advances = Advance::with('trip')->whereHas('trip', function ($query) {
            $query->where('status', 'approved');
        })->where('status', 'inprogress')->orderBy('id', 'desc')->get();
        return view('accountant.advance.inprogress', compact('advances'));
    }

    public function completed()
    {
        $advances = Advance::with('trip')->whereHas('trip', function ($query) {
            $query->where('status', 'approved');
        })->where('status', 'completed')->orderBy('id', 'desc')->get();
        return view('accountant.advance.completed', compact('advances'));
    }

    public function startproceed( $id)
    {
        Advance::where('trip_id', $id)->update(['status' => 'inprogress']);
        $advance = Advance::where('trip_id', $id)->get();
        return view('accountant.advance.summary', compact('advance'));
        // return redirect()->route('accountant.summary', ['id' => $id]);
        // return $advance;
        // return $id;

    }

    public function expenses_allrequests()
    {
        $advances = Advance::with('trip')->whereHas('trip', function ($query) {
            $query->where('status', 'approved');
        })->orderBy('id', 'desc')->get();
        return view('accountant.expenses.allrequests', compact('advances'));
        // return $advances;
    }
    public function expenses_notprocessed()
    {
        $advances = Advance::with('trip')->whereHas('trip', function ($query) {
            $query->where('status', 'approved');
        })->where('status', 'not processed')->orderBy('id', 'desc')->get();
        return view('accountant.expenses.notprocessed', compact('advances'));
    }

    public function expenses_inprogress()
    {
        $advances = Advance::with('trip')->whereHas('trip', function ($query) {
            $query->where('status', 'approved');
        })->where('status', 'inprogress')->orderBy('id', 'desc')->get();
        return view('accountant.expenses.inprogress', compact('advances'));
    }

    public function expenses_completed()
    {
        $advances = Advance::with('trip')->whereHas('trip', function ($query) {
            $query->where('status', 'approved');
        })->where('status', 'completed')->orderBy('id', 'desc')->get();
        return view('accountant.expenses.completed', compact('advances'));
    }

    public function expenses_viewsummary(string $id)
    {
        $advance = Advance::find($id);

        return view('accountant.expenses.summary', compact('advance'));
        // return dd($advance);
    }
}
