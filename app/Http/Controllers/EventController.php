<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $wedding = Wedding::where('user_id', Auth::user()->id)->first();
        $events = Detail::with('wedding')->where('wedding_id', $wedding->id)->orderBy('type', 'ASC')->get();
        return view('admin.events.index', compact('events'));
    }

    public function store(Request $request)
    {
        $wedding = Wedding::where('user_id', Auth::user()->id)->first();
        Detail::create(array_merge($request->all(),[
            'wedding_id' => $wedding->id,
        ]));
        return redirect()->back()->with('success', 'Data Created Successfully');
    }

    public function update(Request $request, $id)
    {
        $events = Detail::findOrFail($id);
        $events->update($request->all());

        return redirect()->back()->with('message', 'Data Updated Successfully');
    }
}
