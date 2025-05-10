<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Estatísticas Gerais -->
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Card de Livros -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-5 bg-white">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-mangue p-3 rounded-md">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <div class="text-lg font-medium text-gray-900">{{ \App\Models\Book::count() }}</div>
                                <div class="text-sm text-gray-500">Livros Cadastrados</div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-5 py-3">
                        <a href="{{ route('books.index') }}" class="text-sm font-medium text-mangue hover:text-mangue-dark">
                            Ver todos os livros →
                        </a>
                    </div>
                </div>

                <!-- Card de Autores -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-5 bg-white">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-mangue p-3 rounded-md">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <div class="text-lg font-medium text-gray-900">{{ \App\Models\Author::count() }}</div>
                                <div class="text-sm text-gray-500">Autores Cadastrados</div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-5 py-3">
                        <a href="{{ route('authors.index') }}" class="text-sm font-medium text-mangue hover:text-mangue-dark">
                            Ver todos os autores →
                        </a>
                    </div>
                </div>

                <!-- Card de Categorias -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-5 bg-white">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-mangue p-3 rounded-md">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <div class="text-lg font-medium text-gray-900">{{ \App\Models\Category::count() }}</div>
                                <div class="text-sm text-gray-500">Categorias Cadastradas</div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-5 py-3">
                        <a href="{{ route('categories.index') }}" class="text-sm font-medium text-mangue hover:text-mangue-dark">
                            Ver todas as categorias →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Últimos Livros Cadastrados -->
            <div class="mt-8 bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Últimos Livros Cadastrados</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Autor</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoria</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ano</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach(\App\Models\Book::with(['author', 'category'])->latest()->take(5)->get() as $book)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $book->title }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $book->author->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $book->category->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $book->publication_year }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Ações Rápidas e Estatísticas -->
            <div class="mt-8 grid grid-cols-1 gap-8 sm:grid-cols-2">
                <!-- Ações Rápidas -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Ações Rápidas</h3>
                        <div class="space-y-3">
                            <a href="{{ route('books.create') }}" 
                               class="flex items-center px-4 py-2 bg-mangue text-white rounded-md hover:bg-mangue-dark group">
                                <svg class="h-5 w-5 mr-3 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Cadastrar Novo Livro
                            </a>
                            <a href="{{ route('authors.create') }}" 
                               class="flex items-center px-4 py-2 bg-mangue text-white rounded-md hover:bg-mangue-dark group">
                                <svg class="h-5 w-5 mr-3 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Cadastrar Novo Autor
                            </a>
                            <a href="{{ route('categories.create') }}" 
                               class="flex items-center px-4 py-2 bg-mangue text-white rounded-md hover:bg-mangue-dark group">
                                <svg class="h-5 w-5 mr-3 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Cadastrar Nova Categoria
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Top Categorias -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Categorias Mais Populares</h3>
                        <div class="space-y-4">
                            @foreach(\App\Models\Category::withCount('books')->orderBy('books_count', 'desc')->take(5)->get() as $category)
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium text-gray-600">{{ $category->name }}</span>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-mangue text-white">
                                        {{ $category->books_count }} livros
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>