<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400' }}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ $tweet->user->path() }}">
            <img class="rounded-full mr-3" src="{{ $tweet->user->avatar }}" alt="user icon" width="50px">
        </a>
    </div>

    <div class="flex-grow">
        <a href="{{ route('profile', $tweet->user) }}">
            <h5 class="font-bold mb-3">{{ $tweet->user->name }}</h5>
        </a>
        <p class="text-sm mb-3">
            {{ $tweet->body }}
        </p>
        <x-like-buttons :tweet="$tweet"/>
    </div>

    <div class="flex flex-col justify-between">
        <form class="text-right" method="POST" action="/tweets/{{ $tweet->id }}">
            @csrf
            @method('DELETE')
            <button class="text-medium" type="submit">x</button>
        </form>
        <p class="text-sm text-gray-500">{{ $tweet->getPublishTime() }}</p>
    </div>
</div>