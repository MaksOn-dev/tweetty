<x-master>
    <main>
        <div class="lg:flex">
            @auth()
                <div class="lg:w-32">
                    @include('_sidebar-links')
                </div>
            @endauth

            <div class="lg:flex-1" style="width: 100%; max-width: 700px">
                
                {{ $slot }}
                
            </div>

            @auth()
                <div class="lg:w-1/5">
                    @include('_friends-list')
                </div>
            @endauth
        </div>
    </main>
</x-master>