<x-app-layout padding='false'>
    <x-slot name="slot">
        <div class="flex flex-col md:flex-row">
            <aside class="hidden md:flex md:flex-col w-1/4 bg-white py-5">
                <a href="{{ route('profile.edit', ['tab' => 'info']) }}"
                    class="p-4 text-start font-bold border-b bg-white hover:brightness-95 active:brightness-90 transition-all @if($tab == 'info' || !$tab) brightness-95 border-violet-700 @endif">{{ __('Profile Information') }}</a>

                <a href="{{ route('profile.edit', ['tab' => 'posts']) }}"
                    class="p-4 text-start font-bold border-b bg-white hover:brightness-95 active:brightness-90 transition-all @if($tab == 'posts') brightness-95 border-violet-700 @endif">{{ __('Posts') }}</a>
            </aside>

            <menu class="md:hidden px-5 mb-2">
                <select name="tab" id="tab" class="w-full p-2 border rounded-md"
                    onchange="window.location.href = this.value">
                    <option value="{{ route('profile.edit', ['tab' => 'info']) }}" @if(!isset($tab) || $tab==='info' )
                        selected @endif>{{ __('Profile Information') }}</option>
                    <option value="{{ route('profile.edit', ['tab' => 'posts']) }}" @if($tab==='posts' ) selected
                        @endif>{{ __('Posts') }}</option>
                </select>
            </menu>

            <div class="w-full md:w-3/4 bg-white">
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