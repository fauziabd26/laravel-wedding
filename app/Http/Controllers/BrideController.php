<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Bride;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BrideController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->is_admin == 1) {
            $bride = Bride::all();
            $bank = Bank::orderBy('name', 'ASC')->get();
            return view('admin.bride.index', compact('bride', 'bank'));
        } elseif (Auth::user()->is_admin == 0) {
            $wedding_id = Wedding::where('user_id', Auth::user()->id)->first();
            if ($wedding_id === null) {
                $wedding_id = Wedding::where('user_id', Auth::user()->id)->first();
                $bride = Bride::with('Bank', 'Wedding')->get();
                return view('admin.bride.index', compact('bride','wedding_id'));
            } else {
                $bride = Bride::with('Bank', 'Wedding')->where('wedding_id', $wedding_id->id)->get();
                $bank = Bank::orderBy('name', 'ASC')->get();
            }
        }
        return view('admin.bride.index', compact('bride', 'bank', 'wedding_id'));
    }

    public function store(Request $request)
    {
        $wedding = Wedding::where('user_id', Auth::user()->id)->first();
        if ($request->hasFile('photo')) {
            $photo   = $request->file('photo');
            $photo->storeAs('public/bride/', $photo->getClientOriginalName());
            Bride::create(array_merge($request->all(), [
                'wedding_id' => $wedding->id,
                'photo'      => $photo->getClientOriginalName()
            ]));
            Alert::success('Success', 'Data Created Successfully');
        } else {
            Bride::create(array_merge($request->all(), [
                'wedding_id' => $wedding->id,
                'instagram' => 'https://www.instagram.com/' . $request->instagram,
            ]));
            Alert::success('Success', 'Data Created Successfully');
        }
        return redirect()->back();
    }

    public function update(Request $request, string $id)
    {
        $bride = Bride::findOrFail($id);
        if ($request->hasFile('photo')) {
            $photo   = $request->file('photo');
            $photo->storeAs('public/bride/', $photo->getClientOriginalName());
            Storage::delete('public/bride/' . $bride->photo);
            $bride->update(array_merge($request->all(), [
                'photo'      => $photo->getClientOriginalName(),
            ]));
            Alert::success('Success!', 'Data Updated Successfully');
            return redirect()->back();
        } else {
            $bride->update($request->all());
            Alert::success('Success!', 'Data Updated Successfully');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $bride = Bride::findOrFail($id);
        $bride->delete();
        alert()->success('Success!', 'Data Deleted Successfully');
        return redirect()->back();
    }
}
