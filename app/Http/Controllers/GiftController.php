<?php

namespace App\Http\Controllers;

use App\Models\Gift;
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
        $gift = Gift::get();
        return view('admin.gift.index', compact('gift'));
    }

    public function update(Request $request, $id)
    {
        $gift = Gift::with('wedding')->where('wedding_id', Auth::user()->id)->findOrFail($id);
        $gift->update($request->all());
        return redirect()->back()->with('message', 'Data Updated Successfully');
    }
}
