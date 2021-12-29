<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "to": "/topics/Promo_Notification",
    "notification" : {
        "title": "Promo",
        "body": "Promo semua menu 50%"
    }


}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: key=AAAAIGNSXbY:APA91bF4JCTGjoOY1dPry4rWOTfYv-tvpRUsAujGa25yXNVDquVytXYpwfFu6EKMZa3upJIwVWEsKNjZRir2rmLIUR942gVkrVxlaCLVrB7KIVuOPaYWN16hf3Ab8o_wNo4dszPKtv3p',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
