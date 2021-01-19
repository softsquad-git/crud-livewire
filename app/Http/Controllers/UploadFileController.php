<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadFileController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fileName = Str::random(64) . '.' . $file->getClientOriginalExtension();

            $request->file('upload')->move(public_path('images'), $fileName);

            $url = asset('images/'.$fileName);

            @header('Content-type: text/html; charset=utf-8');
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);

        }
    }
}
