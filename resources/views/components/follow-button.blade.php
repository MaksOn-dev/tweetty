@unless(current_user() == $user)
    @if(current_user()->following($user))
        <form method="POST" action="/profiles/{{ $user->username }}/unfollow">
            @csrf
            <button class="bg-blue-500 rounded-full shadow py-1 px-4 text-white text-xs" type="submit">Unfollow me</button>
        </form>
    @else
        <form method="POST" action="/profiles/{{ $user->username }}/follow">
            @csrf
            <button class="bg-blue-500 rounded-full shadow py-1 px-4 text-white text-xs" type="submit">Follow me</button>
        </form>
    @endif
@endunless
