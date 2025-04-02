<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $files = Storage::files('public/media');
        return view('admin.media.index', compact('files'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,pdf,doc,docx|max:2048'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/media', $filename);

            return response()->json([
                'success' => true,
                'url' => Storage::url('media/' . $filename)
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No file uploaded.'
        ]);
    }

    public function destroy(Request $request)
    {
        $filename = $request->filename;
        if (Storage::exists('public/media/' . $filename)) {
            Storage::delete('public/media/' . $filename);
            return response()->json([
                'success' => true,
                'message' => 'File deleted successfully.'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'File not found.'
        ]);
    }
}
