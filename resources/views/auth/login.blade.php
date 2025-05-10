<x-app-layout>
    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-8 text-center">
                        <h2 class="text-2xl font-bold text-gray-700">Login</h2>
                        <p class="text-sm text-gray-500 mt-2">Entre com suas credenciais</p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-mangue focus:border-mangue">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                            <input type="password" name="password" id="password" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-mangue focus:border-mangue">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <input type="checkbox" name="remember" id="remember"
                                    class="h-4 w-4 text-mangue focus:ring-mangue border-gray-300 rounded">
                                <label for="remember" class="ml-2 block text-sm text-gray-700">
                                    Lembrar-me
                                </label>
                            </div>
                            <button type="button" onclick="openPasswordResetModal()"
                                class="text-sm text-mangue hover:text-mangue-dark">
                                Esqueceu a senha?
                            </button>
                        </div>

                        <button type="submit"
                            class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-mangue hover:bg-mangue-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-mangue">
                            Entrar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>