<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::orderBy('id',"desc");
    
        if($request->has('role_by')  && $request->role_by != '')
        {
            $query->where('role', $request->role_by);
        }
        if($request->has('status')  && $request->status != '')
        {
            $query->where('account_status', $request->status);
        }
        $users = $query->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'role'=>'required',
            'emp_id'=>'required|unique:user,empid',
            'designation'=>'required',
            'department'=> 'required',
            'grade'=> 'required',
            'company'=> 'required',
            'repostingto'=> 'required',
            'location'=> 'required',
            'dob'=> 'required',
            'mobilenumber'=> 'required',
        ]);
        $userLoginDetails =[
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'role'=> $request->role,
            'emp_id'=> $request->empid,
        ];
        // return $userLoginDetails;
        $user = User::create($userLoginDetails);
        $user_id = $user->id;
        $userDetails = UserDetail::create([
            'user_id'=>$user_id,
            'designation'=> $request->designation,
            'department'=> $request->department,
            'grade'=> $request->grade,
            'company'=> $request->company,
            'repostingto'=> $request->repostingto,
            'location'=> $request->location,
            'dob'=> $request->dob,
            'aadharno'=> $request->aadharno,
            'passportno'=> $request->passportno,
            'mobilenumber'=> $request->mobilenumber,
        ]);

        if ($userDetails){
            return redirect()->route('user.index');
        } else{
            return back();
            // return $userDetails;
        }


       
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
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
}
