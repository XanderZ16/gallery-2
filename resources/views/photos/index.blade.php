@extends('layouts.main')

@section('title', 'Gallery | Jelajahi Gambar')

@section('content')

    @include('partials.header')
    <div class="w-[95%] max-w-screen-lg mx-auto flex-grow flex">
        @livewire('photos', ['search' => $search])
    </div>

@endsection
