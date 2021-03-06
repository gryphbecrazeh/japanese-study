<li {{ $attributes->merge(['class' => '']) }}>
    {{-- hover:border-blue-500 rounded hover border-2 w-full mb-2 --}}
    <a href="{{ $href }}"
        class="p-3 text-blue-gray-100 hover:text-blue-700 font-bold whitespace-nowrap">{{ $label }}</a>
</li>
