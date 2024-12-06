<!DOCTYPE html>
<html>
<head>
    <title>Transactions</title>
</head>
<body>
<h1>Transactions</h1>

<button onclick="window.location='{{ route("transactions.create") }}'">Add New Transaction</button>

<table>
    <thead>
    <tr>
        <th>Employee Name</th>
        <th>Sender Name</th>
        <th>Receiver Name</th>
        <th>Sender Account</th>
        <th>Receiver Account</th>
        <th>Amount</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($transactions as $transaction)
        <tr>
            <td>{{ $transaction->employee_name }}</td>
            <td>{{ $transaction->sender_name }}</td>
            <td>{{ $transaction->receiver_name }}</td>
            <td>{{ $transaction->sender_account }}</td>
            <td>{{ $transaction->receiver_account }}</td>
            <td>{{ $transaction->amount }}</td>
            <td>
                <a href="{{ route('transactions.edit', $transaction->id) }}">Update</a>
                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<p>Total Transactions: {{ $totalTransactions }}</p>
<p>Total Amount: {{ $totalAmount }}</p>
</body>
</html>
