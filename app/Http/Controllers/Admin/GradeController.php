<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::all();
        return view("admin.grade.index", compact("grades"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.grade.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $input = $request->validate([
            "levels"=> "required",
            "category"=> "required",
            "designation"=> "required",
        ]);
        // return $input;
        switch ($request->category) {
            case "Senior Management":
                $select_column = "senior_tier1,senior_tier2,senior_tier3";
                break;
            case "Middle Management":
                $select_column = "middle_tier1,middle_tier2,middle_tier3";
                break;
            case "Junior Management":
                $select_column = "junior_tier1,junior_tier2,junior_tier3";
                break;
            default:
            $select_column = "junior_tier1,junior_tier2,junior_tier3";
        }

        $grade = Grade::create([
            "levels"=> $request->levels,
            "select_column"=> $select_column,
            "category"=> $request->category,
            "designation"=> $request->designation,
        ]);
        if ($grade){
            return redirect()->route('grade.index');
        } else{
            return back();
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $grade = Grade::find($id);
        return view('admin.grade.view', compact("grade"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $grade = Grade::find($id);
        return view('admin.grade.edit', compact("grade"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            "levels"=> "required",
            "category"=> "required",
            "designation"=> "required",
        ]);
        // return $input;
        switch ($request->category) {
            case "Senior Management":
                $select_column = "senior_tier1,senior_tier2,senior_tier3";
                break;
            case "Middle Management":
                $select_column = "middle_tier1,middle_tier2,middle_tier3";
                break;
            case "Junior Management":
                $select_column = "junior_tier1,junior_tier2,junior_tier3";
                break;
            default:
            $select_column = "junior_tier1,junior_tier2,junior_tier3";
        }

        $grade = Grade::find($id)->update([
            "levels"=> $request->levels,
            "select_column"=> $select_column,
            "category"=> $request->category,
            "designation"=> $request->designation,
        ]);
        
        if ($grade){
            return redirect()->route('grade.index');
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
