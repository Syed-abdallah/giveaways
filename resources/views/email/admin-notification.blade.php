<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Review Received</title>
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
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            text-align: center;
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
            margin-bottom: 20px;
        }
        .order-details p {
            margin: 5px 0;
        }
        .image-container {
            text-align: center;
            margin-top: 20px;
        }
        img {
            border-radius: 5px;
            max-width: 100%;
            height: auto;
            border: 1px solid #ddd;
            padding: 5px;
            background: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🎉 New Review Received! 🎉</h2>
        <p>A new order has been placed with the following details:</p>

        <div class="order-details">
            @if($order->amazon_id){

                <p><strong>🆔 Order ID:</strong> {{ $order->amazon_id }}</p>
            }
            @endif
            <p><strong>👤 Name:</strong> {{ $order->name }}</p>
            <p><strong>📧 Email:</strong> {{ $order->email }}</p>
            @if($order->shipping_address){

            <p><strong>📍 Shipping Address:</strong> {{ $order->shipping_address }}</p>
            }
            @endif
            @if($order->option){

            <p><strong>📍 Shipping Address:</strong> {{ $order->option }}</p>
        }
        @endif
    </div>
    
  @if($order->review){

        <p><strong>💬 Review :</strong> {{ $order->review }}</p>

  }
@endif
        @if($order->image_path){

            <div class="image-container">
                <p><strong>📸 Uploaded Image:</strong></p>
                <img src="{{ asset('storage/orders/' . $order->image_path) }}" width="200">
            </div>
        }
        @endif
    </div>
</body>
</html>
