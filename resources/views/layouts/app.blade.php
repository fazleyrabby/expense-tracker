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
    @include('partials.nav')
    <div class="px-4 w-full lg:w-[80vw] md:w-[70vw] mx-auto">
        @yield('content')
    </div>
</body>
</html>