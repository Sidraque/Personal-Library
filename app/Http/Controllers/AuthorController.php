<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::withCount('books')->paginate(10); // Adicionando paginação e contagem de livros
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'biography' => 'nullable'
        ]);

        Author::create($validated);

        return redirect()->route('authors.index')
            ->with('success', 'Autor criado com sucesso!');
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'biography' => 'nullable'
        ]);

        $author->update($validated);

        return redirect()->route('authors.index')
            ->with('success', 'Autor atualizado com sucesso!');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index')
            ->with('success', 'Autor excluído com sucesso!');
    }
}