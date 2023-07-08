@props(['id' => null, 'name', 'title', 'type' => 'text'])

<div class="mb-4">
    <label for="{{ $id }}" class="block mb-2">{{ $title }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" placeholder="Your {{ $title }}" class="bg-gray-100 border-2 w-full p-2 rounded-lg" value="">
    @if($errors->has($name))
        <div class="text-red-500 text-sm mt-1">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>