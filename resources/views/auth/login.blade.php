@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full bg-white p-6 rounded-lg">
            <h1 class="font-bold text-2xl text-center">Login</h1>
            @if(session()->has('status'))
                <div class="bg-green-200 text-red-700 text-sm p-4 mb-2 border rounded-lg">
                    {{ session()->get('status') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <x-input :name='"email"' :title='"Your Email"' :type='"email"' :id='"email"' :value='old("email")'></x-input>
                <x-input :name='"password"' :title='"Password"' :type='"password"' :id='"password"'></x-input>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Login</button>
            </form>
        </div>
    </div>
@endsection
