@extends('account.layout')

@section('title', 'Gallery | @' . $user->username)

@section('data')
    @if (session()->has('password_changed'))
        <div class="fixed bg-green-600 bottom-4 left-4">
            <p class="text-primary">Password berhasil diubah</p>
        </div>
    @endif

    <div class="grid w-full grid-cols-3 gap-1 md:w-3/4">
        @if ($photos->count())
            @foreach ($photos as $photo)
                <div class="w-full aspect-square bg-basic hover:cursor-pointer">
                    <a href="/photos/{{ $photo->id }}" class="w-full h-full">
                        <img src="/storage/{{ $photo->image }}" alt="{{ $photo->title }}" class="object-cover w-full h-full">
                    </a>
                </div>
            @endforeach
        @else
            <div class="flex items-center justify-center w-full col-span-3 text-xl text-center text-primary">No Photos</div>
        @endif
    </div>
@endsection
