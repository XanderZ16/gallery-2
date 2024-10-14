@extends('dashboard.layout')

@section('data')
    <!-- component -->
    <!-- This is an example component -->
    <div class="mx-auto max-w-7xl">

        <div class="relative flex flex-col shadow-md sm:rounded-lg">
            <form>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search" name="search" value="{{ $search }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search User">
                </div>
                <button type="submit" hidden></button>
            </form>
            <a href="/dashboard/users/create"
                class="center rounded-lg self-end bg-blue-500 mt-4 block w-fit py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                data-ripple-light="true">
                Tambah User
            </a>
            <table class="w-full mt-4 overflow-hidden text-sm text-left text-gray-500 rounded-md dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Profile
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Username
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Full Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Address
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                PP
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $user->fullname }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $user->username }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $user->email }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $user->address }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $user->role }}
                            </th>
                            <td class="flex px-6 py-4 text-right">
                                <a href="/u/{{ $user->username }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                                    <button id="trigger"
                                    class="ml-4 font-medium text-red-600 dark:text-red-600 hover:text-red-500 dark:hover:text-red-500 hover:underline">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="alert_container"
        class="fixed top-0 left-0 z-50 items-center justify-center hidden w-screen h-screen opacity-0 backdrop-blur-sm bg-black/30">
        <div id="alert" class="p-4 rounded-md opacity-0 bg-secondary">
            <h4 class="text-xl font-semibold text-center text-primary">Peringatan</h4>
            <hr class="my-2">
            <p class="text-primary">Apa anda yakin ingin menghapus akun ini?</p>
            <div class="flex justify-end gap-2 mt-4">
                <button id="cancel"
                    class="px-4 py-1 font-semibold transition border rounded-md border-primary text-primary hover:bg-primary hover:text-basic">Batal</button>
                <form method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit"
                        class="px-2 py-1 font-semibold text-white transition bg-red-500 rounded-md hover:bg-red-600">Hapus</button>
                </form>
            </div>
        </div>
    </div>

    <script src="/js/delete_user.js"></script>
@endsection
