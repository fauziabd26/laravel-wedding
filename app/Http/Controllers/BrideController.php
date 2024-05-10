<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Bride;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BrideController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $wedding_id = Wedding::where('user_id', Auth::user()->id)->first();
        $wedding = Wedding::where('user_id', Auth::user()->id)->exists();
        if ($wedding) {
            $bride = Bride::with('Bank', 'Wedding')->where('wedding_id', $wedding_id->id)->get();
            $bank = Bank::all();
            return view('admin.bride.index', compact('bride', 'bank'));
        }
        if (!$wedding) {
            $bride = Bride::with('Bank')->first();
            $bank = Bank::all();
            return view('admin.bride.create', compact('bride', 'bank'));
        }
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
        } else {
            Bride::create(array_merge($request->all(), [
                'wedding_id' => $wedding->id,
            ]));
        }
        return redirect()->route('bride.index')->with('success', 'Data Updated Successfully');
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
            return redirect()->back()->with('success', 'Data Success Updated');
        } else {
            $bride->update($request->all());
            return redirect()->back()->with('success', 'Data Success Updated');
        }
    }

    public function destroy($id)
    {
        $bride = Bride::findOrFail($id);
        $bride->delete();
        return redirect()->back()->with('success', 'Data Deleted Successfully');
    }
}
