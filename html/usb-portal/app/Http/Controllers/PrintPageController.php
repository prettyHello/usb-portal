<?php

namespace App\Http\Controllers;

use App\Document;
use App\Lib\CupsPrintIPP;
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

        $ipp->setPrinterURI(env("PRINT_URI", "ipp://localhost:631/printers/PDF"));
        $ipp->setData(new File(storage_path("app/" . $document->real_name)));
        $ipp->printJob();

        $documentUserController = new DocumentUserController();
        $documentUserController->store(\Auth::user()->id, $document->id, env('PRINT', 'print'));

        return view('print');
    }
}
