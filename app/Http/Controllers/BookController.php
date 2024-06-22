<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book.index', [
            'books' => Book::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'isbn' => 'required|numeric|unique:books',
            'author' => 'required|max:255',
            'publisher' => 'required|max:255',
            'issued' => 'required|date',
            'location' => 'max:255',
            'description' => 'max:255',
            'stock' => 'required|numeric',
            'image' => 'image|file|max:1024'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('book-images');
        }

        Book::create($validatedData);
        return redirect('book')->with('success', 'Data Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book.show', [
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('book.edit', [
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $rules = [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publisher' => 'required|max:255',
            'issued' => 'required|date',
            'location' => 'max:255',
            'description' => 'max:255',
            'stock' => 'required|numeric',
            'image' => 'image|file|max:1024'
        ];

        if ($book->isbn != $request->isbn) {
            $rules['isbn'] = 'required|numeric|unique:books';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($book->image != "") {
                Storage::delete($book->image);
            }
            $validatedData['image'] = $request->file('image')->store('book-images');
        }

        $book->update($validatedData);
        return redirect('book')->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        try{
            if ($book->image != "") {
                $image = $book->image;
            }

            $book->delete();
            Storage::delete($image);
            return redirect('book')->with('success', 'Data Deleted Successfully');
        } catch (QueryException $e) {
            return redirect('book')->with('fail', 'Data cannot be deleted because there is related transaction data');
        }
    }
}
