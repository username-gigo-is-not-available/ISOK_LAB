<!DOCTYPE html>
<html>
<head>
    <title>Create Transaction</title>
</head>
<body>
<h1>Create New Transaction</h1>

<form action="{{ route('transactions.store') }}" method="POST">
    @csrf
    <label>Employee Name</label>
    <input type="text" name="employee_name" required><br>

    <label>Sender Name</label>
    <input type="text" name="sender_name" required><br>

    <label>Receiver Name</label>
    <input type="text" name="receiver_name" required><br>

    <label>Sender Account</label>
    <input type="text" name="sender_account" required><br>

    <label>Receiver Account</label>
    <input type="text" name="receiver_account" required><br>

    <label>Amount</label>
    <input type="number" name="amount" step="0.01" required><br>

    <button type="submit">Save Transaction</button>
</form>
</body>
</html>
