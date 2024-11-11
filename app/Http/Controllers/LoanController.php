<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoanController extends Controller
{
    // Muestra la lista de préstamos
    public function index()
    {
        $loans = Loan::with('user', 'book')->paginate(10);
        return view('loans.index', compact('loans'));
    }

    public function show(Loan $loan)
    {
        return view('loans.show', compact('loan'));
    }

    // Muestra el formulario para solicitar un préstamo
    public function create()
    {
        $books = Book::where('available_copies', '>', 0)->get();
        $users = User::where('role', '!=', 'admin')->get() ?? [];
        return view('loans.create', compact('books', 'users'));
        
    }

    // Guarda un nuevo préstamo en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'due_date' => 'required|date|after:today',
        ]);

        $book = Book::findOrFail($request->book_id);

        // Verificar si hay copias disponibles
        if ($book->available_copies < 1) {
            return back()->withErrors(['book_id' => 'No copies available for this book.']);
        }

        // Crear el préstamo
        Loan::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'loan_date' => now(),
            'due_date' => $request->due_date,
            'status' => 'active',
        ]);

        // Reducir copias disponibles
        $book->decrement('available_copies');

        return redirect()->route('loans.index')->with('success', 'Loan created successfully.');
    }

    // Devuelve el libro y actualiza el estado del préstamo
    public function returnBook(Loan $loan)
    {
        if ($loan->status !== 'active') {
            return back()->withErrors(['loan' => 'This loan is not active.']);
        }

        // Actualizar el estado del préstamo
        $loan->update([
            'return_date' => now(),
            'status' => 'returned',
        ]);

        // Incrementar las copias disponibles
        $loan->book->increment('available_copies');

        return redirect()->route('loans.index')->with('success', 'Book returned successfully.');
    }
}
