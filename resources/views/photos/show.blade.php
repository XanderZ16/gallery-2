@extends('layouts.main')

@section('title', 'Gallery | ' . $photo->title)

@section('content')
    <style>
        @media print {
            body * {
                visibility: hidden;
                /* Sembunyikan semua elemen */
            }

            img#imageToPrint {
                visibility: visible;
                /* Hanya tampilkan gambar */
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
    @include('partials.header')

    <div class="flex flex-col justify-center flex-grow bg-basic">
        <div
            class="w-[95%] h-[80vh] max-w-screen-md mx-auto rounded-md overflow-hidden flex flex-col bg-secondary sm:flex-row sm:shadow-xl">
            <div class="flex items-center justify-between sm:hidden">
                <a href="/u/{{ $photo->user->username }}"
                    class="mb-2 text-2xl font-semibold text-primary hover:underline">{{ $photo->user->username }}</a>
                @if (auth()->check() && auth()->user()->id == $photo->user_id)
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512" class="size-5">
                            <path
                                d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z" />
                        </svg>
                        <div
                            class="absolute top-0 left-0 flex-col items-end gap-1 p-2 -translate-x-full rounded-md bg-secondary text-md text-basic">
                            <a href="/p/{{ $photo->id }}/edit"
                                class="w-full text-nowrap text-end px-4 py-0.5 rounded-md hover:bg-primary hover:text-white transition">Edit</a>
                            <form action="/photos/{{ $photo->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full text-nowrap text-end text-red-500 px-4 py-0.5 rounded-md hover:bg-red-500 hover:text-white transition">Hapus</button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
            <div class="w-full sm:w-3/5 md:w-1/2 bg-tertiary">
                <img id="imageToPrint" src="/storage/{{ $photo->image }}" alt="{{ $photo->title }}" class="object-contain w-full h-full">
            </div>
            <div class="flex flex-col w-full py-2 sm:w-2/5 md:w-1/2">
                <div class="hidden px-4 sm:block">
                    <div class="flex items-center justify-between">
                        <a href="/u/{{ $photo->user->username }}"
                            class="mb-2 text-xl font-semibold text-primary hover:underline ">{{ $photo->user->username }}</a>
                        @if ((auth()->check() && auth()->user()->id == $photo->user_id) || auth()->user()->role == 'admin')
                            <div class="relative">
                                <div id="kebab" class="p-1 rounded-full hover:cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512"
                                        class="size-5 fill-primary">
                                        <path
                                            d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z" />
                                    </svg>
                                </div>
                                <div id="photo_info"
                                    class="absolute left-0 z-50 flex-col items-end hidden gap-1 p-2 rounded-md top-5 bg-tertiary text-md">
                                    <button id="printBtn" onclick="window.print()" class="inline-block w-full text-primary text-nowrap text-end px-4 py-0.5 rounded-md hover:bg-primary hover:text-secondary transition">Print</button>
                                    <a href="/photos/{{ $photo->id }}/edit"
                                        class="inline-block w-full text-primary text-nowrap text-end px-4 py-0.5 rounded-md hover:bg-primary hover:text-secondary transition">Edit</a>
                                    @if (auth()->user()->role == 'admin')
                                        <button id="delete"
                                            class="w-full text-nowrap text-end text-red-500 px-4 py-0.5 rounded-md hover:bg-red-500 hover:text-white transition">Hapus</button>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <hr class="mt-1">
                <div class="flex flex-col flex-grow sm:px-4">
                    <h1 class="mt-2 text-xl font-semibold text-primary">{{ $photo->title }}</h1>
                    <div class="flex flex-col overflow-y-auto h-[60%] border-t border-b mt-2">
                        <p class="pt-1 mb-2 text-primary">
                            <a href="/u/{{ $photo->user->username }}"
                                class="font-semibold">{{ $photo->user->username }}</a>
                            {{ $photo->description }}
                        </p>
                        @livewire('comments', ['photo' => $photo])
                    </div>
                    <div class="flex items-center justify-between mt-2">
                        @livewire('toggle-like', ['photo' => $photo])
                        <p class="text-secondary">{{ $photo->created_at->diffForHumans() }}</p>
                    </div>
                    @livewire('comment-form', ['photo' => $photo])
                </div>
            </div>
        </div>
    </div>

    @if (auth()->check() && auth()->user()->role == 'admin')
        <div id="delete_alert_container"
            class="fixed top-0 left-0 items-center justify-center hidden w-screen h-screen opacity-0 backdrop-blur-sm bg-black/30">
            <div id="delete_alert" class="p-4 rounded-md opacity-0 bg-basic text-primary">
                <h4 class="text-xl font-semibold text-center">Peringatan</h4>
                <hr class="my-2">
                <p>Apa anda yakin ingin menghapus foto ini?</p>
                <div class="flex justify-end gap-2 mt-4">
                    <button id="cancel_delete"
                        class="px-4 py-1 font-semibold transition border rounded-md border-primary text-primary hover:bg-primary hover:text-secondary">Batal</button>
                    <form action="/photos/{{ $photo->id }}" method="POST">
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
