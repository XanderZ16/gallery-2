@extends('dashboard.layout')

@section('data')
    <div class="p-4 mx-auto mt-6 border border-black shadow-xl rounded-xl bg-secondary">
        <h2 class="text-3xl font-semibold text-center text-primary">Daftar Akun</h2>
        <hr class="mt-5 border-primary">
        <form action="/dashboard/users" method="POST">
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
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-red-500">
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
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-red-500">
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
                        value="{{ old('email') }}" class="w-full pl-3 py-1.5 rounded-xl bg-tertiary text-md text-primary">
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
                        value="{{ old('address') }}" class="w-full pl-3 py-1.5 rounded-xl bg-tertiary text-md text-primary">
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
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-red-500">
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
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-red-500">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="mt-3">
                    <label for="role"
                        class="block px-2 py-1 text-lg font-semibold text-primary w-fit">Role</label>
                    <select type="text" placeholder="Masukkan alamat (opsional)" id="role" name="role"
                        value="{{ old('role') }}" class="w-32 pl-3 py-1.5 rounded-xl bg-tertiary text-md text-primary">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                    @error('role')
                        <p class="flex items-center gap-2 text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-red-500">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
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
    </div>
@endsection
