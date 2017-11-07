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

        $documentController = new DocumentController();
        $doc = $documentController->store($request);

        $documentUserController = new DocumentUserController();
        $documentUserController->store(\Auth::user()->id, $doc->id, env('UPLOAD', 'Upload'));

        return view("print");
    }
}
