<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $data['income'] = wallet('income');
        $data['expense'] = wallet('expense');
        $data['wallet'] = wallet('wallet');

        $caseIncome = DB::raw('SUM(CASE WHEN type="income" THEN amount ELSE 0 END) as income');
        $caseExpense = DB::raw('SUM(CASE WHEN type="expense" THEN amount ELSE 0 END) as expense');

        $analyticsMonthlyCurrentYear = Transaction::query()
        ->select(DB::raw('YEAR(created_at) as year'), DB::raw('DATE_FORMAT(created_at, "%M") as month'), $caseIncome, $caseExpense)
        ->whereYear('created_at', date('Y'))
        ->orderBy('month')
        ->groupBy('month','year')
        ->get();
    
        $analytics =  array_map(function($month) use ($analyticsMonthlyCurrentYear){
            foreach ($analyticsMonthlyCurrentYear as $analytics){
                if($month == $analytics['month']){
                    return [
                        'month' =>  $analytics['month'],
                        'income' => $analytics['income'],
                        'expense' => $analytics['expense'],
                    ];
                }
            }
            return [
                'month' => $month,
                'income' => null,
                'expense' => null,
            ];
        }, options('months') ?? []);

        return view('dashboard', compact('data', 'analytics'));
    }
}
