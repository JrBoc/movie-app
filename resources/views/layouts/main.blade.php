<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex items-center justify-between px-4 py-6">
            <ul class="flex items-center">
                <li>
                    <a href="#">
                        @svg('o-play', ['width' => '32px'])
                    </a>
                </li>
                <li class="ml-6">
                    <a href="#" class="hover:text-gray-300">Movies</a>
                </li>
                <li class="ml-6">
                    <a href="#" class="hover:text-gray-300">TV Shows</a>
                </li>
                <li class="ml-6">
                    <a href="#" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>
            <div class="flex items-center">
                <div class="relative">
                    <input type="text"
                        class="bg-gray-800 rounded-full text-sm w-64 px-4 py-1 pl-8 focus:outline-none focus:shadow-outline"
                        placeholder="Search">
                        <div class="absolute top-0">
                            @svg('s-search', 'fill-current text-gray-500 w-4 mt-2 ml-2')
                        </div>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
</body>

</html>
