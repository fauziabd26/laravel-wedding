<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Galery;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AttachmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->is_admin == 1) {
            $attachments = Attachment::all();
            return view('admin.attachments.index', compact('attachments'));
        } elseif (Auth::user()->is_admin == 0) {
            $wedding = Wedding::where('user_id', Auth::user()->id)->first();
            if ($wedding === null) {
                return view('admin.attachments.empty');
            }
            $attachments = Attachment::where('wedding_id', $wedding->id)->get();
            $existsAttachments = Attachment::where('wedding_id', $wedding->id)->first();
            $gallery = Galery::where('wedding_id', $wedding->id)->first();
            return view('admin.attachments.index', compact('attachments', 'existsAttachments', 'gallery'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'filename'      => 'required',
            'filename.*'    => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'filename.required' => 'Foto Wajib Diisi!',
            'filename.max'      => 'Ukuran Foto maximal 2 mb!',
            'filename.mimes'    => 'Foto harus Jpeg, Png, Jpg, Gif, Svg!'
        ]);

        if ($request->hasFile('filename')) {
            $wedding = Wedding::where('user_id', Auth::user()->id)->first();
            foreach ($request->file('filename') as $image) {
                $name = time() . $image->getClientOriginalName();
                $image->storeAs('public/gallery/', $name);
                $attachment = new Attachment();
                $attachment->wedding_id = $wedding->id;
                $attachment->filename   = $image->getClientOriginalName();
                $attachment->file       = $name;
                $attachment->mime       = $image->getMimeType();
                $attachment->save();
            }
        }
        Alert::success('Success!', 'Photo Uploaded Successfully');
        return back();
    }

    public function show(Attachment $attachment)
    {
        return $attachment;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $attachments = Attachment::findOrFail($id);
        if ($request->hasFile('file')) {
            $file   = $request->file('file');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('public/gallery/', $name);
            Storage::delete('public/gallery/' . $attachments->file);
            $attachments->update(array_merge($request->all(), [
                'filename'  => $file->getClientOriginalName(),
                'file'      => $name,
                'mime'      => $file->getMimeType(),
            ]));
            Alert::success('Success!', 'Data Updated Successfully');
            return redirect()->back();
        } else {
            $attachments->update($request->all());
            Alert::success('Success!', 'Data Updated Successfully');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $attachment = Attachment::findOrFail($id);
        Storage::delete('public/gallery/' . $attachment->file);
        $attachment->delete();
        Alert::success('Success!', 'Photo Deleted Successfully');
        return back();
    }
}
