<x-app-layout>
    <x-slot name="slot">
        <div class="flex">
            <div class="w-4/5 border-x border-y-0 border-solid border-black border-opacity-10 px-5 me-5">

                <div class="w-2/3 mx-auto">
                    <h1 class="text-5xl font-black">{{ $post->title }}</h1>
                    <p class="font-bold opacity-50 my-3">{{ $post->description }}</p>
                    <!-- Extra info -->
                    <div>
                        <p class="font-bold">Escrito por {{ $user->username }}</p>

                        <div class="flex items-center gap-2">
                            <p class="text-sm font-bold opacity-50">Publicado:
                                {{ $post->created_at->locale('pt')->diffForHumans() }}
                            </p>

                            @if($post->created_at != $post->updated_at)
                            <span>•</span>
                            <p class="text-sm font-bold opacity-50">Atualizado pela última vez:
                                {{ $post->updated_at->locale('pt')->diffForHumans() }}</p>
                            @endif
                        </div>
                    </div>

                    <hr class="border-black border-opacity-10 my-5 mb-7">

                    <div class="mt-5">
                        {!! htmlspecialchars_decode($post->content) !!}
                    </div>
                </div>
            </div>

            <x-sidebar>
                @if(auth()->user()->id === $post->user_id)
                <x-secondary-button id="editPostBtn" class="w-full rounded-2xl">
                    Editar
                </x-secondary-button>

                <x-dropdown>
                    <x-slot name="trigger">
                        <x-danger-button class="w-full rounded-2xl">
                            {{ __('Delete') }}
                        </x-danger-button>
                    </x-slot>

                    <x-slot name="content">
                        <form method="post" action="{{ route('posts.destroy', ['post' => $post]) }}" class="px-2">
                            @csrf
                            @method('DELETE')

                            <p class="text-center">Essa ação é irreversível</p>
                            <p class="text-center">Tem certeza?</p>
                            <x-danger-button type="submit" class="w-full text-center">
                                {{ __('Delete') }}
                            </x-danger-button>

                            <x-secondary-button type="button" class="bg-stone-700 w-full mt-2">
                                {{ __('Cancel') }}
                            </x-secondary-button>
                        </form>
                    </x-slot>
                </x-dropdown>
                @endif
            </x-sidebar>
        </div>
    </x-slot>
</x-app-layout>

<script>
const hr = document.createElement('hr');
hr.classList.add('border-black', 'border-opacity-10', 'my-5', 'mb-7');

document.getElementById('createPostBtn').addEventListener('click', () => {
    window.location.href = "{{ route('posts.create') }}";
});

document.getElementById('editPostBtn').addEventListener('click', () => {
    window.location.href = "{{ url('posts/'.$post->id.'/edit') }}";
});

const blockquotes = document.querySelectorAll('blockquote');
blockquotes.forEach(blockquote => {
    blockquote.insertAdjacentElement('beforebegin', hr.cloneNode(true))
    blockquote.insertAdjacentElement('afterend', hr.cloneNode(true))
});

const images = document.querySelectorAll('img');
images.forEach(image => {
    image.classList.add('rounded-xl', 'my-5', 'mx-auto');
});
</script>