@extends('account.layout')

@section('title', 'Albums | @' . $user->username)

@section('data')
    <div class="grid w-full grid-cols-3 gap-2 md:w-3/4">
        @if ($albums->count())
            @foreach ($albums as $album)
                <div class="w-full aspect-square bg-basic hover:cursor-pointer">
                    <a href="/albums/{{ $album->id }}" class="w-full h-full">
                        <img src="/storage/{{ $album->first_photo()->image }}" alt="{{ $album->title }}" class="object-cover w-full h-full">
                    </a>
                </div>
            @endforeach
        @else
            <div class="flex items-center justify-center w-full col-span-3 text-xl text-center text-primary">No albums</div>
        @endif
    </div>
@endsection
