@props(['disabled' => false])

<button {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge(['class' => 'bg-violet-700 text-lg font-bold text-white shadow p-2 rounded focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 hover:opacity-90 active:opacity-100 active:brightness-75 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>