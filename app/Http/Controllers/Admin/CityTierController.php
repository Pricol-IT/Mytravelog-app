<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CityTier;

class CityTierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = CityTier::all();
        return view("admin.city_tier.index", compact("cities"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.city_tier.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $input = $request->validate([
            "tier"=> "required",
            "cities"=> "required",
        ]);
        // return $input;
        $cityTiers = CityTier::create([
            "tier"=> $request->tier,
            "cities"=> $request->cities,
        ]);
        if ($cityTiers){
            return redirect()->route('city_tier.index');
        } else{
            return back();
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cityTier = CityTier::find($id);
        return view('admin.city_tier.view', compact("cityTier"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cityTier = CityTier::find($id);
        return view('admin.city_tier.edit', compact("cityTier"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            "tier"=> "required",
            "cities"=> "required",
        ]);
        $cityTiers = CityTier::find($id)->update([
            "tier"=> $request->tier,
            "cities"=> $request->cities,
        ]);
        if ($cityTiers){
            return redirect()->route('city_tier.index');
        } else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
