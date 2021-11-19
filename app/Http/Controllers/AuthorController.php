<?php

namespace App\Http\Controllers;


use App\Http\Requests\Author\StoreRequest;
use App\Http\Requests\Author\UpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use App\Models\Author;
use App\Models\Book;


class AuthorController extends Controller
{

    private string $authorId = 'author_id';


    public function index(): View
    {
        $book = Book::all();

        return view('standard.pages.author',
            [
                'authors' => Author::with('book')
                    ->paginate(5),

                'books' =>  $book->count(),
                'book_count' => $book->where('is_borrowed',1)
                    ->count()
            ]
        );
    }


    public function create()
    {
        //
    }


    public function store(StoreRequest $request): RedirectResponse
    {
        Author::create($request->validated());

        return redirect()
            ->back()
            ->with('flash_message', 'Author create!');

    }


    public function show(Author $author): view
    {
        $books = Book::where($this->authorId,$author->id)
            ->paginate(5);

        return view('standard.pages.book',
            compact('books'), [
                'author' => $author->id
            ]
        );
    }


    public function edit(Author $author)
    {

    }


    public function update(UpdateRequest $request, Author $author): RedirectResponse
    {

        $author->update($request->validated());

        return redirect()
            ->back()
            ->with('flash_message', 'Author edit!');

    }


    public function destroy(Author $author): RedirectResponse
    {
        $author->delete();

        return redirect()
            ->back()
            ->with('flash_message', 'Author deleted!');
    }


}
