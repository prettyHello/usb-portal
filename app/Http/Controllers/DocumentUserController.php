<?php

namespace App\Http\Controllers;

use App\DocumentUser;
use Illuminate\Http\Request;

class DocumentUserController extends AuthController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $user_id
     * @param $document_id
     * @param $action represent the type of the action (could be upload, print)
     */
    public function store($user_id, $document_id, $action)
    {
        DocumentUser::create(['user_id' => $user_id, 'document_id' => $document_id, 'action' => $action]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public static function getAllDocumentUser()
    {
        return \DB::table('document_user')
            ->select('users.name as user_name', 'documents.id as doc_id', 'documents.name as doc_name', 'action', 'document_user.created_at as created_at', 'document_user.id as id')
            ->Join('documents', 'document_user.document_id', '=', 'documents.id')
            ->Join('users', 'document_user.user_id', '=', 'users.id')
            ->get();
    }
}
