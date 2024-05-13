<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class StoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if (Auth::user()->is_admin == 1) {
            $stories = Story::all();
            return view('admin.story.index', compact('stories'));
        } else {
            $wedding = Wedding::where('user_id', Auth::user()->id)->first();
            if($wedding === null){
                $wedding = Wedding::where('user_id', Auth::user()->id)->first();
                return view('admin.story.index', compact('wedding'));
            }else{
                $wedding = Wedding::where('user_id', Auth::user()->id)->first();
                $stories = Story::where('wedding_id', $wedding->id)->get();
                return view('admin.story.index', compact('stories','wedding'));
            }
        }
    }

    public function store(Request $request)
    {
        $wedding_id = Wedding::where('user_id', Auth::user()->id)->first();
        Story::create(array_merge($request->all(), [
            'wedding_id' => $wedding_id->id
        ]));
        Alert::success('success', 'Data Created Successfully!');
        return redirect()->back();
    }
    
    public function show(Story $story)
    {
        return $story;
    }

    public function update(Request $request, $id)
    {
        $story = Story::findOrFail($id);
        $story->update($request->all());
        Alert::success('success', 'Data Updated Successfully!');
        return redirect()->back();
    }
    
    public function destroy(Story $story)
    {
        $story->delete();
        Alert::success('success', 'Data Deleted Successfully!');
        return redirect()->back();
    }
}
