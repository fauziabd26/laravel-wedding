<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $user = User::orderBy('created_at', 'DESC')->get();
        return view("admin.user.index", compact("user"));
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->back()->with("success", "Data Created Successfully");
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.profile.index', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->back()->with('success', 'Data Updated Successfully');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Data Deleted Successfully');
    }
}
