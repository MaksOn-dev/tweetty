<div class="border border-blue-400 rounded-xl py-6 px-8 mb-8 overflow-hidden">
    <form method="POST" action="/tweets">
        @csrf

        <textarea class="w-full" name="body" id="body" placeholder="Whats up man?"></textarea>
        @error('body')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
        <hr class="my-4">
        <footer class="flex justify-between">
            <img class="rounded-full" src="{{ current_user()->avatar }}" alt="user icon" width="40px">
            <button class="bg-blue-500 hover:bg-blue-600 shadow py-2 px-12 rounded-full text-white" type="submit">Publish</button>
        </footer>
    </form>
</div>