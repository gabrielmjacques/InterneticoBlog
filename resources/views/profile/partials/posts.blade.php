<div class="bg-white min-h-80 p-2 md:p-5 rounded-2xl shadow relative">

    @if($posts->isEmpty())
    <h1 class="text-center font-bold opacity-50 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
        {{ __('No posts found...') }}</h1>
    @endif

    <ul class="flex flex-col gap-5">
        @foreach($posts as $post)
        <?php
            $imageUrl = 'storage/' . $post->image;
        ?>

        <li class="flex flex-col md:flex-row justify-between gap-3 rounded-xl w-full text-start transition-all">
            <div class="w-full md:w-2/12 h-32 overflow-hidden rounded-md">
                <img class="w-full h-full object-cover" src="{{ asset($imageUrl) }}" alt="">
            </div>

            <div class="w-full md:w-9/12">
                <a href="{{ route('posts.show', $post) }}">
                    <h3>{{ $post->title }}</h3>
                </a>

                <p class="text-sm">{{ __('Created') }}: {{ $post->created_at->diffForHumans() }}</p>
                <p class="text-sm">{{ __('Updated') }}: {{ $post->updated_at->diffForHumans() }}</p>
            </div>

            <div class="w-full md:w-1/12 flex md:flex-col items-end justify-between">
                <a href="{{ route('posts.edit', ['post' => $post]) }}">
                    <img src="{{ asset('icons/edit.svg') }}" alt=""
                        class="w-7 md:w-9 opacity-50 rounded-lg p-1 hover:opacity-100 hover:bg-gray-300 active:brightness-95 transition-all">
                </a>

                <x-dropdown>
                    <x-slot name="trigger">
                        <img src="{{ asset('icons/delete.svg') }}" alt=""
                            class="w-7 md:w-9 cursor-pointer opacity-50 rounded-lg p-1 hover:opacity-100 hover:bg-red-200 active:brightness-95 transition-all">
                    </x-slot>

                    <x-slot name="content">
                        <form method="POST" action="{{ route('posts.destroy', ['post' => $post]) }}"
                            class="flex flex-col">
                            @csrf
                            @method('DELETE')

                            <p class="p-1 text-center font-bold">{{ __('Are you sure you want to delete this post?') }}
                            </p>

                            <x-danger-button type="submit" class="w-full rounded-none">
                                {{ __('Delete') }}
                            </x-danger-button>

                            <x-secondary-button type="button" class="w-full rounded-none">
                                {{ __('Cancel') }}
                            </x-secondary-button>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </li>

        @if(!$loop->last)
        <hr>
        @endif
        @endforeach

        {{ $posts->appends(['tab'=>'posts'])->links() }}
    </ul>

</div>