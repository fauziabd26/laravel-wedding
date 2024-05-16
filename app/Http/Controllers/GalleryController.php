<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->is_admin == 1) {
            $gallery = Galery::all();
            return view('admin.gallery.index', compact('gallery'));
        } else {
            $wedding = Wedding::where('user_id', Auth::user()->id)->first();
            if ($wedding === null) {
                $wedding = Wedding::where('user_id', Auth::user()->id)->first();
                return view('admin.gallery.empty', compact('wedding'));
            } else {
                $wedding = Wedding::where('user_id', Auth::user()->id)->first();
                $gallery = Galery::where('wedding_id', $wedding->id)->first();
                return view('admin.gallery.index', compact('gallery', 'wedding'));
            }
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'gallery1' => 'required|mimes:jpeg,png,jpg',
            'gallery2' => 'required|mimes:jpeg,png,jpg',
            'gallery3' => 'required|mimes:jpeg,png,jpg',
            'gallery4' => 'mimes:jpeg,png,jpg',
            'gallery5' => 'mimes:jpeg,png,jpg',
            'gallery6' => 'mimes:jpeg,png,jpg',
        ]);
   
        $wedding = Wedding::where('user_id', Auth::user()->id)->first();
        $photo1   = $request->file('gallery1');
        $photo2   = $request->file('gallery2');
        $photo3   = $request->file('gallery3');
        $photo4   = $request->file('gallery4');
        $photo5   = $request->file('gallery5');
        $photo6   = $request->file('gallery6');
        $photo1->storeAs('public/gallery/', $photo1->getClientOriginalName());
        $photo2->storeAs('public/gallery/', $photo2->getClientOriginalName());
        $photo3->storeAs('public/gallery/', $photo3->getClientOriginalName());
        $photo4->storeAs('public/gallery/', $photo4->getClientOriginalName());
        $photo5->storeAs('public/gallery/', $photo5->getClientOriginalName());
        $photo6->storeAs('public/gallery/', $photo6->getClientOriginalName());
        
        
        Galery::create(array_merge($request->all(), [
            'wedding_id' => $wedding->id,
            'gallery1'      => $photo1->getClientOriginalName(),
            'gallery2'      => $photo2->getClientOriginalName(),
            'gallery3'      => $photo3->getClientOriginalName(),
            'gallery4'      => $photo4->getClientOriginalName(),
            'gallery5'      => $photo5->getClientOriginalName(),
            'gallery6'      => $photo6->getClientOriginalName(),
        ]));
        Alert::success('Success', 'Data Created Successfully');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $gallery = Galery::findOrFail($id);
        $gallery->update($request->all());
        Alert::success('Success', 'Data Updated Successfully');
        return redirect()->back();
    }

    public function delete($id)
    {
        $gallery = Galery::findOrFail($id);
        $gallery->delete();
        Alert::success('Success', 'Data Deleted Successfully');
        return redirect()->back();
    }
}
