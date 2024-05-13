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
        $wedding = Wedding::where('user_id', Auth::user()->id)->first();
        if ($request->hasFile('gallery1')) {
            $photo   = $request->file('gallery1');
            $photo->storeAs('public/gallery/', $photo->getClientOriginalName());
            Galery::create(array_merge($request->all(), [
                'wedding_id' => $wedding->id,
                'gallery1'      => $photo->getClientOriginalName()
            ]));
        } elseif ($request->hasFile('gallery2')) {
            $photo   = $request->file('gallery2');
            $photo->storeAs('public/gallery/', $photo->getClientOriginalName());
            Galery::create(array_merge($request->all(), [
                'wedding_id' => $wedding->id,
                'gallery2'      => $photo->getClientOriginalName()
            ]));
        } elseif ($request->hasFile('gallery3')) {
            $photo   = $request->file('gallery3');
            $photo->storeAs('public/gallery/', $photo->getClientOriginalName());
            Galery::create(array_merge($request->all(), [
                'wedding_id' => $wedding->id,
                'gallery3'      => $photo->getClientOriginalName()
            ]));
        } elseif ($request->hasFile('gallery4')) {
            $photo   = $request->file('gallery4');
            $photo->storeAs('public/gallery/', $photo->getClientOriginalName());
            Galery::create(array_merge($request->all(), [
                'wedding_id' => $wedding->id,
                'gallery4'      => $photo->getClientOriginalName()
            ]));
        } elseif ($request->hasFile('gallery5')) {
            $photo   = $request->file('gallery5');
            $photo->storeAs('public/gallery/', $photo->getClientOriginalName());
            Galery::create(array_merge($request->all(), [
                'wedding_id' => $wedding->id,
                'gallery5'      => $photo->getClientOriginalName()
            ]));
        } elseif ($request->hasFile('gallery6')) {
            $photo   = $request->file('gallery6');
            $photo->storeAs('public/gallery/', $photo->getClientOriginalName());
            Galery::create(array_merge($request->all(), [
                'wedding_id' => $wedding->id,
                'gallery6'      => $photo->getClientOriginalName()
            ]));
        } else {
            Galery::create(array_merge($request->all(), [
                'wedding_id' => $wedding->id,
            ]));
        }
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
