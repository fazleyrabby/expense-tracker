@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full md:w-4/12 bg-white p-6 rounded-lg">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <x-input :name='"name"' :title='"Name"' :id='"name"'></x-input>
                <x-input :name='"username"' :title='"Username"' :id='"username"'></x-input>
                <x-input :name='"email"' :title='"Email"' :type='"email"' :id='"email"'></x-input>
                <x-input :name='"password"' :title='"Password"' :type='"password"' :id='"password"'></x-input>
                <x-input :name='"password_confirmation"' :title='"Repeat Password"' :type='"password"' :id='"password_confirmation"'></x-input>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
            </form>
        </div>
    </div>
@endsection
