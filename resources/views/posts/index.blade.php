@extends('layouts.app')

@section('content')

<div class="flex">
    <div class="w-4/5 border-x px-5 me-5">

        <h1 class="text-4xl font-extrabold">Publicado Recentemente</h1>

        <hr class="border-black border-opacity-10 my-5 mb-7">

        <!-- Recent Posts -->
        <div class="flex gap-5">
            @foreach($posts as $post)

            @php
            $imageUrl = asset('storage/' . $post->image);
            @endphp

            <div class="w-3/12 h-80 flex flex-col transition-all bg-violet-50 active:bg-violet-100 ring-0 ring-violet-500 active:ring-2 active:ring-offset-2 rounded-md overflow-hidden shadow cursor-pointer">
                <div class="w-full h-44">
                    <img src="{{ $imageUrl }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                </div>

                <div class="w-full p-2">
                    <a>
                        <h1 class="text-lg font-extrabold">{{ $post->title }}</h1>
                    </a>

                    <p class="font-bold opacity-50">{{ $post->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="w-1/5">
        <x-primary-button id="createPostBtn" class="w-full rounded-2xl">
            Create Post
        </x-primary-button>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.getElementById('createPostBtn').addEventListener('click', () => {
        window.location.href = "{{ route('posts.create') }}";
    });
</script>
@endsection