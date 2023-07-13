@props(['id' => null, 'name', 'title', 'type' => 'text', 'value' => '', 'options' => []])

<div class="mb-4">
    <label for="{{ $id }}" class="block mb-2">{{ $title }}</label>
    {{-- <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" placeholder="{{ $title }}" class="bg-gray-100 border-2 w-full p-2 rounded-lg @error($name) border-red-500 @enderror" value="{{ $value }}"> --}}
    <select name="{{ $name }}" class="border-2 w-full p-2 rounded-lg @error($name) border-red-500 @enderror">
        <option>- Select Option -</option>
        @foreach ($options as $key => $option)
            <option value="{{ $key }}"
            @selected($value == $key)
            >{{ $option }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="text-red-500 text-sm mt-1">
            {{ $message }}
        </div>
    @enderror
</div>