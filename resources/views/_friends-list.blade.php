
<div class="bg-blue-100 rounded-xl p-4">
    <h3 class="font-bold text-xl mb-4">Following</h3>
    <ul>
        @forelse(current_user()->follows as $user)
            <li class="{{ $loop->last ?: 'mb-4' }}">
                <div>
                    <a href="{{ route('profile', $user) }}" class="flex items-center text-sm">
                        <img class="rounded-full mr-3" src="{{ $user->avatar }}" alt="user icon" width="40px">
                        {{ $user->name }}
                    </a>
                </div>
            </li>
        @empty
            <p>Don't have friends yet!</p>
        @endforelse
    </ul>
</div>