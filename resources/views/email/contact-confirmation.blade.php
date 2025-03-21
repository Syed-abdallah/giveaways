<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Review Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #2c3e50;
        }
        p {
            font-size: 16px;
            color: #555;
            line-height: 1.5;
        }
        .order-details {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            text-align: left;
        }
        .order-details p {
            margin: 8px 0;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
        .thank-you {
            font-size: 18px;
            color: #27ae60;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🎉 Hello, {{ $order->name }}!</h2>
        <p>Thank you for review. Here are your order details:</p>

        <div class="order-details">
            @if($order->amazon_id)
                <p><strong>🆔 Amazon ID:</strong> {{ $order->amazon_id }}</p>
            @endif
      
            
            <p><strong>📧 Email:</strong> {{ $order->email }}</p>
            @if($order->option)
                <p><strong>🎉 Option:</strong> {{ $order->option }}</p>
            @endif
            @if($order->option2)
                <p><strong>🎉 Option:</strong> {{ $order->option2 }}</p>
            @endif
            @if($order->option2)
                <p><strong>🎉 Option:</strong> {{ $order->options }}</p>
            @endif
            @if($order->shipping_address)
            <p><strong>📍 Shipping Address:</strong> {{ $order->shipping_address }}</p>
            @endif
        </div>

        @if($order->reason)
            <p><strong>📝 Reason:</strong> {{ $order->reason }}</p>
        @endif

        <p class="thank-you">We truly appreciate your Review! 😊</p>
        <p class="footer">If you have any questions, feel free to contact our support team.</p>
    </div>
</body>
</html>