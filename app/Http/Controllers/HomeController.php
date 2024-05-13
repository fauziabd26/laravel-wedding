<?php

namespace App\Http\Controllers;

use App\Models\Bride;
use App\Models\Detail;
use App\Models\Galery;
use App\Models\Gift;
use App\Models\Music;
use App\Models\Story;
use App\Models\Thank;
use App\Models\Wedding;
use App\Models\Wishes;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request, $name)
    {
        $to             = $request->to;
        $nameWedding    = $name;
        $wedding        = Wedding::where('name', $name)->firstOrFail();
        $bride          = Bride::where('wedding_id', $wedding->id)->get();
        $detail         = Detail::where('wedding_id', $wedding->id)->orderBy('type', 'ASC')->get();
        $gift           = Gift::where('wedding_id', $wedding->id)->get();
        $thank          = Thank::where('wedding_id', $wedding->id)->get();
        $galery         = Galery::where('wedding_id', $wedding->id)->get();
        $wish           = Wishes::where('wedding_id', $wedding->id)->orderby('id', 'desc')->get();
        $bank           = Bride::select('brides.name', 'brides.acc_name', 'brides.acc_number', 'brides.bank_id', 'banks.name as bank_name', 'banks.logo')->join('banks', 'banks.id', 'brides.bank_id')->where('wedding_id', $wedding->id)->get();
        $stories        = Story::where('wedding_id', $wedding->id)->get();
        $timeAkad       = Detail::where('wedding_id', $wedding->id)->where('type', 'Akad')->first();
        $music          = Music::where('wedding_id', $wedding->id)->first();

        return view('home', compact('bride', 'detail', 'wedding', 'gift', 'bank', 'to', 'thank', 'wish', 'galery', 'stories', 'nameWedding', 'timeAkad','music'));
    }

    public function store(Request $request, $name)
    {
        $request->validate([
            'name'      => 'required',
            'comment'   => 'required',
            'hadir'     => 'required',
        ]);

        $wedding    = Wedding::where('name', $name)->firstOrFail();
        $input = $request->all();
        $input['wedding_id'] = $wedding->id;

        Wishes::create($input);

        return redirect('/' . '#tab-wishes');
    }
}
