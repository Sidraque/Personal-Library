<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800">
                            {{ isset($author) ? 'Editar Autor' : 'Novo Autor' }}
                        </h2>
                    </div>

                    <form action="{{ isset($author) ? route('authors.update', $author) : route('authors.store') }}" 
                          method="POST">
                        @csrf
                        @if(isset($author))
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 gap-6">
                            <!-- Nome -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                                <input type="text" name="name" id="name" 
                                       value="{{ old('name', $author->name ?? '') }}"
                                       class="mt-1 focus:ring-mangue focus:border-mangue block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Biografia -->
                            <div>
                                <label for="biography" class="block text-sm font-medium text-gray-700">Biografia</label>
                                <textarea name="biography" id="biography" rows="4"
                                          class="mt-1 focus:ring-mangue focus:border-mangue block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('biography', $author->biography ?? '') }}</textarea>
                                @error('biography')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end">
                            <a href="{{ route('authors.index') }}" 
                               class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-mangue">
                                Cancelar
                            </a>
                            <button type="submit"
                                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-mangue hover:bg-mangue-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-mangue">
                                {{ isset($author) ? 'Atualizar' : 'Salvar' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>