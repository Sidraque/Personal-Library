<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-50">
        <nav class="bg-mangue">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <!-- Logo e Menu Principal -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            @auth
                                <a href="{{ route('dashboard') }}" class="text-white text-xl font-bold">Biblioteca Pessoal</a>
                            @else
                                <a href="/" class="text-white text-xl font-bold">Biblioteca Pessoal</a>
                            @endauth
                        </div>
                        
                        @auth
                            <div class="hidden sm:ml-8 sm:flex sm:space-x-4">
                                <a href="{{ route('books.index') }}" 
                                   class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('books.*') ? 'bg-mangue-dark' : '' }}">
                                   Livros
                                </a>
                                <a href="{{ route('authors.index') }}" 
                                   class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('authors.*') ? 'bg-mangue-dark' : '' }}">
                                   Autores
                                </a>
                                <a href="{{ route('categories.index') }}" 
                                   class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('categories.*') ? 'bg-mangue-dark' : '' }}">
                                   Categorias
                                </a>
                            </div>
                        @endauth
                    </div>

                    <!-- Menu de Autenticação -->
                    <div class="flex items-center">
                        @if (Route::has('login'))
                            <div class="flex space-x-4">
                                @auth
                                    <form method="POST" action="{{ route('logout') }}" class="flex items-center">
                                        @csrf
                                        <button type="submit" 
                                            class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium hover:bg-mangue-dark">
                                            Sair
                                        </button>
                                    </form>
                                @else
                                    @if (!request()->routeIs('login'))
                                        <a href="{{ route('login') }}" 
                                           class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium hover:bg-mangue-dark">
                                           Login
                                        </a>
                                    @endif
                                    @if (!request()->routeIs('register') && Route::has('register'))
                                        <a href="{{ route('register') }}" 
                                           class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium hover:bg-mangue-dark">
                                           Registrar
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Menu Mobile -->
            @auth
                <div class="sm:hidden">
                    <div class="px-2 pt-2 pb-3 space-y-1">
                        <a href="{{ route('books.index') }}" 
                           class="text-white hover:text-gray-200 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('books.*') ? 'bg-mangue-dark' : '' }}">
                           Livros
                        </a>
                        <a href="{{ route('authors.index') }}" 
                           class="text-white hover:text-gray-200 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('authors.*') ? 'bg-mangue-dark' : '' }}">
                           Autores
                        </a>
                        <a href="{{ route('categories.index') }}" 
                           class="text-white hover:text-gray-200 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('categories.*') ? 'bg-mangue-dark' : '' }}">
                           Categorias
                        </a>
                    </div>
                </div>
            @endauth
        </nav>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- Modal de Recuperação de Senha -->
        <div id="passwordResetModal" class="modal">
            <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-700">Recuperar Senha</h2>
                    <p class="text-sm text-gray-500 mt-2">
                        Informe seu e-mail para receber o link de recuperação de senha.
                    </p>
                </div>

                <form id="passwordResetForm" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-mangue focus:border-mangue">
                    </div>

                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button" onclick="closePasswordResetModal()"
                            class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                            Cancelar
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-mangue text-white rounded-md text-sm font-medium hover:bg-mangue-dark">
                            Enviar Link
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openPasswordResetModal() {
            document.getElementById('passwordResetModal').classList.add('show');
        }

        function closePasswordResetModal() {
            document.getElementById('passwordResetModal').classList.remove('show');
        }

        // Fechar modal ao clicar fora dele
        document.getElementById('passwordResetModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closePasswordResetModal();
            }
        });
    </script>
</body>
</html>