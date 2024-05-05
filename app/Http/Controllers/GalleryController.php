<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $gallery = Galery::get();
        return view('admin.gallery.index', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Galery::findOrFail($id);
        $gallery->update($request->all());
        return redirect()->back()->with('message', 'Data Updated Successfully');
    }
}
