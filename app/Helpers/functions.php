<?php

use App\Models\Transaction;
use Carbon\Carbon;

function wallet($type){
    $data['income'] = Transaction::where([
        ['type', 'income'],
        ['user_id', auth()->user()->id],
    ])->whereMonth('created_at', Carbon::now()->month)->sum('amount');
    $data['expense'] = Transaction::where([
        ['type', 'expense'],
        ['user_id', auth()->user()->id],
    ])->whereMonth('created_at', Carbon::now()->month)->sum('amount');
    $data['wallet'] = $data['income'] - $data['expense'];
    return $data[$type];
}