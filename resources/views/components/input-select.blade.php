@props(['values'])


<select {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    <option disabled selected value> -- Selecciona un pais -- </option>
    @foreach ($values as $value)
    <option value="{{ $value }}">{{ $value }}</option>
    @endforeach
</select>
