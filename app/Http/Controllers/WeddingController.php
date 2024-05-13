<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WeddingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->is_admin == 1) {
            $wedding = Wedding::all();
        } else {
            $wedding = Wedding::where('user_id', Auth::user()->id)->first();
        }
        return view('admin.wedding.index', compact('wedding'));
    }

    public function store(Request $request)
    {
        Wedding::create(array_merge($request->all(), [
            'status'    => 1,
            'user_id'   => Auth::user()->id
        ]));
        Alert::success('Success!', 'Data Created Successfully');
        return redirect()->back();
    }

    public function update(Request $request, string $id)
    {
        $wedding = Wedding::findOrFail($id);
        $wedding->update($request->all());

        Alert::success('Success!', 'Data Updated successfully');
        return redirect()->back();
    }
}
