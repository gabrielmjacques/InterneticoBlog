<x-app-layout>
    <x-slot name="slot">
        <p class="text-2xl md:text-4xl font-light text-center">{{ __('Awaken your') }} <span
                class="text-violet-700 font-bold">{{ __('creativity') }}</span>
            {{ __('here') }}!
        </p>

        <hr class="my-4 w-4/6 mx-auto border-black border-opacity-15">

        <!-- Check if the post is being edited -->
        @if(isset($post))
        <form method="post" action="{{ route('posts.update', ['post' => $post]) }}" enctype="multipart/form-data"
            class="flex flex-col">
            @method('PUT')

            @else
            <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="flex flex-col">
                @endif
                @csrf

                <input type="text" id="title" name="title" placeholder="{{ __('Create a title for your post...') }}"
                    class="w-full md:w-3/5 mx-auto bg-transparent text-xl border-0 border-b-2 focus:ring-0 text-center"
                    autocapitalize="words" value="{{ isset($post) ? $post->title : '' }}">

                @error('title')
                <p class="text-red-500 text-center text-sm">{{ $message }}</p>
                @enderror
                <!-- ------ -->

                <div class="flex flex-col md:flex-row mt-5">
                    <div class="w-full md:w-3/4 shadow-md mb-4 md:me-2">
                        <x-forms.tinymce-editor id="content" name="content" required>
                            {{ isset($post) ? $post->content : '' }}
                        </x-forms.tinymce-editor>

                        @error('content')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full md:w-1/4 flex flex-col justify-between mx-auto gap-5">
                        <div class="flex flex-col gap-2">

                            <!-- Banner -->
                            <div
                                class="rounded-md shadow-md border-black border-opacity-15 group hover:opacity-80 active:scale-95 transition-all">
                                <label for="image"
                                    class="flex flex-col items-center justify-center w-full bg-white text-violet-500 rounded-lg shadow-md cursor-pointer">

                                    <!-- Preview -->
                                    <div class="previewContainer bg-stone-200 w-full h-40 relative overflow-hidden">
                                        <img src="{{ asset('icons/photo.svg') }}"
                                            class="w-16 opacity-30 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"
                                            alt="" id="photoSvg" style="{{ !isset($post) ? '' : 'display: none;' }}">

                                        <img src="{{ isset($post) ? asset('storage/' . $post->image) : '' }}"
                                            id="imagePreview" class="object-cover w-full h-full"
                                            style="{{ isset($post) ? '' : 'display: none;' }}">
                                    </div>

                                    <!-- Input -->
                                    <div class="flex p-4 items-center font-bold">
                                        <img src="{{ asset('icons/plus.svg') }}" class="w-10" alt="">
                                        {{ __('Add a banner') }}

                                        <input type="file" name="image" id="image" class="hidden"
                                            accept=".jpg, .jpeg, .png" />
                                    </div>

                                </label>

                            </div>

                            @error('image')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                            <!-- ------ -->

                            <!-- Description -->
                            <textarea name="description" id="description" cols="30" rows="5"
                                placeholder="{{ __('Write a short description...') }}"
                                class="rounded-md shadow-md border-black border-opacity-15">{{ $post->description ?? ''}}</textarea>

                            @error('description')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                            <!-- ------------ -->

                        </div>

                        <div class="flex-col gap-2">
                            <x-primary-button type="submit" class="w-full mb-2">
                                {{ __('Publish') }}
                            </x-primary-button>

                            <x-secondary-button onclick="javascript: window.history.back()" id="cancelBtn" type="button"
                                class="w-full text-lg text-white p-2 rounded focus:ring-2 focus:ring-red-500 focus:ring-offset-2
                                transition ease-in-out duration-150">{{ __('Cancel') }}</x-secondary-button>
                        </div>
                    </div>
                </div>

            </form>
    </x-slot>
</x-app-layout>

<script>
document.getElementById('image').addEventListener('change', previewImage);
const imagePreview = document.getElementById('imagePreview');
const photoSvg = document.getElementById('photoSvg');

function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const preview = document.getElementById('imagePreview');
        preview.src = reader.result;
        preview.style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);

    document.getElementById('photoSvg').style.display = 'none';
}
</script>