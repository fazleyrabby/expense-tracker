<div class="flex bg-slate-900 text-white md:w-1/4 py-6 px-4 overflow-y-auto rounded-md">
    <ul class="flex flex-col gap-4">
        <li><a href="{{ route('categories.index') }}" @class(['text-slate-400' => request()->is('categories*'),'hover:text-blue-300'])>Categories</a></li>
        <li><a href="{{ route('transactions.create') }}?type=expense" @class(['text-slate-400' => request()->is('expense*'),'hover:text-blue-300'])>Expense</a></li>
        <li><a href="{{ route('transactions.create') }}?type=income" @class(['text-slate-400' => request()->is('income*'),'hover:text-blue-300'])>Income</a></li>
        <li><a href="{{ route('transactions.index') }}" @class(['text-slate-400' => request()->is('transaction*'),'hover:text-blue-300'])>Transactions</a></li>
    </ul>
</div>