@extends('layouts.main')

@section('content')
<div class="flex justify-between mb-3">
    <h1 class="text-sm text-slate-300">Transactions</h1>
    {{-- <a href="{{ route('categories.create') }}" class="text-sm bg-blue-800 text-white rounded px-3 py-1">Create</a> --}}
</div>

<x-alert></x-alert>

<table class="w-full text-sm text-left text-gray-500 rounded-lg mb-3">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
        <tr>
            <th scope="col" class="px-6 py-3">
                ID
            </th>
            <th scope="col" class="px-6 py-3">
                Name
            </th>
            <th scope="col" class="px-6 py-3">
                Type
            </th>
            <th scope="col" class="px-6 py-3">
                Category
            </th>
            <th scope="col" class="px-6 py-3">
                Created At
            </th>
            {{-- <th scope="col" class="px-6 py-3">
                Actions
            </th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $transaction)
        <tr class="bg-white border-b ">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                {{ $transaction->id }}
            </th>
            <td class="px-6 py-4">
                {{ $transaction->name }}
            </td>
            <td class="px-6 py-4">
                {{ ucwords($transaction->type) }}
            </td>
            <td class="px-6 py-4">
                {{ $transaction->category?->name }}
            </td>
            <td class="px-6 py-4">
                {{ Carbon\Carbon::parse($transaction->created_at)->isoFormat('LLL') }}
            </td>
            {{-- <td class="px-6 py-4 w-4">
                <div class="flex justify-between">
                    <x-edit-btn :route="route('categories.edit', $category->id)"></x-edit-btn>
                    <x-delete-btn :route="route('categories.destroy', $category->id)"></x-delete-btn>
                </div>
            </td> --}}
        </tr>
       
        @endforeach
        
    </tbody>
</table>


<div>
    {{ $transactions->links() }} 
</div>

@endsection
