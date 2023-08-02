<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeIncome($query){
        return $query->where([
            ['type', 'income'],
            ['user_id', auth()->user()->id],
        ]);
    }

    public function scopeExpense($query){
        return $query->where([
            ['type', 'expense'],
            ['user_id', auth()->user()->id],
        ]);
    }

    public function scopeCurrentMonth($query){
        return $query->whereMonth('created_at', Carbon::now()->month);
    }

    public function scopeCalculate($query){
        return $query->sum('amount');
    }

    public function scopeCurrentyear($query){
        return $query->whereYear('created_at', Carbon::now()->year);
    }

}
