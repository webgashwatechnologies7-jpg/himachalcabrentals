<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Plan Your Holiday Inquiry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color:#000;
            font-size:14px;
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
            width:100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color:#000;
        }

        th {
            font-weight: bold;
        }

        p {
            margin-top: 10px;
            line-height: 1.4;
            background: #62319e;
            padding:5px;
            color:white;
        }
    </style>
</head>
<body>
<p>Plan Your Holiday - {{EMAIL_COMPANY_HEADER}}</p>
<table>
    <tr>
        <th>Query ID:</th>
        <td>{{$queryId}}</td>
    </tr>
    <tr>
        <th>Destination/Package</th>
        <td>{{$packQuery->location}}</td>
    </tr>
    <tr>
        <th>Travel Date:</th>
        <td>{{$packQuery->start_date}}</td>
    </tr>
    <tr>
        <th>Return Date:</th>
        <td>{{$packQuery->end_date}}</td>
    </tr>
    <tr>
        <th>Travellers:</th>
        <td>{{$packQuery->adults}} Adults, {{!empty($packQuery->kids) ? $packQuery->kids : 0}} Kids</td>
    </tr>
    <tr>
        <th>Pick-up Location:</th>
        <td>{{$packQuery->pick_up}}</td>
    </tr>
    <tr>
        <th>Drop Location:</th>
        <td>{{$packQuery->drop}}</td>
    </tr>
    <tr>
        <th>Cabs Selected:</th>
        <td>{{$packQuery->cab->title}}</td>
    </tr>
    <tr>
        <th>Additional Requirement:</th>
        <td>{{$packQuery->description}}</td>
    </tr>
    <tr>
        <th>Name:</th>
        <td>{{$packQuery->name}}</td>
    </tr>
    <tr>
        <th>City:</th>
        <td>{{$packQuery->city}}</td>
    </tr>
    <tr>
        <th>Phone Number:</th>
        <td>{{$packQuery->phone}}</td>
    </tr>
    <tr>
        <th>Email:</th>
        <td>{{$packQuery->email}}</td>
    </tr>
</table>
</body>
</html>


