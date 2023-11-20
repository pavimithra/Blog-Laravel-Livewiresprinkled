@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 text-sm focus:border-gray-400 focus:ring-0 rounded-md shadow-sm text-gray-700 ']) !!}>
