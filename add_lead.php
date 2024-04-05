<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$data = [
    'firstName' => $firstName,
    'lastName' => $lastName,
    'phone' => $phone,
    'email' => $email,
    'countryCode' => 'GB',
    'box_id' => 28,
    'offer_id' => 5,
    'ip' => $_SERVER['REMOTE_ADDR'],
    'password' => 'qwerty12',
    'language' => 'en',
];

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => 'https://crm.belmar.pro/api/v1/addlead',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => [
        'token: ba67df6a-a17c-476f-8e95-bcdb75ed3958',
        'Content-Type: application/json'
    ],
]);

$response = curl_exec($curl);

curl_close($curl);

header("Location: index.html");
exit();
?>
