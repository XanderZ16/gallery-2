@extends('layouts.main')

@section('title', 'Gallery | Upload Gambar')

@section('content')
    @include('partials.header')
    <div class="max-w-screen-2xl min-h-screen bg-basic py-6">
        <div class="w-[90%] max-w-screen-md mx-auto rounded-xl p-6 bg-secondary">
            <h1 class="text-primary font-bold text-2xl text-center">Edit Gambar</h1>
            <hr class="my-4 border-primary">
            <form action="/photos/{{ $photo->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="w-full max-w-[500px] mx-auto">
                    <label for="image"
                        class="block rounded-xl bg-slate-200 border-2 border-dashed border-black overflow-hidden hover:cursor-pointer">
                        <div id="preview-label" class="w-full">
                            <img id="image-preview" src="/storage/{{ $photo->image }}" class="w-full h-full"
                                alt="image preview">
                        </div>
                    </label>
                    <input type="file" name="image" id="image" hidden>
                    @error('image')
                        <p class="flex items-center gap-2 text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-red-500">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mt-4">
                    <div>
                        <label for="title"
                            class="block text-primary font-semibold text-lg px-2 py-1 w-fit @error('password') text-red-500 @enderror">Judul</label>
                        <input type="text" placeholder="Masukkan Judul" id="title" name="title"
                            value="{{ old('title', $photo->title) }}"
                            class="w-full pl-3 py-1.5 rounded-xl bg-tertiary text-md text-primary">
                        @error('title')
                            <p class="flex items-center gap-2 text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-red-500">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label for="description"
                            class="block text-primary font-semibold text-lg px-2 py-1 w-fit @error('password') text-red-500 @enderror">Deskripsi</label>
                        <textarea type="text" placeholder="Masukkan Deskripsi" id="description" name="description"
                            class="w-full pl-3 py-1.5 rounded-xl bg-tertiary text-md text-primary">{{ old('description', $photo->description) }}</textarea>
                        @error('description')
                            <p class="flex items-center gap-2 text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-red-500">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div
                    class="mt-4 flex gap-4 justify-around text-xl *:w-1/2 *:font-semibold *:text-center *:rounded-xl *:border-2 *:py-2">
                    <a href="/"
                        class="border border-primary dark:text-primary hover:border-none hover:bg-tertiary transition">Batal</a>
                    <button type="submit"
                        class="text-primary bg-tertiary hover:bg-primary hover:text-secondary transition">Unggah</button>
                </div>
            </form>
        </div>
    </div>
    <script src="/js/imgPreview.js"></script>

@endsection
