@extends('layouts.main')

@section('content')
<div class="flex justify-between">
    <h1 class="text-sm text-slate-300">Expense Create</h1>
    <a href="{{ route('transactions.index') }}" class="text-sm bg-blue-800 text-white rounded px-3 py-1">Transactions</a>
</div>

<form action="{{ route('transactions.store') }}" method="post">
    @csrf
    <x-input :name='"name"' :title='"Name"' :type='"text"' :id='"name"' :value='old("name")'></x-input>
    <x-input :name='"type"' :type='"hidden"' :value='"expense"'></x-input>
    <x-input :name='"amount"' :title='"Amount"' :type='"text"' :id='"amount"' :value='old("amount")'></x-input>
    <x-input :name='"note"' :title='"Note"' :type='"text"' :id='"note"' :value='old("note")'></x-input>
    <x-select :name='"category"' :title='"Category"' :id='"category"' :value='old("category")' :options='$categories'></x-select>
    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium ">Submit</button>
</form>

@endsection
