<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $events = Detail::with('wedding')->orderBy('type', 'ASC')->get();
        return view('admin.events.index', compact('events'));
    }

    public function update(Request $request, $id)
    {
        $events = Detail::findOrFail($id);
        $events->update($request->all());

        return redirect()->back()->with('message', 'Data Updated Successfully');
    }
}
