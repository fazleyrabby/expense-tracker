<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $term = request()->search;
        $query = Transaction::query();
        
        $query->when($term !== '', function($q) use ($term){
           return  $q->where('name', 'LIKE', "%{$term}%");
        });

        $transactions = $query->with('category')->where('user_id', auth()->user()->id)
        ->latest()
        ->paginate(10)
        ->appends(['search' => $term]);

        return view('transactions.index', compact('transactions'));
    }

    public function create(Request $request){
        $categories = Category::where('user_id', auth()->user()->id)->where('type', $request->type)->pluck('name', 'id');
        // if($request->type == 'income') return view('transactions.incomes.create', compact('categories'));
        // if($request->type == 'expense') return view('transactions.expenses.create', compact('categories'));
            
        if($request->type == 'income' || $request->type == 'expense'){
            return view('transactions.create', compact('categories'));
        }
        
        abort('403');
        // $categories = Category::where('user_id', auth()->user()->id)->paginate(10);
    }

    public function show(){
        // $categories = Category::where('user_id', auth()->user()->id)->paginate(10);
        // return view('transactions.incomes.create');
    }


    public function store(Request $request, $type='store', $transaction=''){
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'note' => 'required|max:200',
            'category' => 'required|numeric',
            'amount' => 'required',
        ]);

        if($type == 'store'){
            $transaction = new Transaction();
            $message = ucwords($request->type). ' successfully created!' ;
        }else{
            $message = ucwords($request->type). ' successfully updated!' ;
        }

        $transaction->name = $request->name;
        $transaction->type = $request->type;
        $transaction->note = $request->note;
        $transaction->amount = $request->amount;
        $transaction->user_id = auth()->user()->id;
        $transaction->category_id = $request->category;

        // if($request->amount > wallet('wallet') && $request->type == 'expense'){
        //     return redirect()->back()->with('error', 'Not enough money on wallet!');
        // }

        $transaction->save();

        return redirect()->route('transactions.index')->with('success', $message);
    }



    public function edit(Request $request, Transaction $transaction){
        $categories = Category::where('user_id', auth()->user()->id)->where('type', $transaction->type)->pluck('name', 'id');
        // if($transaction->type == 'income') return view('transactions.incomes.edit', compact('categories', 'transaction'));
        // if($transaction->type == 'expense') return view('transactions.expenses.edit', compact('categories', 'transaction'));
            
        if($transaction->type == 'income' || $transaction->type == 'expense'){
            return view('transactions.edit', compact('categories', 'transaction'));
        }

        abort('403');
        // $categories = Category::where('user_id', auth()->user()->id)->paginate(10);
    }

    public function update(Request $request, Transaction $transaction){
        return $this->store($request, 'update', $transaction);
    }

    public function destroy(Transaction $transaction){
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction successfully deleted!');;
    }

    public function walletCheck(){
        return $this->updateWallet();
    }

    private function updateWallet(){
        $user = User::find(auth()->user()->id);
        if($user->wallet < 0){
            return false;
        }
        $user->wallet = wallet('wallet');
        $user->save();
        return true;
    }
}
