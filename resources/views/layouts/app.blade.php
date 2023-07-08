<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Expense Tracker</title>
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-4">
            <ul class="flex items-center">
                <li><a class="p-3" href="">Home</a></li>
                {{-- <li><a class="p-3" href="">Categories</a></li> --}}
                <li><a class="p-3" href="">Dashboard</a></li>
                {{-- {{-- <li><a class="p-3" href="">Budget</a></li> --}}
                {{-- <li><a class="p-3" href="">Transactions</a></li>  --}}
            </ul>

            <ul class="flex items-center">
                <li><a class="p-3" href="">{{ auth()->user()->username }}</a></li>
                <li><a class="p-3" href="">Login</a></li>
                <li><a class="p-3" href="{{ route('register') }}">Register</a></li>
                <li><a class="p-3" href="">Logout</a></li>
            </ul>
    </nav>
    <div class="px-2">
        @yield('content')
    </div>
</body>
</html>