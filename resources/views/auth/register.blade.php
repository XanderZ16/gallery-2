@extends('layouts.main')
@section('title', 'Gallery | Daftar Akun')

@section('content')
    <div class="flex flex-col items-center min-h-screen bg-basic lg:flex-row lg:justify-center">
        <div class="flex flex-col items-center mt-4 lg:mt-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-20 lg:size-24">
                <defs>
                    <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#34D399;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#ffffff;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <path
                    d="M0 32c477.6 0 366.6 317.3 367.1 366.3L448 480h-26l-70.4-71.2c-39 4.2-124.4 34.5-214.4-37C47 300.3 52 214.7 0 32zm79.7 46c-49.7-23.5-5.2 9.2-5.2 9.2 45.2 31.2 66 73.7 90.2 119.9 31.5 60.2 79 139.7 144.2 167.7 65 28 34.2 12.5 6-8.5-28.2-21.2-68.2-87-91-130.2-31.7-60-61-118.6-144.2-158.1z"
                    fill="url(#gradient)" />
            </svg>
            <h1
                class="text-4xl font-bold text-center text-transparent bg-gradient-to-br from-green-800 to-white bg-clip-text">
                My Gallery</h1>
        </div>
        <div class="w-[90%] sm:max-w-screen-sm lg:ml-8">
            <div class="p-4 mx-auto mt-6 border border-black shadow-xl rounded-xl bg-secondary">
                <h2 class="text-3xl font-semibold text-center text-primary">Daftar Akun</h2>
                <hr class="mt-5 border-primary">
                <form action="/register" method="POST">
                    @csrf
                    <div class="flex flex-col text-basic">
                        <div class="mt-3 flex flex-col gap-4 lg:flex-row lg:first:*:w-3/5 lg:last:*:w-2/5">
                            <div>
                                <label for="fullname"
                                    class="block text-primary font-semibold text-lg px-2 py-1 w-fit @error('fullname') text-red-500 @enderror">Fullname</label>
                                <input type="text" placeholder="Masukkan nama lengkap" id="fullname" name="fullname"
                                    value="{{ old('fullname') }}"
                                    class="w-full pl-3 py-1.5 rounded-xl bg-tertiary text-md text-primary" autofocus>
                                @error('fullname')
                                    <p class="flex items-center gap-2 text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="size-4 fill-red-500">
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div>
                                <label for="username"
                                    class="block text-primary font-semibold text-lg px-2 py-1 w-fit @error('username') text-red-500 @enderror">Username</label>
                                <input type="text" placeholder="Masukkan username" id="username" name="username"
                                    value="{{ old('username') }}"
                                    class="w-full pl-3 py-1.5 rounded-xl bg-tertiary text-md text-primary">
                                @error('username')
                                    <p class="flex items-center gap-2 text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="size-4 fill-red-500">
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="email"
                                class="block text-primary font-semibold text-lg px-2 py-1 w-fit @error('email') text-red-500 @enderror">Email</label>
                            <input type="text" placeholder="Masukkan email" id="email" name="email"
                                value="{{ old('email') }}"
                                class="w-full pl-3 py-1.5 rounded-xl bg-tertiary text-md text-primary">
                            @error('email')
                                <p class="flex items-center gap-2 text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-red-500">
                                        <path
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="address"
                                class="block text-primary font-semibold text-lg px-2 py-1 w-fit @error('address') text-red-500 @enderror">Address</label>
                            <input type="text" placeholder="Masukkan alamat (opsional)" id="address" name="address"
                                value="{{ old('address') }}"
                                class="w-full pl-3 py-1.5 rounded-xl bg-tertiary text-md text-primary">
                            @error('address')
                                <p class="flex items-center gap-2 text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-red-500">
                                        <path
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mt-3 flex flex-col gap-4 lg:flex-row lg:*:w-1/2">
                            <div>
                                <label for="password"
                                    class="block text-primary font-semibold text-lg px-2 py-1 w-fit @error('password') text-red-500 @enderror">Sandi</label>
                                <input type="password" placeholder="Masukkan sandi" id="password" name="password"
                                    value="{{ old('password') }}"
                                    class="w-full pl-3 py-1.5 rounded-xl bg-tertiary text-md text-primary">
                                @error('password')
                                    <p class="flex items-center gap-2 text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="size-4 fill-red-500">
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div>
                                <label for="password_confirmation"
                                    class="block text-primary font-semibold text-lg px-2 py-1 w-fit @error('password_confirmation') text-red-500 @enderror">Konfirmasi
                                    Sandi</label>
                                <input type="password" placeholder="Konfirmasi sandi" id="password_confirmation"
                                    name="password_confirmation" value="{{ old('password_confirmation') }}"
                                    class="w-full pl-3 py-1.5 rounded-xl bg-tertiary text-md text-primary">
                                @error('password_confirmation')
                                    <p class="flex items-center gap-2 text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="size-4 fill-red-500">
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div
                            class="mt-3 flex gap-4 justify-around text-xl *:w-1/2 *:font-semibold *:text-center *:rounded-xl *:py-2">
                            <a href="/"
                                class="transition border border-primary dark:text-primary hover:border-none hover:bg-tertiary">Batal</a>
                            <button type="submit"
                                class="transition text-primary bg-tertiary hover:bg-primary hover:text-secondary">Daftar</button>
                        </div>
                    </div>
                </form>
                <p class="mt-4 text-lg text-primary">
                    Sudah memiliki akun terdaftar?
                    <a href="/login" class="hover:underline">Masuk</a>
                </p>
            </div>
        </div>
    </div>
@endsection
