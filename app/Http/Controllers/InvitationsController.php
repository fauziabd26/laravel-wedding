<?php

namespace App\Http\Controllers;

use App\Models\Invitations;
use App\Models\RedaksiKata;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class InvitationsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->is_admin == 1) {
            $invitations = Invitations::with('Redaksi', 'Wedding')->get();
            return view('admin.invitations.index', compact('invitations'));
        } else {
            $wedding = Wedding::where('user_id', Auth::user()->id)->first();
            if($wedding === null)
            {
                return view('admin.invitations.empty');
            }
            $redaksi = RedaksiKata::where('wedding_id', $wedding->id)->first();
            $invitations = Invitations::with('Redaksi', 'Wedding')->where('wedding_id', $wedding->id)->get();
            return view('admin.invitations.index', compact('invitations', 'redaksi'));
        }
    }

    public function store(Request $request)
    {
        $wedding                = Wedding::where('user_id', Auth::user()->id)->first();
        $redaksi                = RedaksiKata::where('wedding_id', $wedding->id)->first();
        $invitation             = new Invitations();
        $invitation->wedding_id = $wedding->id;
        $invitation->kata_id    = $redaksi->id;
        $invitation->name       = $request->name;
        $invitation->link       = env('APP_NIKAH_URL') . 'undangan' . '/' . $wedding->name . '?to=' . str_replace(' ', '+', $invitation->name);
        $invitation->save();
        Alert::success('success', 'Data Created Successfully');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $wedding                = Wedding::where('user_id', Auth::user()->id)->first();
        $redaksi                = RedaksiKata::where('wedding_id', $wedding->id)->first();
        $invitation             = Invitations::findOrFail($id);
        $invitation->wedding_id = $wedding->id;
        $invitation->kata_id    = $redaksi->id;
        $invitation->name       = $request->name;
        $invitation->link       = env('APP_NIKAH_URL') . 'undangan' . '/' . $wedding->name . '?to=' . str_replace(' ', '+', $invitation->name);
        $invitation->update();
        Alert::success('Data Updated Sucessfully');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $invitations = Invitations::findOrFail($id);
        $invitations->delete();
        Alert::success('success', 'Data Deleted Successfully');
        return redirect()->back();
    }

    public function redaksiStore(Request $request)
    {
        $wedding    = Wedding::where('user_id', Auth::user()->id)->first();
        RedaksiKata::create(array_merge($request->all(), [
            'wedding_id'    => $wedding->id,
        ]));
        Alert::success('sucess', 'Data Created Successfully');
        return redirect()->back();
    }

    public function redaksiUpdate(Request $request, $id)
    {
        $redaksi = RedaksiKata::findOrFail($id);
        $redaksi->update($request->all());
        Alert::success('success', 'Data Updated Successfully');
        return redirect()->back();
    }
}
