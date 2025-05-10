<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'category'])->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        return view('books.create', compact('authors', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'publication_year' => 'required|integer|min:1000|max:' . (date('Y') + 1),
            'description' => 'nullable'
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Livro cadastrado com sucesso!');
    }

    public function edit(Book $book)
    {
        $authors = Author::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        return view('books.edit', compact('book', 'authors', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'publication_year' => 'required|integer|min:1000|max:' . (date('Y') + 1),
            'description' => 'nullable'
        ]);

        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Livro excluído com sucesso!');
    }
}