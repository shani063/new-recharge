<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Pay Recharge</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .recharge-container {
            margin: 50px auto;
            max-width: 600px;
        }
        .plan-card {
            border-radius: 12px;
            margin-bottom: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        .plan-header {
            font-size: 24px;
            font-weight: bold;
            color: #dc3545;
        }
        .old-price {
            text-decoration: line-through;
            color: #6c757d;
            margin-left: 10px;
        }
        .recharge-btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }
        .recharge-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container recharge-container">
        <h2 class="text-center mb-4">Google Pay Exclusive Recharge Plans</h2>

        <!-- Plan 1 -->
        <div class="plan-card">
            <div class="d-flex justify-content-between">
                <span class="plan-header">₹149</span>
                <span class="old-price">₹749</span>
            </div>
            <p>Validity: 84 days</p>
            <p>Data: 1.5 GB/day</p>
            <p>Voice: Unlimited</p>
            <p>SMS: 100/day</p>
            <button class="recharge-btn" onclick="handleRecharge('149')">Recharge</button>
        </div>

        <!-- Plan 2 -->
        <div class="plan-card">
            <div class="d-flex justify-content-between">
                <span class="plan-header">₹199</span>
                <span class="old-price">₹999</span>
            </div>
            <p>Validity: 84 days</p>
            <p>Data: 2.0 GB/day</p>
            <p>Voice: Unlimited</p>
            <p>SMS: 100/day</p>
            <button class="recharge-btn" onclick="handleRecharge('199')">Recharge</button>
        </div>

        <!-- Plan 3 -->
        <div class="plan-card">
            <div class="d-flex justify-content-between">
                <span class="plan-header">₹249</span>
                <span class="old-price">₹1299</span>
            </div>
            <p>Validity: 84 days</p>
            <p>Data: 3.0 GB/day</p>
            <p>Voice: Unlimited</p>
            <p>SMS: 100/day</p>
            <button class="recharge-btn" onclick="handleRecharge('249')">Recharge</button>
        </div>

        <!-- Plan 4 -->
        <div class="plan-card">
            <div class="d-flex justify-content-between">
                <span class="plan-header">₹279</span>
                <span class="old-price">₹1999</span>
            </div>
            <p>Validity: 6 months</p>
            <p>Data: 2.0 GB/day</p>
            <p>Voice: Unlimited</p>
            <p>SMS: 100/day</p>
            <button class="recharge-btn" onclick="handleRecharge('279')">Recharge</button>
        </div>

        <!-- Plan 5 -->
        <div class="plan-card">
            <div class="d-flex justify-content-between">
                <span class="plan-header">₹389</span>
                <span class="old-price">₹2499</span>
            </div>
            <p>Validity: 12 months</p>
            <p>Data: 2.0 GB/day</p>
            <p>Voice: Unlimited</p>
            <p>SMS: 100/day</p>
            <button class="recharge-btn" onclick="handleRecharge('389')">Recharge</button>
        </div>
    </div>

    <!-- Script to handle the AJAX request -->
    <script>
        function handleRecharge(amount) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'recharge_backend.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            
            // Send request to backend with the amount
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var redirectUrl = xhr.responseText;
                    // Redirect to the UPI URL received from backend
                    window.location.href = redirectUrl;
                }
            };
            xhr.send('amount=' + amount);
        }
    </script>
</body>
</html>
