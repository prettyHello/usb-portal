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
        $documentUserController = new DocumentUserController();
        $documentUserController->store(\Auth::user()->id, $document->id, env('DOWNLOAD', 'download'));

        return response()->download(storage_path("app/" . $document->real_name), $document->name);
    }

    public function showDocument(Document $document)
    {
        return response()->file(storage_path("app/" . $document->real_name));
    }

    public static function getAllDocuments()
    {
        return \DB::table('documents')
            ->select('users.name as user_name', 'documents.id as doc_id', 'documents.extension as extension', 'documents.name as doc_name', 'documents.created_at as created_at')
            ->Join('users', 'documents.id_user', '=', 'users.id')
            ->get();
    }
}
