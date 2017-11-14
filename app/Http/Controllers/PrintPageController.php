<?php

namespace App\Http\Controllers;

use App\Lib\CupsPrintIPP;
use App\Document;
use Symfony\Component\HttpFoundation\File\File;

class PrintPageController extends AuthController
{
    public function get()
    {
        return view("print");
    }

    /**
     * Allows the user to print the document
     * @param Document $document
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function printDocument(Document $document)
    {
        $ipp = new CupsPrintIPP();
        $ipp->setHost(env("PRINT_HOST", "localhost"));
        $ipp->setPrinterURI(env("PRINT_URI", "/printers/Brother"));
        $ipp->setData(new File(storage_path("app/" . $document->real_name)));
//        $result = $ipp->printJob();
//        $job = $ipp->last_job;

        $documentUserController = new DocumentUserController();
        $documentUserController->store(\Auth::user()->id, $document->id, env('PRINT', 'print'));

        return view('print');
    }
}
