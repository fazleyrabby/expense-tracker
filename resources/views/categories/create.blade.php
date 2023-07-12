@extends('layouts.main')

@section('content')
<div class="flex justify-between">
    <h1 class="text-sm text-slate-300">Category Create</h1>
    <a href="{{ route('categories.index') }}" class="text-sm bg-blue-800 text-white rounded px-3 py-1">Categories</a>
</div>

<form action="{{ route('categories.store') }}" method="post">
    @csrf
    <x-input :name='"name"' :title='"Category Name"' :type='"name"' :id='"name"' :value='old("name")'></x-input>
    <x-select :name='"type"' :title='"Category Type"' :type='"type"' :id='"type"' :value='old("type")' :options='categoryTypes()'></x-select>
    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium ">Submit</button>
</form>



@endsection
