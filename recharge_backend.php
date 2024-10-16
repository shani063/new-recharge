<?php
// Check if POST request contains amount
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['amount'])) {
    // Capture the amount
    $price = $_POST['amount'];

    // UPI details
    $upiId = '8469157743m@pnb'; // Replace with actual UPI ID
    $payeeName = 'Google Pay'; // Name of payee
    $currency = 'INR'; // Currency
   $plans = [
        [
            'price' => '₹149',
            'validity' => '84 days',
            'data' => '1.5 GB/day',
            'voice' => 'Unlimited',
            'sms' => '100/day',
            'old_price' => '₹749'
        ],
        [
            'price' => '₹199',
            'validity' => '84 days',
            'data' => '2.0 GB/day',
            'voice' => 'Unlimited',
            'sms' => '100/day',
            'old_price' => '₹999'
        ],
        [
            'price' => '₹249',
            'validity' => '84 days',
            'data' => '3.0 GB/day',
            'voice' => 'Unlimited',
            'sms' => '100/day',
            'old_price' => '₹1299'
        ],
        [
            'price' => '₹279',
            'validity' => '6 months',
            'data' => '2.0 GB/day',
            'voice' => 'Unlimited',
            'sms' => '100/day',
            'old_price' => '₹1999'
        ],
        [
            'price' => '₹389',
            'validity' => '12 months',
            'data' => '2.0 GB/day',
            'voice' => 'Unlimited',
            'sms' => '100/day',
            'old_price' => '₹2499'
        ],
    ];

    // Initialize transaction note
    $transactionnote = '';

    // Loop through plans and compare price
    foreach ($plans as $plan) {
        if ($plan['price'] === $price) {
            // If the price matches, set the transaction note
            $transactionnote = 'Recharge Payment for ' . $plan['validity'] . ' with ' . $plan['data'] . ', Voice: ' . $plan['voice'] . ', SMS: ' . $plan['sms'] . '. Old Price: ' . $plan['old_price'];
            break; // Exit the loop after finding the matching plan
        }
    }

    // If no matching plan is found, set a default transaction note
    if (empty($transactionnote)) {
        $transactionnote = 'Recharge Payment for an google pay plan.';
    }


    // Construct the UPI payment URL
    $upiUrl = "upi://pay?pa=" . urlencode($upiId) .
              "&pn=" . urlencode($payeeName) .
              "&am=" . urlencode($price) .
              "&cu=" . urlencode($currency) .
              "&tn=" . urlencode($transactionnote);

    // Return the UPI URL back to the frontend
    echo $upiUrl;
    exit();
}