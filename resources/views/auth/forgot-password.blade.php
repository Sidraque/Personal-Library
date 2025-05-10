<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-bold text-gray-700">Recuperar Senha</h2>
                <p class="text-sm text-gray-500 mt-2">
                    Esqueceu sua senha? Sem problemas. Informe seu endereço de e-mail e enviaremos um link para você redefinir sua senha.
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email
                    </label>
                    <div class="mt-1">
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Enviar Link de Recuperação
                    </button>
                </div>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Lembrou sua senha?
                        <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Voltar para o login
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>