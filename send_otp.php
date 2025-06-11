<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = $_POST['phone'];
    ++
    // Function to generate a random OTP
    function generateOtp($length = 6) {
        $otp = '';
        for ($i = 0; $i < $length; $i++) {
            $otp .= mt_rand(0, 9);
        }
        return $otp;
    }

    // Generate OTP
    $otp = generateOtp();

    // Send OTP to the user's phone number
    // Here you would use an SMS API to send the OTP
    // Example with a hypothetical SMS API
    $apiKey = 'YOUR_SMS_API_KEY';
    $message = "Your OTP is: $otp";
    $senderId = 'YourSenderID';

    $url = "https://smsapi.example.com/send?apiKey=$apiKey&senderId=$senderId&phone=$phone&message=" . urlencode($message);
    $response = file_get_contents($url);

    // Check the response from the SMS API
    if ($response) {
        // Here you would save the OTP in your database associated with the user's phone number or session
        // For simplicity, we'll just return a success response
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>
