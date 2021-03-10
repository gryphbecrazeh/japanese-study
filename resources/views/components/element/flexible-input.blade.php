<div class="flexible-input-container" data-controller="flexible">
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea
        {{ $attributes->merge(['class' => 'hidden consolidated-input', 'cols' => '30', 'rows' => '10']) }}>{{ $slot }}</textarea>
</div>
