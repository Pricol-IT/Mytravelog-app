<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

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

    
    public function create()
    {
        return view('admin.user.create');
    }

   
    public function store(Request $request)
    {
        // return $request;
        $input = $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'role'=>'required',
            'empid'=>'required|unique:users,emp_id',
            'designation'=>'required',
            'department'=> 'required',
            'grade'=> 'required',
            'company'=> 'required',
            'repostingto'=> 'required',
            'location'=> 'required',
            'dob'=> 'required',
            'mobilenumber'=> 'required',
        ]);
        //  return $input;
        $userLoginDetails =[
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'role'=> $request->role,
            'emp_id'=> $request->empid,
        ];
       
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
        $user = User::with('userdetail')->find($id);
       return view('admin.user.view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::with('userdetail')->find($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            // 'password'=> 'required',
            'role'=>'required',
            'empid'=>'required',
            'designation'=>'required',
            'department'=> 'required',
            'grade'=> 'required',
            'company'=> 'required',
            'repostingto'=> 'required',
            'location'=> 'required',
            'dob'=> 'required',
            'mobilenumber'=> 'required',
        ]);

        //  return $input;
        $userLoginDetails =[
            'name' => $request->name,
            'email'=> $request->email,
            'role'=> $request->role,
            'emp_id'=> $request->empid
        ];
        if($request->password !== null){
            $userLoginDetails['password'] = Hash::make($request->password);
        }
    //    return $userLoginDetails;
        $user = User::find($id)->update([$userLoginDetails]);
        $userDetails = UserDetail::where('user_id',$id)->update([
            'user_id'=>$id,
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
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function bulkupload(){
        return view('admin.user.bulkupload');
    }
    public function import(Request $request) 
{
    $request->validate([
        'uploadfile' => 'required|mimes:csv,xlsx,xls',
    ]);

    try {
        Excel::import(new UsersImport, $request->uploadfile);

        toastr('Users imported successfully');
        return back();
    } catch (\Throwable $th) {
        toastr($th->getMessage());
        return back();
    }
}
}
