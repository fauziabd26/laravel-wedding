<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
use Illuminate\Http\Request;

class WeddingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $wedding = Wedding::all();
        return view('admin.wedding.index', compact('wedding'));
    }

    public function update(Request $request, string $id)
    {
        $wedding = Wedding::findOrFail($id);
        $wedding->update($request->all());

        return redirect()->route('wedding.index')->with(['message' => 'Wedding updated successfully'], 201);
    }
}
