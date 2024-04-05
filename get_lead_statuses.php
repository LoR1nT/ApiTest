<?php
$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : date('Y-m-d 00:00:00');
$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : date('Y-m-d 23:59:59');

$data = [
    'date_from' => $startDate,
    'date_to' => $endDate,
    'page' => 0,
    'limit' => 100
];

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => 'https://crm.belmar.pro/api/v1/getstatuses',
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

echo $response;
?>
