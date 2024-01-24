<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DomesticPolicy;

class DomesticPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $domesticpolicies = DomesticPolicy::all();
        // return $domesticpolicies;
        return view("admin.domestic_policy.index",compact("domesticpolicies"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.domestic_policy.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $input = $request->validate([
            "components"=> "required",
            "junior_tier1"=> "required",
            "junior_tier2"=> "required",
            "junior_tier3"=> "required",
            "middle_tier1"=> "required",
            "middle_tier2"=> "required",
            "middle_tier3"=> "required",
            "senior_tier1"=> "required",
            "senior_tier2"=> "required",
            "senior_tier3"=> "required",
        ]);

        // return $input;

        $domesticPolicyDetails = DomesticPolicy::create([
            "components"=> $request->components,
            "junior_tier1"=> $request->junior_tier1,
            "junior_tier2"=> $request->junior_tier2,
            "junior_tier3"=> $request->junior_tier3,
            "middle_tier1"=> $request->middle_tier1,
            "middle_tier2"=> $request->middle_tier2,
            "middle_tier3"=> $request->middle_tier3,
            "senior_tier1"=> $request->senior_tier1,
            "senior_tier2"=> $request->senior_tier2,
            "senior_tier3"=> $request->senior_tier3,
        ]);
        if ($domesticPolicyDetails){
            return redirect()->route('domestic_policy.index');
        } else{
            return back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $domesticpolicy = DomesticPolicy::find($id);
        return view('admin.domestic_policy.view', compact("domesticpolicy"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $domesticpolicy = DomesticPolicy::find($id);
        return view('admin.domestic_policy.edit', compact("domesticpolicy"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // return $request;
         $input = $request->validate([
            "components"=> "required",
            "junior_tier1"=> "required",
            "junior_tier2"=> "required",
            "junior_tier3"=> "required",
            "middle_tier1"=> "required",
            "middle_tier2"=> "required",
            "middle_tier3"=> "required",
            "senior_tier1"=> "required",
            "senior_tier2"=> "required",
            "senior_tier3"=> "required",
        ]);

        // return $input;

        $domesticPolicyDetails = DomesticPolicy::find($id)->update([
            "components"=> $request->components,
            "junior_tier1"=> $request->junior_tier1,
            "junior_tier2"=> $request->junior_tier2,
            "junior_tier3"=> $request->junior_tier3,
            "middle_tier1"=> $request->middle_tier1,
            "middle_tier2"=> $request->middle_tier2,
            "middle_tier3"=> $request->middle_tier3,
            "senior_tier1"=> $request->senior_tier1,
            "senior_tier2"=> $request->senior_tier2,
            "senior_tier3"=> $request->senior_tier3,
        ]);
        if ($domesticPolicyDetails){
            return redirect()->route('domestic_policy.index');
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
