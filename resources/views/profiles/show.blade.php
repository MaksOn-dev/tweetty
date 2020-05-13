<x-app>
    <header class="mb-4">
        <div class="wrapper relative">
            <img class="rounded-xl h-56 w-full mb-4" src="/images/profile-banner.png" alt="profile banner">
            <img class="rounded-full absolute" src="{{ $user->avatar }}" alt="user icon" width="120px" style="left: calc(50% - 60px);bottom:-60px;">
        </div>

        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-bold text-2xl mb-0" style="max-width: 260px">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>
            <div class="flex">
                @can('edit', $user)
                    <a class="rounded-full shadow py-1 px-4 text-black text-xs mr-2" href="{{ $user->path('edit') }}">Edit profile</a>
                @endcan

                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>
    </header>

    <p class="text-sm mb-5">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, facilis nam accusantium voluptatum sit nihil quo earum sequi voluptate laboriosam reprehenderit dolorem cum ea ducimus fugiat a. Repellendus tenetur impedit sit beatae, blanditiis placeat ducimus distinctio! Asperiores architecto, dolorem a reiciendis voluptates amet ullam aut, veritatis cupiditate obcaecati voluptatibus vero?
    </p>

    @include('_timeline', [
        'tweets' => $tweets
    ])
</x-app>