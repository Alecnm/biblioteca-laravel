<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Classification;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Muestra la lista de libros
    public function index()
    {
        $books = Book::with('classification')->paginate(10);
        return view('books.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // Muestra el formulario para crear un nuevo libro
    public function create()
    {
        $classifications = Classification::all();
        return view('books.create', compact('classifications'));
    }

    // Guarda un nuevo libro en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'published_year' => 'nullable|digits:4',
            'classification_id' => 'nullable|exists:classifications,id',
            'isbn' => 'nullable|string|max:20|unique:books',
            'copies' => 'required|integer|min:1',
        ]);

        $book = Book::create($request->all());
        $book->available_copies = $book->copies;
        $book->save();

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    // Muestra el formulario para editar un libro
    public function edit(Book $book)
    {
        $classifications = Classification::all();
        return view('books.edit', compact('book', 'classifications'));
    }

    // Actualiza el libro en la base de datos
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'published_year' => 'nullable|digits:4',
            'classification_id' => 'nullable|exists:classifications,id',
            'isbn' => 'nullable|string|max:20|unique:books,isbn,' . $book->id,
            'copies' => 'required|integer|min:1',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    // Elimina un libro
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
