<?php

namespace App\Http\Controllers;

use App\Models\Bride;
use App\Models\Role;
use App\Models\User;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $linkWedding    = Wedding::where('user_id', Auth::user()->id)->first();
        $user           = User::all();
        $userActive     = User::where('status', 1)->get();
        $wedding        = Wedding::get();
        $bride          = Bride::get();
        $male           = Bride::where('gender', 'Male')->get();
        $female         = Bride::where('gender', 'Female')->get();
        return view('admin.dashboard.index', compact([
            'user',
            'userActive',
            'wedding',
            'bride',
            'male',
            'female',
            'linkWedding',
        ]));
    }

    public function lastSeen()
    {
        $redis = Redis::connection();
        return $redis->get('last_seen_' . $this->id);
    }
}
