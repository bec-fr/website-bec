<?php

    //$url = 'https://cameleonapp.com/bec/SuiteCRM-7.10.9/service/v4_1/rest.php';
    $url = 'https://cameleonapp.com/bec/suitecrm_/service/v4_1/rest.php';

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

    header("Location: https://cameleonapp.com/bec/website/demandes/devis/check_devis_scolaire.php?session=$session&last_name=$last_name&first_name=$first_name&email=$email1&phone_mobile=$phone_mobile&phone_work_establishment=$phone_work_establishment&message=$message&establishment=$establishment&address_establishment=$address_establishment&code_postal_establishment=$code_postal_establishment&town_establishment=$town_establishment&servey=$servey&destination_country=$destination_country&destination_city=$destination_city&less16=$less16&equal16_18=$equal16_18&more18=$more18&framings=$framings&places=$places&date_start=$date_start&date_end=$date_end&mode_travel=$mode_travel&crossing=$crossing&date_ca=$date_ca&file_prog=$file_prog&assurance_comp=$assurance_comp&assurance=$assurance&back_night_forth=$back_night_forth&back_night_to_go=$back_night_to_go&lead_source=$lead_source");
    
?>