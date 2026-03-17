<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quick Inquiry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #000;
            font-size: 14px;
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: #000;
        }

        th {
            font-weight: bold;
        }

        p {
            margin-top: 10px;
            line-height: 1.4;
            background: #62319e;
            padding: 5px;
            color: white;
        }
    </style>
</head>
<body>
<p>Quick Inquiry - {{EMAIL_COMPANY_HEADER}}</p>
<table>
    <tr>
        <th>Query ID:</th>
        <td>{{$queryId}}</td>
    </tr>
    <tr>
        <th>Travel Date:</th>
        <td>{{\Illuminate\Support\Carbon::parse($packQuery->start_date)->format('d-M-Y')}}</td>
    </tr>
    <tr>
        <th>Return Date:</th>
        <td>{{\Illuminate\Support\Carbon::parse($packQuery->end_date)->format('d-M-Y')}}</td>
    </tr>
    <tr>
        <th>Travellers:</th>
        <td>{{$packQuery->count}}</td>
    </tr>
    <tr>
        <th>Name:</th>
        <td>{{$packQuery->name}}</td>
    </tr>
    <tr>
        <th>Phone Number:</th>
        <td>{{$packQuery->phone}}</td>
    </tr>
    <tr>
        <th>Email:</th>
        <td>{{$packQuery->email}}</td>
    </tr>
    <tr>
        <th>Destination:</th>
        <td>{{$packQuery->destination}}</td>
    </tr>
    <tr>
        <th>Pick Up Location:</th>
        <td>{{$packQuery->pick_up}}</td>
    </tr>
    <tr>
        <th>Drop Location:</th>
        <td>{{$packQuery->drop}}</td>
    </tr>
</table>
</body>
</html>


