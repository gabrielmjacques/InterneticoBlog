<x-app-layout>
    <x-slot name="slot">
        <div class="flex">
            <div
                class="w-4/5 min-h-96 border-x-4 border-y-0 border-solid border-black border-opacity-10 px-5 me-5 relative">
                @if($recentlyPosts->isEmpty())

                <div
                    class="w-full text-center text-zinc-500 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
                    <p class="text-3xl font-bold">{{ __('"Wow! No posts were found..."') }}</p>
                    <p class="text-2xl">{{ __('"How about creating a new post?"') }}</p>
                </div>

                @endif

                <h1 class="text-3xl text-center font-extrabold">{{ __('Recent Posts') }}</h1>

                <hr class="border-2 border-black border-opacity-10 my-5 mb-7">

                <!-- Recent Posts -->
                <div class="grid grid-cols-3 gap-4">
                    @foreach($recentlyPosts as $index => $post)

                    @php
                    $isDescriptionLong = strlen($post->description) > 120;
                    $imageUrl = asset('storage/' . $post->image);
                    @endphp

                    @if($isDescriptionLong)

                    <a href="{{ route('posts.show', ['post' => $post]) }}"
                        class="w-full h-full flex flex-col transition-all duration-300 bg-white active:bg-violet-100 ring-0 ring-violet-500 active:ring-2 active:ring-offset-2 rounded-md overflow-hidden shadow cursor-pointer col-span-2 row-span-2 relative hover:brightness-90 hover:shadow-xl">
                        <div class="w-full h-full brightness-50">
                            <img src="{{ $imageUrl }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                        </div>

                        <div class="w-5/6 h-full justify-between text-white px-5 py-10 absolute">
                            <h1 class="text-4xl font-extrabold">{{ $post->title }}</h1>
                            <p class="text-xl font-extrabold opacity-75">{{ $post->description }}</p>
                        </div>
                    </a>


                    @else

                    <div
                        class="w-full h-full flex flex-col transition-all duration-300 bg-white active:bg-violet-100 ring-0 ring-violet-500 active:ring-2 active:ring-offset-2 rounded-md overflow-hidden shadow-xl border border-gray-300 cursor-pointer hover:brightness-90 hover:shadow-xl">
                        <a href="{{ route('posts.show', ['post' => $post]) }}">
                            <div class="w-full h-44">
                                <img src="{{ $imageUrl }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                            </div>

                            <div class="w-full p-3">
                                <h1 class="text-lg text-black font-extrabold hover:underline">{{ $post->title }}</h1>
                                <p class="text-base text-black font-bold opacity-50">{{ $post->description }}</p>
                        </a>
                    </div>
                </div>

                @endif
                @endforeach
            </div>
        </div>

        <x-sidebar />
        </div>
    </x-slot>
</x-app-layout>

<script>
document.getElementById('createPostBtn').addEventListener('click', () => {
    window.location.href = "{{ route('posts.create') }}";
});
</script>