<?php
namespace App\Repositories;

use App\Models\Transaction;
use App\Repositories\ITransactionRepository;

class TransactionRepository extends ITransactionRepository
{

    function getAll()
    {
        return Transaction::all();
    }

    function getById(int $id)
    {
        return Transaction::findOrFail($id);
    }

    function create(array $transaction)
    {
        return Transaction::create($transaction);
    }

    function update(int $id, array $transaction)
    {
        return Transaction::whereId($id)->update($transaction);
    }

    function delete(int $id)
    {
        return Transaction::destroy($id);
    }

    function sum()
    {
        return Transaction::sum('amount');
    }

    function count()
    {
        return Transaction::count();
    }
}
