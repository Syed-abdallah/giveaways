<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thank You for Your Feedback!</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            margin: 20px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            /* text-align: center; */
        }
        h2 {
            color: #2c3e50;
            font-size: 24px;
        }
        p {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
        }
        .footer {
            margin-top: 20px;
            font-size: 16px;
            color: #777;
        }
        .thank-you {
            font-size: 20px;
            color: #d14737;
            font-weight: bold;
        }
        .highlight {
            color: #cf7526;
            font-weight: bold;
        }
        .container p strong {
            color: #2673a7;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🎉 Dear <span class="highlight">{{ ucfirst($order->name) }}</span>!</h2>
        <p>Thank you so much for your kind words and for sharing your positive feedback with us! We are thrilled to hear that you are happy with your recent order, and we truly appreciate you taking the time to leave a review.</p>
        <p>As a token of our gratitude for being such a wonderful customer, we’re excited to send you your <strong>bonus {{ ucfirst($order->options) }}</strong> as promised. You can expect it to be on its way to you very soon!</p>
        <p>We are so grateful for your support and look forward to serving you again in the future. If you have any questions or need further assistance, please don’t hesitate to reach out.</p>
        <p class="thank-you">Thank you again, and we hope to continue exceeding your expectations! 😊</p>
        <p>Best regards,</p>
        <p><strong>The Pet Lovers Giveaway Team.</strong></p>
       
    </div>
</body>
</html>