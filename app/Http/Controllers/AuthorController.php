<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;


class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'name' => 'required|string|max:255|min:2',
                'surname' => 'required|string|max:255|min:2'
            ]
        );

        /**
         * V tomto prípade ani vlastne v žiadnom inom nepoužívam pre insert $request->all()
         */
        Author::create(
            [
                'name' => $request->name,
                'surname' => $request->surname
            ]
        );

        return redirect()
            ->back()
            ->with('flash_message', 'Author create!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        $books = Book::where('author_id',$author->id)
            ->paginate(5);

        return view('standard.pages.book',
            compact('books'), [
                'author' => $author->id
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author): RedirectResponse
    {

        $request->validate(
            [
                'name' => 'string|max:255|min:2',
                'surname' => 'string|max:255|min:2'
            ]
        );

        $author->update($request->all());

        return redirect()
            ->back()
            ->with('flash_message', 'Author edit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author): RedirectResponse
    {
        $author->delete();

        return redirect()
            ->back()
            ->with('flash_message', 'Author deleted!');
    }
}
