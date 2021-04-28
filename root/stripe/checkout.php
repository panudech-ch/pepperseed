<?php
    require_once('/home8/pepperse/public_html/stripe/stripe-php-master/init.php');

    // This is a sample test API key. Sign in to see examples pre-filled with your key.

    \Stripe\Stripe::setApiKey('sk_live_Iw43l7vIpz2vs7k0DGmdwj8I00OtAkjU4n');

    function calculateOrderAmount($price) {
      // Replace this constant with a calculation of the order's amount
      // Calculate the order total on the server to prevent
      // customers from directly manipulating the amount on the client
      $p = number_format($price, 2)*100 + '';
      $p = str_replace('.', '', $p);
      return (int) $p;
    }

    header('Content-Type: application/json');
    try {
      // retrieve JSON from POST body
      $json_str = file_get_contents('php://input');
      $json_obj = json_decode($json_str);
      $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => calculateOrderAmount($json_obj->price),
        'currency' => 'aud',
        'payment_method_types' => ['card'],
      ]);
      $output = [
        'clientSecret' => $paymentIntent->client_secret,
      ];
      echo json_encode($output);
    } catch (Error $e) {
      http_response_code(500);
      echo json_encode(['error' => $e->getMessage()]);
    }