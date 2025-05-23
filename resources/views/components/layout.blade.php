<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="flex flex-col min-h-screen bg-zinc-700">
        <nav class="bg-zinc-900 shadow-md p-4">
            <div class="container mx-auto flex justify-between items-center">
                <a href="#" class="text-xl font-bold text-gray-100">Logo</a>
                <ul class="flex space-x-6">
                    <x-link-item href="/" :active="Route::currentRouteName() === 'welcome'" class="underline">Homepage</x-link-item>
                    <x-link-item href="/films" :active="fnmatch('films.*', Route::currentRouteName())">Films</x-link-item>
                    <x-link-item href="/add/films" :active="Route::currentRouteName() === 'film.create'" >Ajouter</x-link-item>
                </ul>
            </div>
        </nav>

        <main class="flex-grow container mx-auto p-6 text-gray-200">
            {{ $slot }}
        </main>
    </body>
</html>
