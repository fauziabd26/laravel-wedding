<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Wedding;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MusicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->is_admin == 1) {
            $music = Music::all();
        } else {
            $wedding = Wedding::where('user_id', Auth::user()->id)->first();
            if ($wedding === null) {
                return view('admin.music.empty');
            } else {
                $music = Music::where('wedding_id', $wedding->id)->first();
            }
        }
        return view('admin.music.index', compact('music'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'nullable|file|mimes:audio/mpeg,mpga,mp3,wav,aac|max:10240',
        ], [
            'file.max'  => 'Ukuran File Music Maximal 10MB!'
        ]);
        $wedding = Wedding::where('user_id', Auth::user()->id)->first();
        if ($request->hasFile('file')) {
            $file       = $request->file('file');
            $filename   = Carbon::now()->format('Y-m-d-') . time() . '.' . $file->getClientOriginalName();
            $file->storeAs('public/music/', $filename);
            // $music = new Music();
            // $music->wedding_id = $wedding->id;
            // $music->name = $file->getClientOriginalName();
            // $music->file = $file->getClientOriginalName();
            // $music->save();
            Music::create(array_merge($request->all(), [
                'wedding_id' => $wedding->id,
                'name'       => $file->getClientOriginalName(),
                'file'       => $filename
            ]));
            Alert::success('Success', 'Data Created Successfully');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Music $music)
    {
        return $music;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Music $music)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'file' => 'nullable|file|mimes:audio/mpeg,mpga,mp3,wav,aac|max:10240',
        ], [
            'file.max'  => 'Ukuran File Music Maximal 10MB!'
        ]);
        $music = Music::findOrFail($id);
        if ($request->hasFile('file')) {
            $file   = $request->file('file');
            $filename   = Carbon::now()->format('Y-m-d-') . time() . '.' . $file->getClientOriginalName();
            $file->storeAs('public/music/', $filename);
            Storage::delete('public/music/' . $music->file);
        }
        $music->update(array_merge($request->all(), [
            'name'      => $file->getClientOriginalName(),
            'file'      => $filename,
        ]));
        Alert::success('Success!', 'Data Updated Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Music $music)
    {
        //
    }
}
