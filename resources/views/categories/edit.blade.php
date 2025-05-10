<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800">
                            {{ isset($category) ? 'Editar Categoria' : 'Nova Categoria' }}
                        </h2>
                    </div>

                    <form action="{{ isset($category) ? route('categories.update', $category) : route('categories.store') }}" 
                          method="POST">
                        @csrf
                        @if(isset($category))
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 gap-6">
                            <!-- Nome -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                                <input type="text" name="name" id="name" 
                                       value="{{ old('name', $category->name ?? '') }}"
                                       class="mt-1 focus:ring-mangue focus:border-mangue block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Descrição -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
                                <textarea name="description" id="description" rows="3"
                                          class="mt-1 focus:ring-mangue focus:border-mangue block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('description', $category->description ?? '') }}</textarea>
                                @error('description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end">
                            <a href="{{ route('categories.index') }}" 
                               class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-mangue">
                                Cancelar
                            </a>
                            <button type="submit"
                                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-mangue hover:bg-mangue-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-mangue">
                                {{ isset($category) ? 'Atualizar' : 'Salvar' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>