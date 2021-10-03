<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\BinaryFileResponse;
use PhpOffice\PhpSpreadsheet\Shared\XMLWriter;
use Maatwebsite\Excel\Facades\Excel;
use PHPUnit\Util\Xml\Exception;
use App\Exports\AuthorsExport;
use Illuminate\Http\Response;
use App\Models\Author;

class ExportController extends Controller
{

    public function xmlExportLocal(){

        $author = Author::with('book')->get();

        try {

            $xml = new XMLWriter();

            $xml->openURI('authors.xml');

            $xml->startDocument('1.0');
            // $xml->setIndent(4);

            foreach ( $author as $s ) {

                $xml->startElement('Author');
                $xml->writeElement('id', $s->id);
                $xml->writeElement('name', $s->name);
                $xml->writeElement('books');

                foreach ( $s->book as $book ) {
                    $xml->writeElement('name', $book->title);
                    $xml->writeElement('is_borrowed' ,$book->is_borrowed);
                }

                $xml->endElement();
                $xml->endElement();
            }

            $xml->endDocument();
            $xml->flush();

            echo 'Your file export is save in public folder';

        } catch(Exception $e) {
            echo $e;
        }
    }


    public function xmlExportPublic(): Response
    {
        $posts = Author::with('book')
            ->get();

        return response()->view('exports.exportXml', [
            'posts' => $posts
        ])->header('Content-Type', 'text/xml');
    }


    public function xlsxFileExport(): BinaryFileResponse
    {
        return Excel::download( new AuthorsExport, 'author-collection.xlsx' );
    }

}
