<x-app-layout padding='false'>
    <x-slot name="slot">
        <div class="flex">
            <aside class="w-1/4 bg-white flex flex-col py-5">
                <a href="{{ route('profile.edit', ['tab' => 'info']) }}"
                    class="p-4 text-start font-bold border-b bg-white hover:brightness-95 active:brightness-90 transition-all">{{ __('Profile Information') }}</a>

                <a href="{{ route('profile.edit', ['tab' => 'posts']) }}"
                    class="p-4 text-start font-bold border-b bg-white hover:brightness-95 active:brightness-90 transition-all">{{ __('Posts') }}</a>
            </aside>

            <div class="w-3/4 bg-white">
                <div class="h-[calc(100dvh-85px)] mb-5 bg-gray-50 rounded-s-3xl border overflow-y-scroll p-5">
                    @if(!isset($tab) || $tab === 'info')
                    @include('profile.partials.info')

                    @elseif($tab === 'posts')
                    @include('profile.partials.posts')

                    @endif
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>