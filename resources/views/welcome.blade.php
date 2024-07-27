@php use App\Models\Chapter; @endphp
@php /** @var array<Chapter> $chapters */ @endphp
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Web漫画トラッカー</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<div class="bg-gray-50 text-gray-800 dark:bg-black dark:text-white/50">
    <div
        class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <header class="flex flex-row justify-between items-center py-2">
                <div class="lg:justify-center text-2xl font-bold">
                    Web漫画トラッカー
                </div>

                @auth
                    <div>ログイン中</div>
                @endauth
                @guest
                    <div>
                        <a href="/auth/google/redirect">ログイン</a>
                    </div>
                @endguest
            </header>

            <main class="lg:mt-6">
                <div class="flex flex-col gap-4">
                    @foreach($chapters as $chapter)
                        <x-chapter-card :chapter="$chapter"/>
                    @endforeach
                </div>
            </main>

            <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </footer>
        </div>
    </div>
</div>
</body>
</html>
