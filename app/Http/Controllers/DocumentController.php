<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends AuthController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $path)
    {
        $file = $request->file('doc');
        return Document::create(['name' => $file->getClientOriginalName(), 'extension' => $file->getClientOriginalExtension(), 'id_user' => Auth::user()->id, 'real_name' => $path]);
    }

    public function downloadDocument(Document $document)
    {
        return response()->download(storage_path("app/" . $document->real_name), $document->name);
    }

    public function showDocument(Document $document)
    {
        return response()->file(storage_path("app/" . $document->real_name));
    }
}
