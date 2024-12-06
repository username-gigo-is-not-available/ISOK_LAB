<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Show all transactions
    public function index()
    {
        $transactions = Transaction::all();
        $totalTransactions = Transaction::count();
        $totalAmount = Transaction::sum('amount');

        return view('transactions.index', compact('transactions', 'totalTransactions', 'totalAmount'));
    }

    // Show form for creating a new transaction
    public function create()
    {
        return view('transactions.create');
    }

    // Store a new transaction
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_name' => 'required|string',
            'sender_name' => 'required|string',
            'receiver_name' => 'required|string',
            'sender_account' => 'required|string',
            'receiver_account' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        Transaction::create($validatedData);

        return redirect()->route('transactions.index');
    }

    // Show form for editing a transaction
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transactions.edit', compact('transaction'));
    }

    // Update a transaction
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'employee_name' => 'required|string',
            'sender_name' => 'required|string',
            'receiver_name' => 'required|string',
            'sender_account' => 'required|string',
            'receiver_account' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->update($validatedData);

        return redirect()->route('transactions.index');
    }

    // Delete a transaction
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transactions.index');
    }
}
