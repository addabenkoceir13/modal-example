<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->get();

        return view('users.index', compact('users')); // Change the view name to 'users.index'
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
        $validator = Validator::make($request->all(), [
            'lname' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error($validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create($request->all());
        toastr()->success('User created successfully!');
        return redirect()->back(); // Change the route name to 'users.index'
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
        $validator = Validator::make($request->all(), [
            'lname' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'. $id,
            'phone' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error($validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::findOrFail($id)->update($request->all());
        toastr()->success('User updated successfully!');
        return redirect()->back(); // Change the route name to 'users.index'
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
        toastr()->success('User deleted successfully!');
        return redirect()->back(); // Change the route name to 'users.index'
    }
}
