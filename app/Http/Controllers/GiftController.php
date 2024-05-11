<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GiftController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->is_admin == 1) {
            $gift = Gift::get();
        } else {
            $wedding = Wedding::where('user_id', Auth::user()->id)->first();
            if($wedding === null){
                return view('admin.gift.empty');
            }
            $gift = Gift::where('wedding_id', $wedding->id)->first();
        }
        
        return view('admin.gift.index', compact('gift'));
    }

    public function store(Request $request)
    {
        Gift::create($request->all());
        return redirect()->back()->with('success', 'Data Created Successfully');
    }

    public function update(Request $request, $id)
    {
        $gift = Gift::with('wedding')->where('wedding_id', Auth::user()->id)->findOrFail($id);
        $gift->update($request->all());
        return redirect()->back()->with('message', 'Data Updated Successfully');
    }

    public function destroy($id)
    {
        $gift = Gift::findOrFail($id);
        $gift->delete();
        return redirect()->back()->with('success', 'Data Deleted Successfully');
    }
}
