<x-app-layout>
    <x-slot name="slot">
        <div class="flex">
            <div class="w-full md:border-x-4 border-y-0 border-solid border-black border-opacity-10">

                <div class="md:w-2/3 mx-auto">
                    <h1 class="text-3xl md:text-5xl font-black">{{ $post->title }}</h1>
                    <p class="text-base md:text-xl font-bold opacity-50 my-3">{{ $post->description }}</p>
                    <!-- Extra info -->
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-base font-bold">{{ __('Writed by') }} {{ $user->username }}</p>
                            <div class="flex flex-col md:flex-row md:items-center md:gap-2">
                                <p class="text-xs md:text-sm font-bold opacity-50">{{ __('Created') }}:
                                    {{ $post->created_at->locale('pt')->diffForHumans() }}
                                </p>

                                @if($post->created_at != $post->updated_at)
                                <span class="hidden md:inline">&bull;</span>

                                <p class="text-xs md:text-sm font-bold opacity-50">{{ __('Updated') }}:
                                    {{ $post->updated_at->locale('pt')->diffForHumans() }}</p>
                                @endif
                            </div>
                        </div>

                        <div>
                            <a href="{{ route('posts.edit', ['post' => $post]) }}">
                                <img src="{{ asset('icons/edit.svg') }}" alt=""
                                    class="w-8 md:w-10 opacity-50 rounded-lg p-1 hover:opacity-100 hover:bg-gray-300 active:brightness-95 transition-all">
                            </a>
                        </div>
                    </div>

                    <?php
                        $imageUrl = asset('storage/' . $post->image);
                    ?>

                    <div class="w-full h-56 md:h-80 my-3 rounded-md overflow-hidden">
                        <img src="{{ $imageUrl }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                    </div>

                    <hr class="w-2/3 mx-auto border-2 border-black border-opacity-10 my-5 mb-7">

                    <div id="text-content" class="mt-5">
                        {!! htmlspecialchars_decode($post->content) !!}
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

<script>
const hr = document.createElement('hr');
hr.classList.add('border-black', 'border-opacity-10', 'my-5', 'mb-7');

// Add classes to elements inside the post content
const paragraphs = document.querySelectorAll('#text-content p');
paragraphs.forEach(paragraph => {
    paragraph.classList.add('mb-5');
});

const lists = document.querySelectorAll('#text-content ul, #text-content ol');
lists.forEach(list => {
    list.classList.add('list-disc', 'ml-5', 'mb-5');
});

const blockquotes = document.querySelectorAll('#text-content blockquote');
blockquotes.forEach(blockquote => {
    blockquote.insertAdjacentElement('beforebegin', hr.cloneNode(true))
    blockquote.insertAdjacentElement('afterend', hr.cloneNode(true))
});

const images = document.querySelectorAll('#text-content img');
images.forEach(image => {
    image.classList.add('rounded-xl', 'my-5', 'mx-auto');
});

const figcaptions = document.querySelectorAll('#text-content figcaption');
figcaptions.forEach(figcaption => {
    figcaption.classList.add('text-center', 'text-sm', 'font-bold', 'opacity-50', 'mb-5');
});
// --------------------------------------------
</script>