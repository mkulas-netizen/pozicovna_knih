<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(6);
        return view('pages.book', compact('books'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(),[
            'title' => 'required|min:2|max:255|unique:books'
        ]);

        if ( $validator->fails() ) {
            return back()
                ->with('flash_error','Ups error !')
                ->withErrors($validator)
                ->withInput();
        }

        Book::create([
           'title' => $request->title,
           'author_id' => $request->author
        ]);

        return redirect()->back()->with('flash_message', 'Book create!');

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book): RedirectResponse
    {

        if ($request->borrowed == 'return') {
            $book->update([
                'is_borrowed' => false
            ]);

            return redirect()->back();
        }


        if ($request->borrowed == 'borrowed'){
            $book->update([
               'is_borrowed' => true
            ]);

            return redirect()->back();
        }


        if ($request->title){

            $validator = Validator::make($request->all(),[
                'title' => 'required|min:2|max:255|unique:books'
            ]);

            if ( $validator->fails() ) {
                return back()
                    ->with('flash_error','Ups error !')
                    ->withErrors($validator)
                    ->withInput();
            }

            $book->update([
               'title' => $request->title
            ]);

        }

        return redirect()->back()->with('flash_message', 'Book update!');

    }


    /**
     * @param Book $book
     * @return RedirectResponse
     */
    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();
        return redirect()->back()->with('flash_message', 'Book deleted!');
    }

}
