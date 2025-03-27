<style>
    .success-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        min-height: 60vh;
        padding: 20px;
        margin-top: 60px;
    }

    .success-animation {
        margin: 20px auto;
    }

    .checkmark {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        display: block;
        stroke-width: 2;
        stroke: #4bb71b;
        stroke-miterlimit: 10;
        box-shadow: inset 0px 0px 0px #4bb71b;
        animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
        position: relative;
        margin: 0 auto;
    }

    .checkmark__circle {
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke-miterlimit: 10;
        stroke: #4bb71b;
        fill: #fff;
        animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
    }

    .checkmark__check {
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
    }

    @keyframes stroke {
        100% {
            stroke-dashoffset: 0;
        }
    }

    @keyframes scale {
        0%, 100% {
            transform: none;
        }

        50% {
            transform: scale3d(1.1, 1.1, 1);
        }
    }

    @keyframes fill {
        100% {
            box-shadow: inset 0px 0px 0px 30px #4bb71b;
        }
    }

    .reviewCardStyle {
        font-family: 'Rubik', sans-serif;
        font-size: 18px;
        max-width: 600px;
        color: rgba(0, 0, 0, 0.75);
        background-color: #FFFFFF;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        margin-top: 15px;
        line-height: 1.6;
    }

    .bold-text {
        font-weight: bold;
        color: #4bb71b;
    }
</style>

<div class="success-container">
    <div class="success-animation">
        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
        </svg>
    </div>

    <p class="reviewCardStyle">
        {{-- Please kindly support our growing business by <span class="bold-text">leaving us 5 stars</span> to claim your reward! --}}
        Thank You for Your Participation!    </p>
    <p class="reviewCardStyle">
        <span class="bold-text">Thank you for your support and for helping our business grow! Your satisfaction means the world to us.
            A confirmation will be sent to your email shortly.
            Don’t forget to check your junk/spam folder if you don’t receive the email within 3 business days. Thanks again!
            </span>
    </p>
</div>
