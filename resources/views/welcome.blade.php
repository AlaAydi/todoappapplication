<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TodoApp - Votre assistant productivité</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,600,700,800|outfit:700,800&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-slate-200">
        <div class="min-h-screen flex flex-col items-center justify-center relative overflow-hidden px-4">
            <!-- Decorative Background Elements -->
            <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-indigo-500/20 rounded-full blur-[120px] -z-10 animate-pulse"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-purple-500/20 rounded-full blur-[120px] -z-10 animate-pulse delay-700"></div>

            <main class="max-w-4xl w-full text-center py-20 relative z-10">
                <!-- Logo Section -->
                <div class="flex justify-center mb-12">
                    <div class="w-24 h-24 bg-gradient-to-tr from-indigo-500 to-purple-500 rounded-[2rem] flex items-center justify-center shadow-2xl transform rotate-12 hover:rotate-0 transition-transform duration-500">
                        <svg class="w-14 h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                    </div>
                </div>

                <h1 class="text-6xl md:text-8xl font-black text-white tracking-tighter mb-6 font-outfit">
                    Todo<span class="text-indigo-400">App</span>
                </h1>
                
                <p class="text-xl md:text-2xl text-slate-400 max-w-2xl mx-auto mb-12 leading-relaxed">
                    Organisez votre vie, une tâche à la fois. Découvrez l'expérience de gestion de tâches la plus fluide et élégante.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="premium-button px-10 py-4 text-lg">
                            Accéder au Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="premium-button px-10 py-4 text-lg">
                            Se connecter
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-10 py-4 rounded-2xl bg-white/5 hover:bg-white/10 text-white font-bold text-lg transition-all backdrop-blur-xl border border-white/10 shadow-xl">
                                Créer un compte
                            </a>
                        @endif
                    @endauth
                </div>

                <!-- Feature Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-32">
                    <div class="premium-card text-left p-8">
                        <div class="w-12 h-12 bg-indigo-500/10 rounded-xl flex items-center justify-center mb-6 text-indigo-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Rapide</h3>
                        <p class="text-slate-400 text-sm">Interface optimisée pour une saisie ultra-rapide de vos objectifs.</p>
                    </div>
                    <div class="premium-card text-left p-8">
                        <div class="w-12 h-12 bg-purple-500/10 rounded-xl flex items-center justify-center mb-6 text-purple-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Sécurisé</h3>
                        <p class="text-slate-400 text-sm">Vos données sont protégées et accessibles uniquement par vous.</p>
                    </div>
                    <div class="premium-card text-left p-8">
                        <div class="w-12 h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center mb-6 text-emerald-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Simple</h3>
                        <p class="text-slate-400 text-sm">Une expérience utilisateur épurée sans distractions inutiles.</p>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="mt-20 py-10 border-t border-white/5 w-full text-center text-slate-500 text-sm">
                <p>&copy; {{ date('Y') }} TodoApp Premium. Fait avec passion.</p>
            </footer>
        </div>
    </body>
</html>
