@extends('layouts.app')

@section('content')

<p class="text-3xl font-light text-center">Desperte sua <span class="text-violet-700 font-bold">criatividade</span>
    aqui!
</p>

<hr class="my-4 w-4/6 mx-auto border-black border-opacity-15">

<form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="flex flex-col">
    @csrf

    <input type="text" id="title" name="title" placeholder="Crie um título para sua publicação..."
        class="w-full md:w-2/4 mx-auto bg-transparent text-xl border-0 border-b-2 focus:ring-0 text-center"
        autocapitalize="words">

    @error('title')
    <p class="text-red-500 text-center text-sm">{{ $message }}</p>
    @enderror
    <!-- ------ -->

    <div class="flex mt-4">
        <div class="w-3/4">
            <x-forms.tinymce-editor id="content" name="content" required />

            @error('content')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="w-1/4 px-5 flex flex-col justify-between mx-auto gap-5">
            <div class="flex flex-col gap-2">

                <!-- Banner -->
                <div class="imageInputContainer rounded-md shadow border-black border-opacity-15">
                    <label for="image"
                        class="flex flex-col items-center justify-center w-full bg-white text-violet-500 rounded-lg shadow-md cursor-pointer hover:bg-violet-50 active:bg-violet-100 transition-all">

                        <!-- Preview -->
                        <div class="previewContainer bg-stone-200 w-full h-40 relative overflow-hidden">
                            <img src="{{ asset('icons/photo.svg') }}"
                                class="w-16 opacity-30 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"
                                alt="" id="photoSvg">

                            <img src="" id="imagePreview" class="object-cover w-full h-full" style="display: none;">
                        </div>

                        <!-- Input -->
                        <div class="flex p-4 items-center font-bold">
                            <img src="{{ asset('icons/plus.svg') }}" class="w-10" alt="">
                            Escolher banner

                            <input type="file" name="image" id="image" class="hidden" accept=".jpg, .jpeg, .png" />
                        </div>

                    </label>

                </div>

                @error('image')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
                <!-- ------ -->

                <!-- Description -->
                <textarea name="description" id="description" cols="30" rows="5"
                    placeholder="Descreva a ideia da sua publicação..."
                    class="rounded-md shadow border-black border-opacity-15"></textarea>

                @error('description')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
                <!-- ------------ -->
            </div>
            <!-- ------- -->
            <div class="flex flex-col gap-2">
                <x-primary-button type="submit" class="w-full">
                    Publicar
                </x-primary-button>

                <button onclick="javascript: window.history.back()" id="cancelBtn" type="button" class=" text-lg bg-stone-900 font-bold bg-red-70000 text-white p-2 rounded focus:ring-2 focus:ring-red-500 focus:ring-offset-2
        transition ease-in-out duration-150">Cancel</button>
            </div>
        </div>
    </div>

</form>
@endsection

@section('scripts')
<script>
document.getElementById('image').addEventListener('change', previewImage);

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
@endsection