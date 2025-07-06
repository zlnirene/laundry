<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Transaction History</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
    </style>
</head>
<body>
    <h2>Transaction History</h2>
    <table>
        <thead>
            <tr>
            <th class="">Transaction ID</th>
            <th class="">Date</th>
            <th class="">Time</th>
            <th class="">Customer</th>
            <th class="">Cashier</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->no_transaction }}</td>
                    <td>{{ $transaction->date }}</td>
                    <td>{{ $transaction->time }}</td>
                    <td>{{ $transaction->customer }}</td>
                    <td>{{ $transaction->cashier }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>