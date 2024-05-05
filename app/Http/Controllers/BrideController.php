<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Bride;
use Illuminate\Http\Request;

class BrideController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bride = Bride::with('Bank')->OrderBy('gender', 'ASC')->get();
        $bank = Bank::all();
        return view('admin.bride.index', compact('bride', 'bank'));
    }

    public function update(Request $request, string $id)
    {
        $bride = Bride::findOrFail($id);
        $bride->update($request->all());
        return redirect()->route('bride.index')->with('message', 'Data Sucess Updated');
    }
}
