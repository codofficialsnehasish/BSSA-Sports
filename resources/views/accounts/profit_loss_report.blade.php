<!DOCTYPE html>
<html>
<head>
    <title>Profit and Loss Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Profit and Loss Report</h2>
    <table>
        <tr>
            <th>Receipts</th>
            <th>Amount</th>
            <th>Payments</th>
            <th>Amount</th>
        </tr>
        @php
            $maxRows = max($receipts->count(), $payments->count());
        @endphp

        @for($i = 0; $i < $maxRows; $i++)
        <tr>
            <td>{{ $receipts[$i]->transaction_name ?? '' }}</td>
            <td>{{ $receipts[$i]->total_amount ?? '' }}</td>
            <td>{{ $payments[$i]->transaction_name ?? '' }}</td>
            <td>{{ $payments[$i]->total_amount ?? '' }}</td>
        </tr>
        @endfor

        <tr>
            <th>Total Receipts</th>
            <th>{{ $totalReceipts }}</th>
            <th>Total Payments</th>
            <th>{{ $totalPayments }}</th>
        </tr>
    </table>
</body>
</html>
