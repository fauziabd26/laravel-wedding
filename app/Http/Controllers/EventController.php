<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->is_admin == 1) {
            $events = Detail::with('wedding')->orderBy('type', 'ASC')->get();
            return view('admin.events.index', compact('events'));
        } else {
            $wedding = Wedding::where('user_id', Auth::user()->id)->first();
            if ($wedding === null) {
                return view('admin.events.empty', compact('wedding'));
            } else {
                $wedding = Wedding::where('user_id', Auth::user()->id)->first();
                $events = Detail::with('wedding')->where('wedding_id', $wedding->id)->orderBy('type', 'ASC')->get();
                return view('admin.events.index', compact('events','wedding'));
            }
        }
    }

    public function store(Request $request)
    {
        $wedding = Wedding::where('user_id', Auth::user()->id)->first();
        Detail::create(array_merge($request->all(),[
            'wedding_id' => $wedding->id,
        ]));
        Alert::success('Success', 'Data Created Successfully');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $events = Detail::findOrFail($id);
        $events->update($request->all());
        Alert::success('Success', 'Data Updated Successfully');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $events = Detail::findOrFail($id);
        $events->delete();
        Alert::success('Success', 'Data Deleted Successfully');
        return redirect()->back();
    }
}
