@props(['disabled' => false])

<button {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge(['class' => 'text-lg font-bold bg-violet-800 text-white p-2 rounded focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>