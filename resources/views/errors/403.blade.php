<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Expense Tracker</title>
</head>
<body class="bg-gray-200 h-screen">
    <div class="w-full h-screen bg-white flex justify-center items-center">
        <div class="h-full">
            <section class="bg-white ">
                <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                    <div class="mx-auto text-center">
                        <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600">403</h1>
                        <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl ">Something's missing.</p>
                        <p class="mb-4 text-lg font-light text-gray-500 ">Sorry, we can't find that page. You'll find lots to explore on the home page. </p>
                        <a href="{{ route('home') }}" class="p-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg  hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">Back to Homepage</a>
                    </div>   
                </div>
            </section>
        </div>
    </div>
</body>
</html>

