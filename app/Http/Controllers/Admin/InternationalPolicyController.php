<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InternationalPolicy;
use DB;
class InternationalPolicyController extends Controller
{
    public function index()
    {
        $internationalpolicies = InternationalPolicy::distinct()->get(['components']);
        return view("admin.international_policy.index", compact("internationalpolicies"));
    }

    
    public function create()
    {
        return view("admin.international_policy.create");
    }

  
    public function store(Request $request)
    {
        // return $request;
        $category=['Junior Management','Middle Management','Senior Management','CXOs & Directors'];
        
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
    public function show(string $components)
    {
        $internationalpolicies = InternationalPolicy::where('components',$components)->get();
        // return $internationalpolicies;
        return view('admin.international_policy.view', compact("internationalpolicies"));
    }

    
    public function edit(string $components)
    {
        $internationalpolicies = InternationalPolicy::where('components',$components)->get();
        // return $internationalpolicies;
        return view('admin.international_policy.edit', compact("internationalpolicies"));
    }

  
    public function update(Request $request, string $components)
    {
        $category=['Junior Management','Middle Management','Senior Management','CXOs & Directors'];

        $id = InternationalPolicy::where('components',$components)->get();

        // return $id[0]->id;
        
        for ($i = 0; $i < count($category); $i++) {
            $internationalpolicy = InternationalPolicy::find($id[$i]->id)->update([
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

    public function destroy(string $id)
    {
        //
    }
}
