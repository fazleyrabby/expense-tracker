@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="sm:w-2/3 w-full bg-white p-6 rounded-lg">
            @if(session()->has('alert'))
                <x-alert :type='"success"'></x-alert>
            @endif
            <h1 class="font-bold text-2xl text-center">Register</h1>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <x-input :name='"name"' :title='"Your Name"' :id='"name"' :value='old("name")'></x-input>
                <x-input :name='"username"' :title='"Your Username"' :id='"username"' :value='old("username")'></x-input>
                <x-input :name='"email"' :title='"Your Email"' :type='"email"' :id='"email"' :value='old("email")'></x-input>
                <x-input :name='"password"' :title='"Password"' :type='"password"' :id='"password"'></x-input>
                <x-input :name='"password_confirmation"' :title='"Confirm Password"' :type='"password"' :id='"password_confirmation"'></x-input>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
            </form>
        </div>
    </div>
@endsection
