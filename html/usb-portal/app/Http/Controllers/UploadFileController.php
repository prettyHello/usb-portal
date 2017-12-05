<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadFileController extends AuthController
{
    public function index()
    {
        return view("print");
    }

    public function startUploadFile(Request $request)
    {
        // check if there is a file to upload
        if ($request->file('doc') == null) {
            return view('print');
        }

        // we retrieve the file and store it in the uploads folder.
        $file = $request->file('doc')->store("uploads");

        // creation of the document
        $documentController = new DocumentController();
        $doc = $documentController->store($request, $file);

        // creation of the document user row
        $documentUserController = new DocumentUserController();
        $documentUserController->store(\Auth::user()->id, $doc->id, env('UPLOAD', 'Upload'));

        return view('print');
    }
}
