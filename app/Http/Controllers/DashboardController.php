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
        $data['income'] = Transaction::where([
            ['type', 'income'],
            ['user_id', auth()->user()->id],
        ])->whereMonth('created_at', Carbon::now()->month)->sum('amount');
        $data['expense'] = Transaction::where([
            ['type', 'expense'],
            ['user_id', auth()->user()->id],
        ])->whereMonth('created_at', Carbon::now()->month)->sum('amount');
        $data['wallet'] = $data['income'] - $data['expense'];

        $caseIncome = DB::raw('SUM(CASE WHEN type="income" THEN amount ELSE 0 END) as income');
        $caseExpense = DB::raw('SUM(CASE WHEN type="expense" THEN amount ELSE 0 END) as expense');

        $analyticsMonthlyCurrentYear = Transaction::query()
        ->select(DB::raw('YEAR(created_at) as year'), DB::raw('DATE_FORMAT(created_at, "%M") as month'), $caseIncome, $caseExpense)
        ->whereYear('created_at', date('Y'))
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
                }else{
                    return [
                        'month' => $month,
                        'income' => null,
                        'expense' => null,
                    ];
                }
            }
        }, options('months') ?? []);

        return view('dashboard', compact('data', 'analytics'));
    }
}
