<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::with('category')->where('user_id', auth()->user()->id)->paginate(10);
        return view('transactions.index', compact('transactions'));
    }

    public function create(Request $request){
        $categories = Category::where('user_id', auth()->user()->id)->where('type', $request->type)->pluck('name', 'id');
        if($request->type == 'income') return view('transactions.incomes.create', compact('categories'));
        if($request->type == 'expense') return view('transactions.expenses.create', compact('categories'));
            
        // $categories = Category::where('user_id', auth()->user()->id)->paginate(10);
    }

    public function show(){
        // $categories = Category::where('user_id', auth()->user()->id)->paginate(10);
        // return view('transactions.incomes.create');
    }


    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'note' => 'required|max:200',
            'category' => 'required|numeric',
            'amount' => 'required',
        ]);

        $transaction = new Transaction();
        $transaction->name = $request->name;
        $transaction->type = $request->type;
        $transaction->note = $request->note;
        $transaction->amount = $request->amount;
        $transaction->user_id = auth()->user()->id;
        $transaction->category_id = $request->category;
        $transaction->save();

        return redirect()->route('transactions.index')->with('success', ucwords($request->type). ' successfully created!');;
    }



    public function edit(Request $request, Transaction $transaction){
        $categories = Category::where('user_id', auth()->user()->id)->where('type', $request->type)->pluck('name', 'id');
        if($request->type == 'income') return view('transactions.incomes.edit', compact('categories', 'transaction'));
        if($request->type == 'expense') return view('transactions.expenses.edit', compact('categories', 'transaction'));
            
        // $categories = Category::where('user_id', auth()->user()->id)->paginate(10);
    }

    public function update(Request $request, Transaction $transaction){
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'note' => 'required|max:200',
            'category' => 'required|numeric',
            'amount' => 'required',
        ]);

        $transaction->name = $request->name;
        $transaction->type = $request->type;
        $transaction->note = $request->note;
        $transaction->user_id = auth()->user()->id;
        $transaction->category_id = $request->category;
        $transaction->save();

        return redirect()->route('transactions.index')->with('success', ucwords($request->type). ' successfully updated!');;
    }
}
