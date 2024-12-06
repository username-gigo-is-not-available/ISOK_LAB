<?php

namespace App\Repositories;
abstract class ITransactionRepository
{
    abstract function getAll();
    abstract function getById(int $id);

    abstract function create(array $transaction);

    abstract function update(int $id, array $transaction);

    abstract function delete(int $id);

    abstract function sum();

    abstract function count();





}

