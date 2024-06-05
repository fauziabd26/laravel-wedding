<?php

namespace App\Http\Controllers;

use App\Models\Invitations;
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
            $invitations = Invitations::with('Wedding')->get();
            return view('admin.invitations.index', compact('invitations'));
        } else {
            $wedding = Wedding::where('user_id', Auth::user()->id)->first();
            if($wedding === null)
            {
                return view('admin.invitations.empty');
            }
            $invitations = Invitations::with('Wedding')->where('wedding_id', $wedding->id)->get();
            return view('admin.invitations.index', compact('invitations'));
        }
    }

    public function store(Request $request)
    {
        $wedding                = Wedding::where('user_id', Auth::user()->id)->first();
        $invitation             = new Invitations();
        $invitation->wedding_id = $wedding->id;
        $invitation->name       = $request->name;
        $invitation->link       = env('APP_NIKAH_URL') . 'undangan' . '/' . $wedding->name . '?to=' . str_replace(' ', '+', $invitation->name);
        $invitation->kata =
            'السلا م عليكم ورحمة الله وبر كا ته
            ' . "\n"
            . 'Tanpa mengurangi rasa hormat, perkenankan kami menginformasikan Bpk/Ibu/Sdr/i ' . "*" . '[ ' . $invitation->name . ' ]' . "*" . ' bahwa akan ada Pernikahan kami.
            ' . "\n"
            . $invitation->link . '
            ' . "\n"
            .
            '🗓 Hari, Tanggal : Sabtu, 17 Juni 2024
            🕛 Jam : 11.00 WIB - 17.00
            📍Alamat : Jalan Flamboyan, RT.6/RW.3, Gedung Karya Jitu, Rawajitu Selatan
            https://maps.app.goo.gl/5oUrh5juXYJaMsFt5
            ' . "\n" .
            'Merupakan suatu kebahagiaan bagi kami apabila Bpk/Ibu/Sdr/i berkenan untuk hadir dan memberikan doa restu.
            Mohon maaf perihal undangan hanya di bagikan melalui pesan ini,
            ' . "\n" . 'Atas perhatiannya kami ucapkan Terimakasih.' . "\n" .
            '        
            والسلام عليكم ورحمة الله وبركا ته 
            ' . "\n" .
            'Hormat Kami, 
            ' . "*" . $wedding->name . "*" . '';
        $invitation->save();
        Alert::success('Success!', 'Data Created Successfully');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $wedding                = Wedding::where('user_id', Auth::user()->id)->first();
        $invitation             = Invitations::findOrFail($id);
        $invitation->wedding_id = $wedding->id;
        $invitation->name       = $request->name;
        $invitation->link       = env('APP_NIKAH_URL') . 'undangan' . '/' . $wedding->name . '?to=' . str_replace(' ', '+', $invitation->name);
        $invitation->kata =
            'السلا م عليكم ورحمة الله وبر كا ته
            ' . "\n"
            . 'Tanpa mengurangi rasa hormat, perkenankan kami menginformasikan Bpk/Ibu/Sdr/i ' . "*" . '[ ' . $invitation->name . ' ]' . "*" . ' bahwa akan ada Pernikahan kami.
            ' . "\n"
            . $invitation->link . '
            ' . "\n"
            .
            '🗓 Hari, Tanggal : Sabtu, 17 Juni 2024
            🕛 Jam : 11.00 WIB - 17.00
            📍Alamat : Jalan Flamboyan, RT.6/RW.3, Gedung Karya Jitu, Rawajitu Selatan
            https://maps.app.goo.gl/5oUrh5juXYJaMsFt5
            ' . "\n" .
            'Merupakan suatu kebahagiaan bagi kami apabila Bpk/Ibu/Sdr/i berkenan untuk hadir dan memberikan doa restu.
            Mohon maaf perihal undangan hanya di bagikan melalui pesan ini,
            ' . "\n" . 'Atas perhatiannya kami ucapkan Terimakasih.' . "\n" .
            '        
            والسلام عليكم ورحمة الله وبركا ته 
            ' . "\n" .
            'Hormat Kami, 
            ' . "*" . $wedding->name . "*" . '';
        $invitation->update();
        Alert::success('Success!', 'Data Updated Sucessfully');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $invitations = Invitations::findOrFail($id);
        $invitations->delete();
        Alert::success('Success!', 'Data Deleted Successfully');
        return redirect()->back();
    }

}
