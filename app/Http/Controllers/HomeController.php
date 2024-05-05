<?php

namespace App\Http\Controllers;

use App\Models\Bride;
use App\Models\Detail;
use App\Models\Galery;
use App\Models\Gift;
use App\Models\Story;
use App\Models\Thank;
use App\Models\Wedding;
use App\Models\Wishes;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $to         = $request->to;
        $wedding    = Wedding::all();
        $bride      = Bride::all();
        $detail     = Detail::orderBy('type', 'ASC')->get();
        $gift       = Gift::all();
        $thank      = Thank::all();
        $galery     = Galery::all();
        $wish       = Wishes::orderby('id', 'desc')->get();
        $bank       = Bride::select('brides.name', 'brides.acc_name', 'brides.acc_number', 'brides.bank_id', 'banks.name as bank_name', 'banks.logo')->join('banks', 'banks.id', 'brides.bank_id')->get();
        $stories    = Story::all();

        return view('home', compact('bride', 'detail', 'wedding', 'gift', 'bank', 'to', 'thank', 'wish', 'galery', 'stories'));
    }
}
