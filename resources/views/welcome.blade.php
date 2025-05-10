<x-app-layout>
    <!-- Hero Section -->
    <div class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block">Biblioteca</span>
                            <span class="block text-mangue">Pessoal Digital</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Organize sua coleção de livros de forma simples e eficiente. Cadastre seus livros, autores favoritos e mantenha tudo organizado em categorias.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            @guest
                                <div class="rounded-md shadow">
                                    <a href="{{ route('register') }}" 
                                       class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-mangue hover:bg-mangue-dark md:py-4 md:text-lg md:px-10">
                                        Começar Agora
                                    </a>
                                </div>
                                <div class="mt-3 sm:mt-0 sm:ml-3">
                                    <a href="{{ route('login') }}" 
                                       class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-mangue bg-white hover:bg-gray-50 border-mangue md:py-4 md:text-lg md:px-10">
                                        Fazer Login
                                    </a>
                                </div>
                            @else
                                <div class="rounded-md shadow">
                                    <a href="{{ route('dashboard') }}" 
                                       class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-mangue hover:bg-mangue-dark md:py-4 md:text-lg md:px-10">
                                        Ir para o Dashboard
                                    </a>
                                </div>
                            @endguest
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base text-mangue font-semibold tracking-wide uppercase">Funcionalidades</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Tudo que você precisa para organizar sua biblioteca
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Gestão de Livros -->
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-mangue text-white">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg font-medium text-gray-900">Gestão de Livros</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Cadastre seus livros com informações detalhadas como título, ano de publicação e descrição.
                            </p>
                        </div>
                    </div>

                    <!-- Catálogo de Autores -->
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-mangue text-white">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg font-medium text-gray-900">Catálogo de Autores</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Mantenha um registro completo dos seus autores favoritos e suas biografias.
                            </p>
                        </div>
                    </div>

                    <!-- Organização por Categorias -->
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-mangue text-white">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg font-medium text-gray-900">Organização por Categorias</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Organize seus livros em categorias personalizadas para uma melhor gestão da sua biblioteca.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-mangue">
        <div class="max-w-7xl mx-auto text-center py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                <span class="block">Pronto para começar?</span>
                <span class="block">Crie sua conta gratuitamente hoje.</span>
            </h2>
            <div class="mt-8 flex justify-center">
                @guest
                    <div class="inline-flex rounded-md shadow">
                        <a href="{{ route('register') }}" 
                           class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-mangue bg-white hover:bg-gray-50">
                            Criar Conta Gratuita
                        </a>
                    </div>
                    <div class="ml-3 inline-flex">
                        <a href="{{ route('login') }}" 
                           class="inline-flex items-center justify-center px-5 py-3 border border-white text-base font-medium rounded-md text-white hover:bg-mangue-dark">
                            Fazer Login
                        </a>
                    </div>
                @else
                    <div class="inline-flex rounded-md shadow">
                        <a href="{{ route('dashboard') }}" 
                           class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-mangue bg-white hover:bg-gray-50">
                            Acessar Dashboard
                        </a>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</x-app-layout>