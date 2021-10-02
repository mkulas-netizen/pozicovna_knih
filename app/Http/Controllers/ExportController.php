<?php

namespace App\Http\Controllers;

use App\Exports\AuthorsExport;
use App\Models\Author;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Shared\XMLWriter;
use PHPUnit\Util\Xml\Exception;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


class ExportController extends Controller
{
    public function xmlExportLocal(){
        $author = Author::get();

        try
        {

            $xml = new XMLWriter();

            $xml->openURI('authors.xml');

            $xml->startDocument('2.0');
            $xml->setIndent(4);



            foreach ($author as $s){
                $xml->startElement('Author');
                $xml->writeElement('id', $s->id);
                $xml->writeElement('name', $s->name);
                $xml->endElement();
                $xml->endElement();
            }

            $xml->endDocument();
            $xml->flush();
            echo 'Your file export is save in public folder';
        }
        catch(Exception $e)
        {
            echo $e;
        }
    }


    public function xmlExportPublic(){
        $posts = Author::with('book')->get();
        return response()->view('exports.exportXml', [
            'posts' => $posts
        ])->header('Content-Type', 'text/xml');
    }

    public function xlsxFileExport(): BinaryFileResponse
    {
        return Excel::download(new AuthorsExport, 'author-collection.xlsx');
    }
}
