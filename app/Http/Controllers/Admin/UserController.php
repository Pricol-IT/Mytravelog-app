<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::orderBy('id',"desc");
    //  return $request;

        // if($request->sort_by == 'latest' && $request->has('sort_by')  && $request->sort_by != null)
        // {
        //     // return $request;
        //     $query->latest();
        // }else{
        //     $query->oldest();
        //     // return $request;
        // }
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
        //
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
