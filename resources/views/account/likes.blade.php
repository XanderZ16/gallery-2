@extends('account.layout')

@section('title', 'Likes | @' . $user->username)

@section('data')
    <div class="grid w-full grid-cols-3 gap-2 md:w-3/4">
        @if ($photos->count())
            @foreach ($photos as $photo)
                <div class="w-full aspect-square bg-basic hover:cursor-pointer">
                    <a href="/photos/{{ $photo->id }}" class="w-full h-full">
                        <img src="/storage/{{ $photo->image }}" alt="{{ $photo->title }}" class="object-cover w-full h-full">
                    </a>
                </div>
            @endforeach
        @else
            <div class="flex items-center justify-center w-full col-span-3 text-xl text-center text-primary">No liked photo</div>
        @endif
    </div>
@endsection
