@extends('layouts.main')

@section('title', 'Gallery | Jelajahi Album')

@section('content')

    @include('partials.header')
    @if ($albums->count())
        <div class="w-[95%] max-w-screen-lg mx-auto grid grid-cols-4 gap-2 mt-6">
            @foreach ($albums as $album)
                <a href="/albums/{{ $album->id }}">
                    <div class="relative w-full aspect-square hover:cursor-pointer">
                        <!-- Foto Pertama -->
                        @if ($album->first_photo())
                            <img src="/storage/{{ $album->first_photo()->image }}" alt="{{ $album->title }}"
                                class="absolute z-10 object-cover w-full h-full border">
                        @else
                            {{-- Jika tidak ada foto pertama, tampilkan gambar default atau placeholder --}}
                            <img src="/not_found.webp" alt="Default Image"
                                class="absolute z-30 object-cover w-full h-full border border-blue-50">
                        @endif

                        <!-- Foto Kedua -->
                        @if ($album->second_photo())
                            <img src="/storage/{{ $album->second_photo()->image }}" alt="{{ $album->title }}"
                                class="absolute z-20 object-cover w-full h-full top-2 left-2">
                        @endif

                        <!-- Foto Ketiga -->
                        @if ($album->third_photo())
                            <img src="/storage/{{ $album->third_photo()->image }}" alt="{{ $album->title }}"
                                class="absolute z-30 object-cover w-full h-full top-4 left-4">
                        @endif
                    </div>

                    <div>
                        <h4 class="text-lg font-semibold">{{ $album->name }}</h4>
                    </div>
                </a>
            @endforeach

        </div>
    @else
        <div class="flex items-center justify-center flex-grow w-full col-span-3 text-xl text-center text-primary">No albums
        </div>
    @endif

@endsection
