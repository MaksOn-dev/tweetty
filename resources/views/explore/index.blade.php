<x-app>
    <ul>
        @foreach($users as $user)
            <li class="mb-4">
                <a href="{{ $user->path() }}" class="flex items-center">
                    <img src="{{ $user->avatar }}" alt="{{ $user->name }}'s avatar" width="60" class="rounded-full mr-4">
                    <p>{{ $user->name }}</p>
                </a>
            </li>
        @endforeach
    </ul>
</x-app>