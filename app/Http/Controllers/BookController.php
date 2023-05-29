<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Book;

class BookController extends Controller
{
    public function index() {
        // return Inertia::render('Home');
        // $test = 'kucing';
        $books = Book::orderBy('name', 'asc')->get();
        return Inertia::render('Book', compact('books'));
        // return Inertia::render('Home', [
        //     'test' => $test
        //   ]);
    }

    public function search() {
        return Inertia::render('Search');
    }

    public function results(Request $request) {
        $query = Book::Where('name', 'like', '%' . $request->name . '%');
        $books = $query->Where('isbn', 'like', '%' . $request->isbn . '%')->get();
        return Inertia::render('Result', compact('books'));
    }

        // $name = $request->input('name');
        // $isbn = $request->input('isbn');

        // $books = Book::query()->where('name', $name)->where('isbn', $isbn)
        // ->select('id','name','genre','isbn', 'author', 'description')->orderby('name')->get();
        // return Inertia::render('Book/Search', [
        //     'books' => $books,
        //     'search' => true
        // ]);
    // }

    public function create(Request $request) {
        return Inertia::render('Create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'isbn' => 'required|unique:books,isbn',
            'author' => 'required|string',
            'genre' => 'required|string',
            'description' => 'required|string',
        ]);
    
        try {
            $book = Book::create($validatedData);
            session()->flash('success', 'New data has been added.');
            return redirect('/books')->with('message', 'Successfully added a new book.');
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred while creating the book.');
            return redirect()->back()->withErrors(['error' => 'An error occurred while creating the book.']);
        }
    }
    
}
