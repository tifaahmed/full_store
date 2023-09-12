<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
</head>
<body>
    <div>
        <div>
            <p>Dear <b>{{$company_name}}</b>,</p>

            <p>We are writing to confirm that you have received new order.</p>

            <p><b>Order Details</b></p>

            Order Number : <b>#{{$order_number}}</b><br>
            Date : <b>{{$delivery_date}}</b><br>
            Time : <b>{{$delivery_time}}</b><br>
            Total Amount : <b>{{$grand_total}}</b><br>
            
            <p>Sincerely,<br>
            {{$company_name}}
            </p>
        </div>
    </div>
</body>
</html>
