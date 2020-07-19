@extends('layouts.main')

@section('content')
<div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <img src="{{ 'https://images.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
        <div class="md:ml-24">
            <h2 class="text-4xl font-semibold">MEMES</h2>
            <div class="flex flex-wrap items-center text-gray-400">
                <svg class="fill-current text-orange-500 w-4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                </svg>
                <span class="ml-1">{{ $movie['vote_average'] * 10 }}%</span>
                <span class="mx-2">|</span>
                <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                <span class="mx-2">|</span>
                <span>
                    @foreach ($movie['genres'] as $genre)
                    {{ $genre['name'] . ((!$loop->last) ? ',': '') }}
                    @endforeach
                </span>
            </div>

            <p class="text-gray-300 mt-8">
                {{ $movie['overview'] }}
            </p>

            <div class="mt-12">
                <h4 class="text-white font-semibold">Featured Crew</h4>
                <div class="flex mt-4">
                    @foreach ($movie['credits']['crew'] as $crew)
                    @if (in_array($crew['job'], ['Director', 'Screenplay']))
                    <div class="mr-8">
                        <div>{{ $crew['name'] }}</div>
                        <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>

            @if(count($movie['videos']['results']))
            <div class="mt-12">
                <a href="https://youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}" target="_blank" class="inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                    <svg class="w-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-2">Play Trailer</span>
                </a>
            </div>
            @endif

        </div>
    </div>
</div>

<div class="movie-case border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <div class="popular-movies">
            <h2 class="text-4xl font-semibold">Casts</h2>
            <div class="grid grid-cols-1 sm:grid-col-2 md:grid-col-3 lg:grid-cols-5 gap-8">
                @foreach ($movie['credits']['cast'] as $cast)
                @if($loop->index < 5)
                <div class="mt-8">
                    <a href="">
                        <img src="{{ 'https://image.tmdb.org/t/p/w300/' . $cast['profile_path'] }}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300 font-semibold">{{ $cast['name'] }}</a>
                        <div class="text-gray-400">
                            {{ $cast['character'] }}
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="movie-image border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <div class="popular-movies">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-col-2 md:grid-rows-3 lg:grid-cols-3 gap-8">
                @foreach ($movie['images']['backdrops'] as $image)
                @if($loop->index < 9)
                <div class="mt-8">
                    <a href="">
                        <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $image['file_path'] }}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
