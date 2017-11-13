<?php

namespace App\Http\Controllers;

use CupsPrintIPP;
use App\Document;

class PrintPageController extends AuthController
{
    public function get()
    {
        return view("print");
    }

    /**
     * Allows the user to print the document
     * @param Document $document
     */
    public function printDocument(Document $document)
    {
//        $ipp = new CupsPrintIPP();
//        $ipp->setHost(env("DB_HOST", "localhost"));
//        $ipp->setPrinterURI(env("PRINT_URI", "/printers/Brother"));
//        $ipp->setData($document);
//        $result = $ipp->printJob();
//        $job = $ipp->last_job;

        $documentUserController = new DocumentUserController();
        $documentUserController->store(\Auth::user()->id, $document->id, env('PRINT', 'print'));
    }
}
