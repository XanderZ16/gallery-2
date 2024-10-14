@extends('layouts.main')

@section('title', 'Gallery | Dashboard')

@section('content')
    <!-- component -->
    <div class="min-h-screen bg-basic">
        <aside
            class="bg-gradient-to-br from-gray-800 to-secondary -translate-x-80 fixed inset-0 z-50 my-4 ml-4 h-[calc(100vh-32px)] w-72 rounded-xl transition-transform duration-300 xl:translate-x-0">
            <div class="relative border-b border-white/20">
                <a class="flex items-center gap-4 px-8 py-6" href="/">
                    <h1 class="block font-sans text-xl antialiased font-semibold leading-relaxed tracking-normal text-white">
                        Admin Dashboard</h1>
                </a>
                <button
                    class="middle none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-8 max-w-[32px] h-8 max-h-[32px] rounded-lg text-xs text-white hover:bg-white/10 active:bg-white/30 absolute right-0 top-0 grid rounded-br-none rounded-tl-none xl:hidden"
                    type="button">
                    <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" aria-hidden="true" class="w-5 h-5 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </span>
                </button>
            </div>
            <div class="m-4">
                <ul class="flex flex-col gap-1 mb-4">
                    <li>
                        <a href="/dashboard">
                            <button
                                class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white  w-full flex items-center gap-4 px-4 capitalize {{ request()->is('dashboard') ? 'active-nav2' : 'hover:bg-white/10 active:bg-white/30' }}"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="w-5 h-5 text-inherit">
                                    <path
                                        d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z">
                                    </path>
                                    <path
                                        d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z">
                                    </path>
                                </svg>
                                <p
                                    class="block font-sans text-base antialiased font-medium leading-relaxed capitalize text-inherit">
                                    dashboard</p>
                            </button>
                        </a>
                    </li>
                    <li>
                        <a class="" href="/dashboard/photos">
                            <button
                                class="flex items-center w-full gap-4 px-4 py-3 font-sans text-xs font-bold text-white capitalize transition-all rounded-lg disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none {{ request()->is('dashboard/photos*') ? 'active-nav2' : 'hover:bg-white/10 active:bg-white/30' }}"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="w-5 h-5 text-inherit">
                                    <path fill-rule="evenodd"
                                        d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <p
                                    class="block font-sans text-base antialiased font-medium leading-relaxed capitalize text-inherit">
                                    Photos</p>
                            </button>
                        </a>
                    </li>
                    <li>
                        <a class="" href="/dashboard/albums">
                            <button
                                class="flex items-center w-full gap-4 px-4 py-3 font-sans text-xs font-bold text-white capitalize transition-all rounded-lg disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none {{ request()->is('dashboard/albums*') ? 'active-nav2' : 'hover:bg-white/10 active:bg-white/30' }}"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="w-5 h-5 text-inherit">
                                    <path fill-rule="evenodd"
                                        d="M1.5 5.625c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v12.75c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 18.375V5.625zM21 9.375A.375.375 0 0020.625 9h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zM10.875 18.75a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5zM3.375 15h7.5a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375zm0-3.75h7.5a.375.375 0 00.375-.375v-1.5A.375.375 0 0010.875 9h-7.5A.375.375 0 003 9.375v1.5c0 .207.168.375.375.375z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <p
                                    class="block font-sans text-base antialiased font-medium leading-relaxed capitalize text-inherit">
                                    Albums</p>
                            </button>
                        </a>
                    </li>
                </ul>
                <ul class="flex flex-col gap-1 mb-4">
                    <li>
                    <li class="mx-3.5 mt-4 mb-2">
                        <p
                            class="block font-sans text-sm antialiased font-black leading-normal text-white uppercase opacity-75">
                            auth pages</p>
                    </li>
                    </li>
                    <li class="mx-3.5 mt-4 mb-2">
                        <hr>
                    </li>
                    <li>
                        <a href="/dashboard/users"
                            class="flex items-center w-full gap-4 px-4 py-3 font-sans text-xs font-bold capitalize transition-all ease-out rounded-lg text-amber-500 disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none hover:bg-amber-500 active:bg-amber-600 hover:text-white {{ request()->is('dashboard/users*') ? 'bg-amber-500 text-white active:bg-amber-600' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                aria-hidden="true" class="w-5 h-5 text-inherit">
                                <path
                                    d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                                </path>
                            </svg>
                            <p
                                class="block font-sans text-base antialiased font-medium leading-relaxed capitalize transition ease-out text-inherit">
                                Users Data</p>
                        </a>
                    </li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button
                                class="flex items-center w-full gap-4 px-4 py-3 font-sans text-xs font-bold text-red-500 capitalize transition-all ease-out rounded-lg disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none hover:bg-red-500 active:bg-red-600 hover:text-white"
                                type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentcolor"
                                    class="size-5">
                                    <path
                                        d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                                </svg>
                                <p
                                    class="block font-sans text-base antialiased font-medium leading-relaxed capitalize transition ease-out text-inherit">
                                    Log Out</p>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="p-4 xl:ml-80">
            @yield('data')
        </div>
    </div>

    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     // Menggunakan Lottie untuk memutar animasi
        //     lottie.loadAnimation({
        //         container: document.getElementById('lottie-container'), // ID container
        //         path: '{{ asset('lottie/animation.lottie') }}', // Path ke file .lottie
        //         renderer: 'svg', // Format output (svg, canvas, html)
        //         loop: true, // Set loop animasi
        //         autoplay: true, // Autoplay saat dimuat
        //     });
        // });
    </script>
@endsection
