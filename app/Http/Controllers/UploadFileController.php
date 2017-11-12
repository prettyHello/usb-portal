<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadFileController extends AuthController
{

    public function startUploadFile(Request $request)
    {
        // check if there is a file to upload
        if ($request->file('doc') == null) {
            return view('print');
        }

        // we retrieve the file
        $file = $request->file('doc');

        // Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath, $file->getClientOriginalName());

        // creation of the document
        $documentController = new DocumentController();
        $doc = $documentController->store($request);

        // cr
        $documentUserController = new DocumentUserController();
        $documentUserController->store(\Auth::user()->id, $doc->id, env('UPLOAD', 'Upload'));

        return view('print');
    }
}
