<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bank = Bank::orderBy('name', 'ASC')->get();
        return view("admin.bank.index", compact("bank"));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('logo')) {
            $logo   = $request->file('logo');
            $logo->storeAs('public/bank/', $logo->getClientOriginalName());
            Bank::create(array_merge($request->all(), [
                'logo'      => $logo->getClientOriginalName()
            ]));
        } else {
            Bank::create($request->all());
        }
        return redirect()->back()->with('success', 'Data Created Sucessfully');
    }

    public function update(Request $request, string $id)
    {
        $bank = Bank::findOrFail($id);
        if ($request->hasFile('logo')) {
            $logo   = $request->file('logo');
            $logo->storeAs('public/bank/', $logo->getClientOriginalName());
            if($request->logo != null){
                Storage::delete('public/bank/' . $bank->logo);
            }
            $bank->update(array_merge($request->all(), [
                'logo'      => $logo->getClientOriginalName(),
            ]));
        } else {
            $bank->update($request->all());
        }
        return redirect()->back()->with('success', 'Data Updated Sucessffully');
    }

    public function destroy(string $id)
    {
        $bank = Bank::findOrFail($id);
        $bank->delete();
        return redirect()->back()->with('success', 'Data Deleted Sucessfully');
    }
}
