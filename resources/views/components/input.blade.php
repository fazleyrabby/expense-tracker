@props(['id' => null, 'name', 'title' => '', 'type' => 'text', 'value' => ''])

<div class="mb-4">
    <label for="{{ $id }}" class="block mb-2">{{ $title }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" placeholder="{{ $title }}" class="border-2 w-full p-2 rounded-lg @error($name) border-red-500 @enderror" value="{{ $value }}">
    @error($name)
        <div class="text-red-500 text-sm mt-1">
            {{ $message }}
        </div>
    @enderror
</div>