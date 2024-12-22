<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="{{ asset('receipt.css') }}">
    <title>receipt</title>
</head>
<body>
    <div class="container">
        <h1>Fees Receipt</h1><hr>
        <p style="float:right">{{$date}}</p>
        <h5>Name: {{$student_name}}</h5>
        <h5>Registration No. {{$student_id}}</h5>
        <table border="2" width="100%">
            <tr>
                <th>Total</th>
                <th>Paid</th>
                <th>Balance</th>
            </tr>
            <tr>
                <td>Ksh. {{$total}}</td>
                <td>Ksh. {{$paid}}</td>
                <td>Ksh. {{$balance}}</td>
            </tr>
        </table>
        <h4>{{$served_by}}</h4>
    </div>
    
</body>
</html>