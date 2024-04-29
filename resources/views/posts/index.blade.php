@extends('layouts.app')

@section('content')

<div class="flex">
    <div class="w-4/5 border-x border-y-0 border-solid border-black border-opacity-10 px-5 me-5">

        <h1 class="text-3xl text-center font-extrabold">Publicado Recentemente</h1>

        <hr class="border-black border-opacity-10 my-5 mb-7">

        <!-- Recent Posts -->
        <div class="grid grid-cols-3 gap-4">
            @foreach($recentlyPosts as $index => $post)

            @php
            $isDescriptionLong = strlen($post->description) > 100;
            $imageUrl = asset('storage/' . $post->image);
            @endphp

            @if($isDescriptionLong)

            <a href="{{ route('posts.show', ['post' => $post]) }}" class="w-full h-full flex flex-col transition-all bg-white active:bg-violet-100 ring-0 ring-violet-500 active:ring-2 active:ring-offset-2 rounded-md overflow-hidden shadow cursor-pointer col-span-2 row-span-2 relative hover:brightness-90">
                <div class="w-full h-full brightness-50">
                    <img src="{{ $imageUrl }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                </div>

                <div class="w-5/6 h-full justify-between text-white px-5 py-10 absolute">
                    <h1 class="text-4xl font-extrabold">{{ $post->title }}</h1>
                    <p class="text-xl font-extrabold opacity-75">{{ $post->description }}</p>
                </div>
            </a>


            @else

            <div class="w-full h-full flex flex-col transition-all bg-white active:bg-violet-100 ring-0 ring-violet-500 active:ring-2 active:ring-offset-2 rounded-md overflow-hidden shadow cursor-pointer hover:brightness-90">
                <div class="w-full h-44">
                    <img src="{{ $imageUrl }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                </div>

                <div class="w-full p-2">
                    <h1 class="text-lg font-extrabold">{{ $post->title }}</h1>
                    <p class="text-base font-bold opacity-50">{{ $post->description }}</p>
                </div>
            </div>

            @endif
            @endforeach
        </div>
    </div>

    <x-sidebar />
</div>

@endsection

@section('scripts')
<script>
    document.getElementById('createPostBtn').addEventListener('click', () => {
        window.location.href = "{{ route('posts.create') }}";
    });
</script>
@endsection