@extends('layouts.app')

@section('content')

<div class="flex">
    <div class="w-4/5 border-x border-y-0 border-solid border-black border-opacity-10 px-5 me-5">

        <div class="w-2/3 mx-auto">
            <h1 class="text-4xl text-center font-black">{{ $post->title }}</h1>
            <p class="text-center font-bold opacity-50 my-3">{{ $post->description }}</p>
            <!-- Extra info -->
            <div>
                <p class="font-bold">Escrito por {{ $user->username }}</p>
                <p class="font-bold opacity-50">{{ $post->created_at->locale('pt')->diffForHumans() }}</p>
            </div>
            <hr class="border-black border-opacity-10 my-5 mb-7">
            <div class="mt-5">
                {!! htmlspecialchars_decode($post->content) !!}
            </div>
        </div>
    </div>

    <x-sidebar />
</div>
@endsection

@section('scripts')
<script>
    const hr = document.createElement('hr');
    hr.classList.add('border-black', 'border-opacity-10', 'my-5', 'mb-7');

    document.getElementById('createPostBtn').addEventListener('click', () => {
        window.location.href = "{{ route('posts.create') }}";
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