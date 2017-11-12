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
    public function store(Request $request)
    {
        $file = $request->file('doc');

        return Document::create(['name' => $file->getClientOriginalName(), 'extension' => $file->getClientOriginalExtension(), 'id_user' => Auth::user()->id]);
    }

    public function downloadDocument(Document $document)
    {
        $pathFile = public_path(). "/uploads/" . $document->name;
        return response()->download($pathFile);
    }
}
