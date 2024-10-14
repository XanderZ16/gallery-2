@extends('dashboard.layout')

@section('data')
<div class="flex w-full gap-4 *:w-1/3">
    <div class="w-full p-6 text-white bg-tertiary rounded-xl">
        <h3 class="font-sans text-2xl font-bold">Total User</h3>
        <hr class="my-3 border-white">
        <p class="">{{ $user_count }} User</p>
    </div>
    <div class="w-full p-6 text-white bg-tertiary rounded-xl">
        <h3 class="font-sans text-2xl font-bold">Total Foto</h3>
        <hr class="my-3 border-white">
        <p class="">{{ $photo_count }} Foto</p>
    </div>
    <div class="w-full p-6 text-white bg-tertiary rounded-xl">
        <h3 class="font-sans text-2xl font-bold">Total Album</h3>
        <hr class="my-3 border-white">
        <p class="">{{ $album_count }} Album</p>
    </div>
</div>
<div id="lottie-container" style="width: 300px; height: 300px;"></div>
@endsection
