

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
        {{-- @yield('content') --}}
        <main class="flex justify-center min-h-[50vh]">
            <div class="flex flex-1 flex-col md:flex-row overflow-hidden gap-4">
                <!-- sidebar -->
                @include('partials.sidebar')
                <div class="flex flex-col overflow-y-auto w-full bg-white p-6 rounded-md">
                    <!-- breadcrumbs -->
                    <x-breadcrumbs></x-breadcrumbs>
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>