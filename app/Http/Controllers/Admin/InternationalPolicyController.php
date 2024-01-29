<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InternationalPolicy;
use DB;
class InternationalPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $internationalpolicies = InternationalPolicy::distinct()->get(['components']);
        return view("admin.international_policy.index", compact("internationalpolicies"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.international_policy.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $category=['Senior Management','Middle Management','Junior Management','CXOs & Directors'];
        
        for ($i = 0; $i < count($category); $i++) {
            $internationalpolicy = InternationalPolicy::create([
                'components'=> $request->components,
                'level'=> $category[$i],
                'us'=> $request->us[$i],
                'uk'=> $request->uk[$i],
                'europe'=> $request->europe[$i],
                'asean'=> $request->asean[$i],
                'brazil'=> $request->brazil[$i],
                'mexico'=> $request->mexico[$i],
                'india'=> $request->india[$i],
            ]);
        }
        
        if ($internationalpolicy){
            return redirect()->route('international_policy.index');
        } else{
            return back();
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $internationalpolicy = InternationalPolicy::find($id);
        return view('admin.international_policy.view', compact("internationalpolicy"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $internationalpolicy = InternationalPolicy::find($id);
        return view('admin.international_policy.edit', compact("internationalpolicy"));
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
}
