<header class="bg-slate-900 text-white">
    <nav class="p-6 flex flex-col justify-between mb-4 sm:flex-row lg:w-[80vw] md:w-[70vw] mx-auto">
        <ul class="md:flex md:flex-row items-center">
            <li><a @class(['text-slate-400' => request()->is('/'),'md:p-3']) href="{{ route('home') }}">Home</a></li>
            {{-- <li><a class="p-3" href="">Categories</a></li> --}}
            <li><a @class(['text-slate-400'=> request()->is('dashboard'),'md:p-3']) href="{{ route('dashboard') }}">Dashboard</a></li>
            {{-- {{-- <li><a class="p-3" href="">Budget</a></li> --}}
            {{-- <li><a class="p-3" href="">Transactions</a></li>  --}}
        </ul>
        <span class="font-bold hidden sm:flex">Expense Tracker</span>
        <div class="border-b-2 border-b-blue-100 sm:hidden"></div>
        <ul class="md:flex md:flex-row items-center">
            @auth
                <li><a class="md:p-3" href="{{ route('dashboard') }}">{{  auth()->user()->username }}</a></li>
                <li><a class="md:p-3 " href="{{ route('logout') }}">Logout</a></li>
            @endauth
            @guest
                <li><a class="md:p-3" href="{{ route('login') }}">Login</a></li>
                <li><a class="md:p-3" href="{{ route('register') }}">Register</a></li>
            @endguest
        </ul>
    </nav>
</header>
