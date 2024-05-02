<x-app-layout>
    <x-slot name="slot">
        <div class="flex flex-col-reverse md:flex-row">
            <div
                class="w-full md:w-full min-h-96 md:border-x-4 border-y-0 border-solid border-black border-opacity-10 md:px-5 relative">
                @if($recentlyPosts->isEmpty())

                <div
                    class="w-full text-center text-zinc-500 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
                    <p class="text-3xl font-bold">{{ __('Wow! No posts were found...') }}</p>
                    <p class="text-2xl">{{ __('How about creating a new post?') }}</p>
                </div>

                @endif

                @if($recentlyPosts->isNotEmpty())
                <!-- Latest Posts -->
                <div class="flex items-center gap-2">
                    <h1 class="text-xl md:text-2xl font-mono font-extrabold mb-2">{{ __('Latest Posts') }}</h1>
                    <hr class="flex-1 border border-violet-300">
                </div>

                <div class="h-1/3 grid grid-cols-2 md:grid-cols-3 gap-2">
                    @foreach($recentlyPosts as $index => $post)

                    <?php
                    $maxLen = 70;
                    $imageUrl = asset('storage/' . $post->image);

                    if($index == 0){
                        $post->description = substr($post->description, 0, $maxLen + 300) . "... " . __('Read More');
                        
                    }else if(strlen($post->description) > $maxLen){
                        $post->description = substr($post->description, 0, $maxLen) . "... " . __('Read More');
                    }
                    ?>

                    @if($index == 0)

                    <a href="{{ route('posts.show', ['post' => $post]) }}"
                        class="col-span-2 row-span-2 h-full flex flex-col transition-all duration-300 bg-white active:bg-violet-100 ring-0 ring-violet-500 active:ring-2 active:ring-offset-2 rounded overflow-hidden shadow cursor-pointer relative hover:brightness-90 hover:shadow-xl">
                        <div class="w-full h-full brightness-50">
                            <img src="{{ $imageUrl }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                        </div>

                        <div class="w-5/6 h-full justify-between text-white p-2 md:p-5 absolute">
                            <h1 class="text-xl md:text-4xl font-extrabold">{{ $post->title }}</h1>
                            <p class="hidden md:block text-xl font-extrabold opacity-75 break-words">
                                {{ $post->description }}
                            </p>
                        </div>
                    </a>


                    @else

                    <a href="{{ route('posts.show', ['post' => $post]) }}"
                        class="h-52 md:h-full flex flex-col transition-all duration-300 bg-white active:bg-violet-100 ring-0 ring-violet-500 active:ring-2 active:ring-offset-2 rounded overflow-hidden shadow cursor-pointer relative hover:brightness-90 hover:shadow-xl">
                        <div class="w-full h-full brightness-50">
                            <img src="{{ $imageUrl }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                        </div>

                        <div class="w-full h-full justify-between text-white p-2 md:p-4 absolute">
                            <h1 class="text-base md:text-xl font-extrabold">{{ $post->title }}</h1>
                            <p class="hidden md:block text-base font-extrabold opacity-75 break-words">
                                {{ $post->description }}
                            </p>
                        </div>
                    </a>

                    @endif
                    @endforeach

                </div>

                <!--  More Posts -->
                <div class="flex items-center gap-2 mt-10">
                    <h1 class="text-xl md:text-2xl font-mono font-extrabold mb-2">{{ __('Read More') }}</h1>
                    <hr class="flex-1 border border-violet-300">
                </div>

                <div class="grid md:grid-cols-4 gap-5">

                    @foreach($posts as $post)

                    <?php
                    $imageUrl = asset('storage/' . $post->image);

                    if(strlen($post->description) > $maxLen){
                    $post->description = substr($post->description, 0, $maxLen) . '... Ler mais';
                    }
                    ?>

                    <div
                        class="flex flex-col transition-all duration-300 bg-white active:bg-violet-100 ring-0 ring-violet-500 active:ring-2 active:ring-offset-2 rounded-md overflow-hidden shadow-xl border border-gray-300 cursor-pointer hover:brightness-90 hover:shadow-xl">
                        <a href="{{ route('posts.show', ['post' => $post]) }}">
                            <div class="w-full h-44">
                                <img src="{{ $imageUrl }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                            </div>

                            <div class="w-full p-3">
                                <h1 class="text-lg text-black font-extrabold hover:underline">{{ $post->title }}
                                </h1>
                                <p class="text-base text-black font-bold opacity-50 break-words">
                                    {{ $post->description }}</p>
                            </div>
                        </a>
                    </div>

                    @endforeach
                </div>

                <div class="flex flex-col my-5">
                    {{ $posts->links() }}
                </div>
                @endif
            </div>
        </div>
    </x-slot>
</x-app-layout>

<script>
document.getElementById('createPostBtn').addEventListener('click', () => {
    window.location.href = "{{ route('posts.create') }}";
});
</script>