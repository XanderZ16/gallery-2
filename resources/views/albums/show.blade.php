@extends('layouts.main')

@section('title', 'Gallery | ' . $album->name)

@section('content')
    @include('partials.header')
    <div class="flex-grow bg-basic">
        <div class="w-[95%] max-w-screen-lg mx-auto">
            <div class="relative flex flex-col gap-2 py-6 mt-4 mb-2 bg-secondary">
                @if (auth()->user()->id == $album->user_id || auth()->user()->role == 'admin')
                <div class="absolute z-50 top-4 right-4">
                        <div id="kebab" class="p-1 rounded-full hover:cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512" class="size-5 fill-primary">
                                <path
                                    d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z" />
                            </svg>
                        </div>
                        <div id="photo_info"
                            class="absolute left-0 flex-col items-end hidden gap-1 p-2 rounded-md top-5 bg-tertiary text-md text-basic">
                            @if (auth()->user()->id == $album->user_id)
                            <a href="/albums/{{ $album->id }}/edit"
                                class="inline-block w-full text-primary text-nowrap text-end px-4 py-0.5 rounded-md hover:bg-primary hover:text-secondary transition">Edit</a>
                            @endif
                            <button id="delete"
                                class="w-full text-nowrap text-end text-red-500 px-4 py-0.5 rounded-md hover:bg-red-500 hover:text-white transition">Hapus</button>
                        </div>
                    </div>
                @endif
                <h1 class="text-3xl font-bold text-center text-primary">{{ $album->name }}</h1>
                <p class="text-center text-primary">{{ $album->description }}</p>
            </div>
            <div class="grid grid-cols-4 gap-1">
                @foreach ($photos as $photo)
                    <a href="/photos/{{ $photo->id }}" class="w-full aspect-square hover:cursor-pointer">
                        <img src="/storage/{{ $photo->image }}" alt="{{ $photo->title }}" class="object-cover w-full h-full">
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    @if (auth()->user()->id == $album->user_id || auth()->user()->role == 'admin')
        <div id="delete_alert_container"
            class="fixed top-0 left-0 z-50 items-center justify-center hidden w-screen h-screen opacity-0 backdrop-blur-sm bg-black/30">
            <div id="delete_alert" class="p-4 rounded-md opacity-0 bg-basic">
                <h4 class="text-xl font-semibold text-center text-white">Peringatan</h4>
                <hr class="my-2">
                <p class="text-white">Apa anda yakin ingin menghapus album ini?</p>
                <div class="flex justify-end gap-2 mt-4">
                    <button id="cancel_delete"
                        class="px-4 py-1 font-semibold transition border rounded-md border-primary text-primary hover:bg-primary hover:text-basic">Batal</button>
                    <form action="/albums/{{ $album->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit"
                            class="px-2 py-1 font-semibold text-white transition bg-red-500 rounded-md hover:bg-red-600">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <script src="/js/photo.js"></script>
@endsection
