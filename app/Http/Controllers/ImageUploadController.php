<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');

            // Validate file
            $validator = validator(['upload' => $file], [
                'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => [
                        'message' => 'Invalid file upload.'
                    ]
                ]);
            }

            // Generate unique filename
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();

            // Store file in public/uploads directory
            $file->move(public_path('uploads'), $fileName);

            // Return URL for CKEditor
            return response()->json([
                'url' => asset('uploads/' . $fileName)
            ]);
        }

        return response()->json([
            'error' => [
                'message' => 'No file uploaded.'
            ]
        ]);
    }
}
