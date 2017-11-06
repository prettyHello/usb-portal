<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    public function index()
    {
        return view("print");
    }

    public function showUploadFile(Request $request)
    {
        $file = $request->file('doc');

        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath, $file->getClientOriginalName());

        $document = new DocumentController();
        $document->store($request);

        return view("print");
    }
}
