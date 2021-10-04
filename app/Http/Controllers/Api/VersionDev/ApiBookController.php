<?php

namespace App\Http\Controllers\Api\VersionDev;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class ApiBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = Book::all();
        $data = $this->returnBook($book);
        return response()->json(['book' => $data]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
                [
                    'title' => 'required|min:2|max:255|unique:books'
                ]
            );

        if ( $validator->fails() ) {
            return response()
                ->with('flash_error','Ups error !')
                ->withErrors($validator)
                ->withInput();
        }

        $book = Book::create(
            [
                'title' => $request->title,
                'author_id' => $request->author
            ]
        );

        $data = $this->returnBook($book);

        return response()->json(['message' => 'Create book success', 'book' => $data]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {

        if ( $request->borrowed == 'return' ) {

            $book->update([
                'is_borrowed' => false
            ]);

            return response()->json(['message' => 'Borrowed status update !']);
        }


        if ( $request->borrowed == 'borrowed' ) {

            $book->update([
                'is_borrowed' => true
            ]);

            return response()->json(['message' => 'Borrowed status update !']);

        }


        if ($request->title) {

            $validator = Validator::make(
                $request->all() , [
                    'title' => 'required|min:2|max:255|unique:books'
                ]
            );

            if ( $validator->fails() ) {
                return back()
                    ->with('flash_error','Ups error !')
                    ->withErrors($validator)
                    ->withInput();
            }

            $data = $book->update([
                'title' => $request->title
            ]);
        }


        return response()->json(['book' => $data,'message' => 'Book update !']);
    }


    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(['message' => 'Book deleted !']);
    }


    private function returnBook($data){
        return  $data->map(function($tag){
            return [
                'id' => $tag->id,
                'title' => $tag->title,
                'created_at' => $tag->created_at,
                'updated_at' => $tag->updated_at,
                'author_id' => $tag->author_id
            ];
        })->toArray();
    }
}
