<?php
require 'vendor/autoload.php'; // Install via Composer

\Stripe\Stripe::setApiKey('your_secret_key');

$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => 'Flight Booking',
            ],
            'unit_amount' => 5000, // $50.00
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'https://example.com/success',
    'cancel_url' => 'https://example.com/cancel',
]);

echo json_encode(['id' => $session->id]);
?>
