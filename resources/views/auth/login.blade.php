@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="sm:w-2/3 w-full bg-white p-6 rounded-lg">
            <h1 class="font-bold text-2xl text-center">Login</h1>
            <x-alert></x-alert>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <x-input :name='"email"' :title='"Your Email"' :type='"email"' :id='"email"' :value='"test@gmail.com"'></x-input>
                <x-input :name='"password"' :title='"Password"' :type='"password"' :id='"password"' :value='"123456"'></x-input>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Login</button>
            </form>
        </div>
    </div>
@endsection
