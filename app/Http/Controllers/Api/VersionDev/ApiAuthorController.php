<?php

namespace App\Http\Controllers\Api\VersionDev;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class ApiAuthorController extends Controller
{
    private string $authorId = 'author_id';


    public function index(): JsonResponse
    {
        return response()->json([
            'authors' => $this->returnAuthors(
                Author::with('book')->get()
            )
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $request->validate(
            [
                'name' => 'required|string|max:255|min:2',
                'surname' => 'required|string|max:255|min:2'
            ]
        );

        $author = Author::create(
            [
                'name' => $request->name,
                'surname' => $request->surname
            ]
        );

        return response()->json([
            'message' => 'Author created !',
            'author' => $this->returnAuthor($author,
                Book::where($this->authorId ,$author->id)->get()
            )
        ]);

    }


    public function show(Author $author): JsonResponse
    {
        return response()->json([
            'author' => $this->returnAuthor($author,
                Book::where($this->authorId ,$author->id)->get()
            ),
        ]);
    }


    public function update(Request $request, Author $author): JsonResponse
    {

        $request->validate(
            [
                'name' => 'string|max:255|min:2',
                'surname' => 'string|max:255|min:2'
            ]
        );

        $data = $author->update([
            'name' => $request->name,
            'surname' => $request->surname
        ]);

        return response()->json([
            'message' => 'Author is edited !',
            'author' => $this->returnAuthor($data,
                Book::where($this->authorId ,$author->id)->get()
            )
        ]);
    }


    public function destroy(Author $author): JsonResponse
    {
        $author->delete();

        return response()->json([
           'message' => 'The author and his books are erased !'
        ]);
    }


    private function returnAuthors($data){

        return  $data->map(function($tag){

            return [
                'id' => $tag->id,
                'name' => $tag->name,
                'surname' => $tag->surname,
                'created_at' => $tag->created_at,
                'updated_at' => $tag->updated_at,
                'authorFullName' => $tag->authorFullName,
                'book' => $tag->book->map(function ($item){
                    return [
                        'id' => $item->id,
                        'title' => $item->title,
                        'author_id' => $item->author_id,
                        'is_borrowed' => $item->is_borrowed,
                        'created_at' => $item->created_at,
                        'updated_at' => $item->updated_at
                    ];
                })
            ];
        })->toArray();

    }


    private function returnAuthor($author,$book): object
    {
        return (object) [
            'id' =>  $author->id,
            'name' =>  $author->name,
            'surname' =>  $author->surname,
            'created_at' =>  $author->created_at,
            'updated_at' =>  $author->updated_at,
            'book' => $book->map(function ($item) {
                return  [
                    'id' => $item->id,
                    'title' => $item->title,
                    'author_id' => $item->author_id,
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at
                ];
            })
        ];
    }


}
