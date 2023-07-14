<?php

use Carbon\Carbon;

function options($type)
{
    $categories = [
        'income' => 'Income',
        'expense' => 'Expense',
        'both' => 'Both'
    ];

    $currency = auth()->user()->currency ?? 'BDT';

    $months = months();

    return $$type ?? false;
}


function months()
{
    // $period = now()->subMonths(12)->monthsUntil(now());
    return [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    ];
}
