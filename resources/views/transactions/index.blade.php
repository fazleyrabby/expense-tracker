@extends('layouts.main')

@section('content')
<div class="flex justify-between mb-3">
    <h1 class="text-sm text-slate-300">Transactions</h1>
    {{-- <a href="{{ route('categories.create') }}" class="text-sm bg-blue-800 text-white rounded px-3 py-1">Create</a> --}}
    <span class="relative">
        <form action="{{ route('transactions.index') }}" method="get">
            {{-- @csrf --}}
            <input class="px-3 py-2 text-sm w-64 text-gray-900 border rounded-sm" type="text" name="search" placeholder="Search term..."/>
            <button type="submit" class="px-2 py-1 rounded-sm text-white absolute right-1 top-1 bg-blue-700 hover:bg-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
                
            </button>
        </form>
    </span>
</div>

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
                Amount
            </th>
            <th scope="col" class="px-6 py-3">
                Category
            </th>
            <th scope="col" class="px-6 py-3">
                Created At
            </th>
            <th scope="col" class="px-6 py-3">
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($transactions as $transaction)
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
                {{ $transaction->amount }}
            </td>
            <td class="px-6 py-4">
                {{ $transaction->category?->name }}
            </td>
            <td class="px-6 py-4">
                {{ Carbon\Carbon::parse($transaction->created_at)->isoFormat('LLL') }}
            </td>
            <td class="px-6 py-4 w-4">
                <div class="flex justify-between">
                    <x-edit-btn :route="route('transactions.edit', $transaction->id)"></x-edit-btn>
                    <x-delete-btn :route="route('transactions.destroy', $transaction->id)"></x-delete-btn>
                </div>
            </td>
        </tr>
        @empty
            <tr>
                <td class="text-center p-4" colspan="7">No data found!</td>
            </tr>
        @endforelse
        
    </tbody>
</table>


<div>
    {{ $transactions->links() }} 
</div>

@endsection
