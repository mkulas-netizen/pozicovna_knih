<?php

namespace App\Http\Controllers\Api\VersionDev;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class ApiBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $book = Book::all();
        return response()->json([
            'book' => $this->returnBooks($book)
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {

        $validator = Validator::make(
            $request->all(),
                [
                    'title' => 'required|min:2|max:255|unique:books'
                ]
            );

        if ( $validator->fails() ) {
            return response()
                ->json(['message' => 'Ups error !' ])
                ->withErrors($validator)
                ->withInput();
        }

        $book = Book::create(
            [
                'title' => $request->title,
                'author_id' => $request->author
            ]
        );

        $data = $this->returnBooks($book);

        return response()->json(['message' => 'Create book success', 'book' => $data]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book): JsonResponse
    {

        if ( $request->borrowed == 'return' ) {

            $data = $book->update([
                'is_borrowed' => false
            ]);

            return response()->json([
                'message' => 'Borrowed status update !',
                'book' => $this->returnBook($data)
            ]);
        }


        if ( $request->borrowed == 'borrowed' ) {

            $data = $book->update([
                'is_borrowed' => true
            ]);

            return response()->json([
                'message' => 'Borrowed status update !',
                'book' => $this->returnBook($data)
            ]);

        }


        if ($request->title) {

            $validator = Validator::make(
                $request->all() , [
                    'title' => 'required|min:2|max:255|unique:books'
                ]
            );

            if ( $validator->fails() ) {
                return response()
                    ->json(['message','Ups error !'])
                    ->withErrors($validator)
                    ->withInput();
            }

            $data = $book->update([
                'title' => $request->title
            ]);
        }


        return response()->json([
            'book' => $this->returnBook($data),
            'message' => 'Book update !'
        ]);
    }


    public function destroy(Book $book): JsonResponse
    {
        $book->delete();
        return response()->json(['message' => 'Book deleted !']);
    }


    private function returnBooks($data)
    {
        return $data->map(function ($tag) {
            return [
                'id' => $tag->id,
                'title' => $tag->title,
                'created_at' => $tag->created_at,
                'updated_at' => $tag->updated_at,
                'author_id' => $tag->author_id
            ];
        })->toArray();
    }

    private function returnBook($data): object
    {
        return (object)[
            'id' => $data->id,
            'title' => $data->title,
            'created_at' => $data->created_at,
            'updated_at' => $data->updated_at,
            'author_id' => $data->author_id
        ];

    }
}
