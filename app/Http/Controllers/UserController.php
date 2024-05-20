<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

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
        Alert::success("success", "Data Created Successfully");
        return redirect()->back();
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
        Alert::success('success', 'Data Updated Successfully');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Alert::success('success', 'Data Deleted Successfully');
        return redirect()->back();
    }

    public function changePasswordSave(Request $request)
    {

        $this->validate($request, [
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:8|string'
        ]);
        $auth = Auth::user();

        // The passwords matches
        if (!Hash::check($request->get('current_password'), $auth->password)) {
            Alert::error('error', "Current Password is Invalid");
            return redirect()->back();
        }

        // Current password and new password same
        if (strcmp($request->get('current_password'), $request->new_password) == 0) {
            Alert::error("error", "New Password cannot be same as your current password.");
            return redirect()->back();
        }

        $user =  User::find($auth->id);
        $user->password =  Hash::make($request->new_password);
        $user->save();
        Alert::success('success', "Password Changed Successfully");
        return redirect()->back();
    }
    
    public function register(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin,
        ]);
        
        ALert::success('success', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('/');
    }
}
