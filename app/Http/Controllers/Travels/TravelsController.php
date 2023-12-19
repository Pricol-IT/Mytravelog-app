<?php

namespace App\Http\Controllers\Travels;

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


class TravelsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('travels.dashboard');
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
    public function show(string $id)
    {
        //
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
        $trips = Trip::with(['flight', 'train', 'bus', 'taxi'])->where('status', '=', 'approved')->orderBy('id', 'desc')->get();
        return view('travels.requests.allrequests', compact('trips'));
    }

    public function notprocessed()
    {
        $trips = Trip::with(['flight', 'train', 'bus', 'taxi'])->where('status', '=', 'approved')->orderBy('id', 'desc')->get();
        return view('travels.requests.notprocessed', compact('trips'));
    }

    public function inprogress()
    {
        $trips = Trip::with(['flight', 'train', 'bus', 'taxi'])->where('status', '=', 'approved')->orderBy('id', 'desc')->get();
        return view('travels.requests.inprogress', compact('trips'));
    }

    public function completed()
    {
        $trips = Trip::with(['flight', 'train', 'bus', 'taxi'])->where('status', '=', 'approved')->orderBy('id', 'desc')->get();
        return view('travels.requests.completed', compact('trips'));
    }
}

