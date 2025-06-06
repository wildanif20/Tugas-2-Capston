@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-red-700 dark:text-red-300']) }}>
    {{ $value ?? $slot }}
</label>
