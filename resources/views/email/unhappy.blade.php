<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Feedback Confirmation & Apology</title>
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
        .apology {
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
        <h2>Dear <span class="highlight">{{ ucfirst($order->name) }}</span>,</h2>
        <p>Thank you for reaching out and sharing your feedback with us. We want to acknowledge that we have received your message regarding your recent order.</p>
        <p class="apology">We sincerely apologize for any inconvenience this may have caused.</p>
        <p>We understand your concerns and appreciate your patience. We see that you have selected one of the solutions provided on our website, and we are already working to resolve the issue as quickly as possible.</p>
        <p>Rest assured, we are committed to ensuring your satisfaction and will take the necessary steps to address the matter promptly.</p>
        <p>If you have any additional questions or concerns in the meantime, please don’t hesitate to contact us. We truly value your business and are here to assist in any way we can.</p>
        <p class="thank-you">Thank you for your understanding, and we appreciate your continued trust in our products. 🙏</p>
        <p>Best regards,</p>
        <p><strong>The Pet Lovers Giveaway Team After best regards.</strong></p>
   
    </div>
</body>
</html>
