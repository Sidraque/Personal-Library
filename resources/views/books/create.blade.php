<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800">
                            {{ isset($book) ? 'Editar Livro' : 'Novo Livro' }}
                        </h2>
                    </div>

                    <form action="{{ isset($book) ? route('books.update', $book) : route('books.store') }}" 
                          method="POST">
                        @csrf
                        @if(isset($book))
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 gap-6">
                            <!-- Título -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                                <input type="text" name="title" id="title" 
                                       value="{{ old('title', $book->title ?? '') }}"
                                       class="mt-1 focus:ring-mangue focus:border-mangue block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Autor -->
                            <div>
                                <label for="author_id" class="block text-sm font-medium text-gray-700">Autor</label>
                                <select name="author_id" id="author_id"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-mangue focus:border-mangue sm:text-sm">
                                    <option value="">Selecione um autor</option>
                                    @foreach($authors as $author)
                                        <option value="{{ $author->id }}" 
                                            {{ old('author_id', $book->author_id ?? '') == $author->id ? 'selected' : '' }}>
                                            {{ $author->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('author_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Categoria -->
                            <div>
                                <label for="category_id" class="block text-sm font-medium text-gray-700">Categoria</label>
                                <select name="category_id" id="category_id"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-mangue focus:border-mangue sm:text-sm">
                                    <option value="">Selecione uma categoria</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" 
                                            {{ old('category_id', $book->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Ano de Publicação -->
                            <div>
                                <label for="publication_year" class="block text-sm font-medium text-gray-700">Ano de Publicação</label>
                                <input type="number" name="publication_year" id="publication_year" 
                                       value="{{ old('publication_year', $book->publication_year ?? '') }}"
                                       class="mt-1 focus:ring-mangue focus:border-mangue block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('publication_year')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Descrição -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
                                <textarea name="description" id="description" rows="3"
                                          class="mt-1 focus:ring-mangue focus:border-mangue block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('description', $book->description ?? '') }}</textarea>
                                @error('description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end">
                            <a href="{{ route('books.index') }}" 
                               class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-mangue">
                                Cancelar
                            </a>
                            <button type="submit"
                                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-mangue hover:bg-mangue-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-mangue">
                                {{ isset($book) ? 'Atualizar' : 'Salvar' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>