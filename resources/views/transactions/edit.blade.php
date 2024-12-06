<!DOCTYPE html>
<html>
<head>
    <title>Edit Transaction</title>
</head>
<body>
<h1>Edit Transaction</h1>

<form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Employee Name</label>
    <input type="text" name="employee_name" value="{{ $transaction->employee_name }}" required><br>

    <label>Sender Name</label>
    <input type="text" name="sender_name" value="{{ $transaction->sender_name }}" required><br>

    <label>Receiver Name</label>
    <input type="text" name="receiver_name" value="{{ $transaction->receiver_name }}" required><br>

    <label>Sender Account</label>
    <input type="text" name="sender_account" value="{{ $transaction->sender_account }}" required><br>

    <label>Receiver Account</label>
    <input type="text" name="receiver_account" value="{{ $transaction->receiver_account }}" required><br>

    <label>Amount</label>
    <input type="number" name="amount" value="{{ $transaction->amount }}" step="0.01" required><br>

    <button type="submit">Update Transaction</button>
</form>
</body>
</html>
