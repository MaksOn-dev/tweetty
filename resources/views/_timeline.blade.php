<div class="border border-gray-300 rounded-xl py-2">
    @forelse($tweets as $tweet)
        @include('_tweet')
    @empty
        <p class="p-3 px-4">Have no tweets yet!</p>
    @endforelse

    {{ $tweets->links() }}
</div>