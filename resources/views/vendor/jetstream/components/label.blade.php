@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-black']) }}>
    <b>{{ $value ?? $slot }}</b>
</label>
