<?php

namespace App\Http\Controllers;


use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('standard.pages.author',
            [
                'authors' => Author::with('book')->get()
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
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|string|max:255|min:2',
           'surname' => 'required|string|max:255|min:2'
        ]);

        /**
         * V tomto prípade ani vlastne v žiadnom inom nepoužívam pre insert $request->all()
         */
        Author::create([
            'name' => $request->name,
            'surname' => $request->surname
        ]);

        return redirect()->back()->with('flash_message', 'Author create!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        $books = Book::where('author_id',$author->id)->paginate(5);
        return view('standard.pages.book', compact('books'),['author' => $author->id ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author): RedirectResponse
    {
        $author->delete();
        return redirect()->back()->with('flash_message', 'Author deleted!');
    }
}
