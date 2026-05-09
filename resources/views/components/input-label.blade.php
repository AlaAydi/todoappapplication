@props(['value', 'for' => null])

<label
    @if($for) for="{{ $for }}" @endif
    {{ $attributes->merge(['class' => 'block font-semibold text-sm text-slate-300 mb-2']) }}
>
    {{ $value ?? $slot }}
</label>
