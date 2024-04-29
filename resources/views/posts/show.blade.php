@extends('layouts.app')

@section('content')

<div class="flex">
    <div class="w-4/5 border-x border-y-0 border-solid border-black border-opacity-10 px-5 me-5">

        <div class="w-2/3 mx-auto">
            <h1 class="text-4xl text-center font-black">{{ $post->title }}</h1>
            <p class="text-center font-bold opacity-50 my-3">{{ $post->description }}</p>
            <!-- Extra info -->
            <div class="flex justify-between">
                <p class="font-bold">Escrito por {{ $user->username }}</p>
                <p class="font-bold opacity-50">{{ $post->created_at->locale('pt')->diffForHumans() }}</p>
            </div>

            <hr class="border-black border-opacity-10 my-5 mb-7">

            <div class="mt-5">
                {!! htmlspecialchars_decode($post->content) !!}
            </div>
        </div>
    </div>

    <x-sidebar>
        @if(auth()->user()->id === $post->user_id)
        <x-primary-button id="editPostBtn" class="w-full rounded-2xl">
            Editar
        </x-primary-button>

        <x-dropdown>
            <x-slot name="trigger">
                <x-primary-button class="w-full rounded-2xl bg-red-500">
                    Excluir
                </x-primary-button>
            </x-slot>

            <x-slot name="content">
                <form method="post" action="{{ route('posts.destroy', ['post' => $post]) }}" class="px-2">
                    @csrf
                    @method('DELETE')

                    <p class="text-center">Essa ação é irreversível</p>
                    <p class="text-center">Tem certeza?</p>
                    <x-primary-button type="submit" class="w-full bg-red-500 text-center">
                        Excluir
                    </x-primary-button>

                    <x-primary-button class="bg-stone-700 w-full mt-2">
                        Cancelar
                    </x-primary-button>
                </form>
            </x-slot>
        </x-dropdown>
        @endif
    </x-sidebar>
</div>
@endsection

@section('scripts')
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
    image.classList.add('rounded-xl', 'my-5');
});
</script>
@endsection