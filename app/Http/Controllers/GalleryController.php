<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $wedding = Wedding::where('user_id', Auth::user()->id)->first();
        $gallery = Galery::where('wedding_id', $wedding->id)->get();
        return view('admin.gallery.index', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Galery::findOrFail($id);
        $gallery->update($request->all());
        return redirect()->back()->with('message', 'Data Updated Successfully');
    }
}
