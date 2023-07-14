@extends('layouts.main')

@section('content')
<div class="flex justify-between">
    <h1 class="text-sm text-slate-300">Income Create</h1>
    <a href="{{ route('transactions.index') }}" class="text-sm bg-blue-800 text-white rounded px-3 py-1">Transactions</a>
</div>

<form action="{{ route('transactions.update', $transaction->id) }}" method="post">
    @csrf
    @method('put')
    <x-input :name='"name"' :title='"Name"' :type='"text"' :id='"name"' :value='$transaction->name'></x-input>
    <x-input :name='"type"' :type='"hidden"' :value='$transaction->type'></x-input>
    <x-input :name='"amount"' :title='"Amount"' :type='"text"' :id='"amount"' :value='$transaction->amount'></x-input>
    <x-input :name='"note"' :title='"Note"' :type='"text"' :id='"note"' :value='$transaction->note'></x-input>
    <x-select :name='"category"' :title='"Category"' :id='"category"' :value='$transaction->category_id' :options='$categories'></x-select>
    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium ">Submit</button>
</form>

@endsection
