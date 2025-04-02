<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/uploads', $filename);

            return response()->json([
                'success' => true,
                'url' => Storage::url('uploads/' . $filename)
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No image file uploaded'
        ], 400);
    }
}
