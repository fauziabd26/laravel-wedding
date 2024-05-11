<?php

namespace App\Http\Controllers;

use App\Models\Thank;
use App\Models\Wedding;
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
        if (Auth::user()->is_admin == 1) {
            $wishes = Wishes::with('wedding')->get();
            return view('admin.wishes.index', compact(['wishes']));
        } else {
            $wedding = Wedding::where('user_id', Auth::user()->id)->first();
            if ($wedding === null) {
                return view('admin.wishes.empty');
            } else {
                $thanks = Thank::with('wedding')->where('wedding_id', $wedding->id)->get();
                $thanksForm = Thank::with('wedding')->where('wedding_id', $wedding->id)->first();
                $wishes = Wishes::with('wedding')->where('wedding_id', $wedding->id)->get();
                return view('admin.wishes.index', compact(['thanks', 'wishes', 'thanksForm']));
            }
            
        }
    }

    public function thank(Request $request, $id)
    {
        $thanks = Thank::with('wedding')->where('wedding_id', Auth::user()->id)->findOrFail($id);
        $thanks->update($request->all());
        return redirect()->back()->with('message', 'Data Updated Successfully');
    }
}
