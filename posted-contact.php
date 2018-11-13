<?php

    $url = 'http://cameleonapp.com/bec/suitecrm_/service/v4_1/rest.php';

    // Open a curl session for making the call
    $curl = curl_init($url);

    // Tell curl to use HTTP POST
    curl_setopt($curl, CURLOPT_POST, true);

    // Tell curl not to return headers, but do return the response
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

     
    // Set the POST arguments to pass to the Sugar server
    $parameters = array(
        'user_auth' => array(
            'user_name' => 'becfrance2018',
            'password' => md5('becfrance2018'),
            ),
        );

    $json = json_encode($parameters);
    $postArgs = array(
        'method' => 'login',
        'input_type' => 'JSON',
        'response_type' => 'JSON',
        'rest_data' => $json,
        );
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postArgs);
     
    // Make the REST call, returning the result
    $response = curl_exec($curl);

    // Convert the result from JSON format to a PHP array
    $result = json_decode($response);
    if ( !is_object($result) ) {
        die("Error handling result.\n");
    }
    if ( !isset($result->id) ) {
        die("Error: {$result->name} - {$result->description}\n.");
    }

    // Echo out the session id
    //echo $result->id."<br />";

    $session = $result->id;
    extract($_POST);
    /*print"<pre>";
    print_r($_POST);*/
 
    header("Location: http://localhost/becfrance-site/verify-contact.php?session=$session&last_name=$last_name&first_name=$first_name&email=$email1&phone_mobile=$phone_mobile&message=$message&salutation=$title&segment=$segment&lead_source=$lead_source");
    
?>