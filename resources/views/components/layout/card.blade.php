<div {{ $attributes->merge(['class' => 'bg-smoke-300 w-full shadow-md rounded-lg overflow-hidden mx-auto']) }}>
    <div class="py-4 px-8 mt-3">
        {{ $slot }}
    </div>
</div>
