<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
</head>
<body>
    <div>
        <div>
            <p>Dear <b>{{$customer_name}}</b>,</p>

            <p>We are pleased to confirm that we have received your order and it is currently being processed.</p>

            <p><b>Order Details</b></p>

            Order Number : <b>#{{$order_number}}</b><br>
            Date : <b>{{$delivery_date}}</b><br>
            Time : <b>{{$delivery_time}}</b><br>
            Total Amount : <b>{{$grand_total}}</b><br>

            <p>Click here : <a href="{{ $trackurl }}">Track Order</a></p>
            
            <p>Thank you for choosing <b>{{$company_name}}</b>.</p>
            
            <p>Sincerely,<br>
            {{$company_name}}
            </p>
        </div>
    </div>
</body>
</html>
