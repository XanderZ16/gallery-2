<div class="flex-grow">
    @if ($comments->isEmpty())
        <div class="h-full flex justify-center items-center">
            <p class="text-primary">No Comments Here</p>
        </div>
    @else
        @foreach ($comments as $comment)
            <div class="mb-1 text-primary">
                <p><a href="/u/{{ $comment->user->username }}" class="font-semibold hover:underline">{{ $comment->user->username }}</a> {{ $comment->comment }}</p>
            </div>
        @endforeach
    @endif
</div>
