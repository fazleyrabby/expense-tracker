<?php

use App\Models\Transaction;
use Carbon\Carbon;

function wallet($type){
    $result = match ($type) {
        'income' => Transaction::income()->currentMonth()->calculate(),
        'expense' => Transaction::expense()->currentMonth()->calculate(),
        'wallet' => Transaction::income()->calculate() - Transaction::expense()->calculate(),
        'incomeTotal' => Transaction::income()->calculate(),
        'expenseTotal' => Transaction::expense()->calculate(),
        'avgExpenseMonthly' => (Transaction::expense()->currentYear()->calculate()) / monthsPassed(),
        'avgIncomeMonthly' => (Transaction::income()->currentYear()->calculate()) / monthsPassed(),
    };
    return $result;
}

function monthsPassed(){
    return Carbon::now()->month;
}