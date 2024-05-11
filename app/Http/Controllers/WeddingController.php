<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return redirect()->back()->with('success', 'Data Created Successfully');
    }

    public function update(Request $request, string $id)
    {
        $wedding = Wedding::findOrFail($id);
        $wedding->update($request->all());

        return redirect()->route('wedding.index')->with(['message' => 'Wedding updated successfully'], 201);
    }
}
