<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Repositories\ITransactionRepository;

class TransactionController extends Controller
{

    private ITransactionRepository $repository;


    // Show all transactions

    /**
     * @param ITransactionRepository $repository
     */
    public function __construct(ITransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $transactions = $this->repository->getAll();
        $totalTransactions = $this->repository->count();
        $totalAmount = $this->repository->sum();

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

        $this->repository->create($validatedData);

        return redirect()->route('transactions.index');
    }

    // Show form for editing a transaction
    public function edit($id)
    {
        $transaction = $this->repository->getById($id);
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

        $this->repository->update($id, $validatedData);

        return redirect()->route('transactions.index');
    }

    // Delete a transaction
    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()->route('transactions.index');
    }
}
