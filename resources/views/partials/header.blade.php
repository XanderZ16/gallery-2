<header class="relative mb-12 max-w-screen-2xl md:mb-0">
    <div class="flex justify-between items-center w-[95%] mx-auto py-2 border-b border-gray-400 md:py-2">
        <a href="/" class="flex items-center gap-4 hover:cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-8">
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
            <h1 class="hidden text-3xl font-bold dark:text-white lg:block">Gallery</h1>
        </a>
        <div class="flex">
            <form action="/{{ request()->is('photos*') ? 'photos' : (request()->is('albums*') ? 'albums' : 'photos') }}"
                method="GET" class="flex items-center gap-3">
                <label for="search" class="hidden md:block dark:fill-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5">
                        <path
                            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                    </svg>
                </label>
                <input id="search" type="text" name="search" placeholder="Cari Gambar"
                    value="@isset($search) {{ $search }} @endisset"
                    class="px-4 py-1.5 w-60 rounded-xl border border-black bg-[#303134] text-primary focus:outline-none">
                <button type="submit"></button>
            </form>

            <nav
                class="absolute left-0 flex items-center w-screen shadow-md -bottom-10 md:static md:w-full md:ml-8 md:shadow-none dark:text-white">
                <ul class="flex items-center justify-around h-8 md:gap-5">
                    {{-- <li class="text-lg font-semibold pb-1 md:pb-0 {{ request()->is('/') ? 'active-nav' : '' }}">
                        <a href="/">Beranda</a>
                    </li> --}}
                    <li class="text-xl font-semibold px-4 py-1 rounded-xl hover:bg-primary hover:text-basic hover:shadow-md !shadow-white transition {{ request()->is('photos*') ? 'active-nav' : '' }}">
                        <a href="/photos">Photos</a>
                    </li>
                    <li class="text-xl font-semibold px-4 py-1 rounded-xl hover:bg-primary hover:text-basic hover:shadow-md !shadow-white transition  {{ request()->is('albums*') ? 'active-nav' : '' }}">
                        <a href="/albums">Albums</a>
                    </li>
                </ul>
            </nav>
        </div>

        @auth
            <div class="relative">
                <h2 id="username" class="text-xl font-semibold py-1 text-primary hover:bg-primary hover:text-basic hover:shadow-md rounded-md px-4 !shadow-white transition hover:cursor-pointer">
                    {{ auth()->user()->username }}</h2>
                <div id="user_info"
                    class="absolute right-0 z-40 flex-col items-end hidden gap-1 p-2 rounded-md top-8 bg-secondary text-md text-basic">
                    @if (auth()->user()->role == 'admin')
                        <a href="/dashboard"
                            class="w-full text-primary text-nowrap text-end px-4 py-0.5 rounded-md hover:bg-primary hover:text-secondary transition">Dashboard</a>
                    @endif
                    <a href="/u/{{ auth()->user()->username }}"
                        class="w-full text-primary text-nowrap text-end px-4 py-0.5 rounded-md hover:bg-primary hover:text-secondary transition">My
                        Profile</a>
                    <button id="trigger"
                        class="w-full text-nowrap text-end text-red-500 px-4 py-0.5 rounded-md hover:bg-red-500 hover:text-white transition">Logout</button>
                </div>
            </div>
        @else
            <ul class="flex gap-2 text-lg font-semibold *:px-4 *:py-1 *:rounded-full">
                <li class="dark:text-white dark:hover:bg-[#303134] transition">
                    <a href="/register">Daftar</a>
                </li>
                <li class="transition dark:bg-primary hover:bg-green-400">
                    <a href="/login">Masuk</a>
                </li>
            </ul>
        @endauth
    </div>
</header>

<div id="alert_container"
    class="fixed top-0 left-0 z-50 items-center justify-center hidden w-screen h-screen opacity-0 backdrop-blur-sm bg-black/30">
    <div id="alert" class="p-4 rounded-md opacity-0 bg-secondary">
        <h4 class="text-xl font-semibold text-center text-primary">Peringatan</h4>
        <hr class="my-2">
        <p class="text-primary">Apa anda yakin ingin keluar dari akun ini?</p>
        <div class="flex justify-end gap-2 mt-4">
            <button id="cancel"
                class="px-4 py-1 font-semibold transition border rounded-md border-primary text-primary hover:bg-primary hover:text-basic">Batal</button>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit"
                    class="px-2 py-1 font-semibold text-white transition bg-red-500 rounded-md hover:bg-red-600">Logout</button>
            </form>
        </div>
    </div>
</div>

<script src="/js/navbar.js"></script>
