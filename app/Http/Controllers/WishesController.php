<?php

namespace App\Http\Controllers;

use App\Models\Thank;
use App\Models\Wishes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $thanks = Thank::with('wedding')->where('wedding_id', Auth::user()->id)->get();
        $wishes = Wishes::with('wedding')->where('wedding_id', Auth::user()->id)->get();
        return view('admin.wishes.index', compact(['thanks', 'wishes']));
    }

    public function thank(Request $request, $id)
    {
        $thanks = Thank::with('wedding')->where('wedding_id', Auth::user()->id)->findOrFail($id);
        $thanks->update($request->all());
        return redirect()->back()->with('message', 'Data Updated Successfully');
    }
}
