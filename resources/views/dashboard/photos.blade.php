@extends('dashboard.layout')

@section('data')

<div class="flex h-screen">
    @livewire('photos', ['search' => $search])
</div>

@endsection
