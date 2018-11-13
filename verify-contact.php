<?php 
    extract($_GET);
    //$url = 'https://cameleonapp.com/bec/SuiteCRM-7.10.9/service/v4_1/rest.php';
    $url = 'https://cameleonapp.com/bec/suitecrm_/service/v4_1/rest.php';

    //SEARCH IF EMAIL EXIST IN MODULE (ACCOUNTS - CONTACTS - LEADS)
    $search_paramaters = array(
            "session" => $session,
            'search_string' => $email,
            'modules' => array(
                'Contacts',
                'Leads',
            ),
            'offset' => 0,
            'max_results' => 1,
            'assigned_user_id' => '',
            'select_fields' => array('id'),
            'unified_search_only' => false,
            'favorites' => false
        );
    $search_result = call('search_by_module', $search_paramaters, $url);


    $record_ids = run_result($search_result);
    $rec = (Object)array();

    if(!empty($record_ids))
    {
        $get_entry_parameters = array(
            'session' => $session,
            'module_name' => 'Contacts',
            'query' => "contacts.id = '$record_ids->record_id'",
            'order_by' => " contacts.first_name ",
            'offset'  => 0,
            'select_fields' => array(),
            'link_name_to_fields_array' => array(array()),
            'max_results' => 10,                
            'deleted' => 'false',
        );
        $get_entry_result = call('get_entry_list', $get_entry_parameters, $url);
        $rec = $get_entry_result->entry_list[0]->name_value_list;
    }

    if(empty($record_ids->record_id))
    {
        if( recordModule(
                (Object)array(
                    'first_name' => ucfirst($first_name),
                    'last_name' => ucfirst($last_name),
                    'email' => $email,
                    'phone_mobile' => $phone_mobile,
                    'salutation' => $salutation,
                    'lead_source' => $lead_source,
                    'segment_c' => $segment,
                    'message_c' => get_description($_GET)
                ),
                'Leads',
                $session,
                $url
            ) 
        )echo "Leads Created";
            else
            {
                echo "Error insert Lead";
            }
    }
    else
    {
        if( recordModule(
                (Object)array(
                    'first_name' => ucfirst($first_name),
                    'last_name' => ucfirst($last_name),
                    'email' => $email,
                    'segment_c' => $segment,
                    'phone_mobile' => $phone_mobile,
                    'salutation' => $salutation,
                    'lead_source' => $lead_source,
                    'id' => $record_ids->record_id,
                    'message_c' => get_description($_GET)
                ),
                $record_ids->module,
                $session,
                $url
            ) 
        )echo $record_ids->module." Updated";
            else
            {
                echo "Error updating ".$record_ids->module;
            }
            header("Location: http://localhost/becfrance-site/contact.php?");
    }




    //FUNCTIONS
    function recordModule($data, $module, $session, $url)
    {
        if(isset($data->id))
        {
            // Updating Contact or Lead
            /***********************************/
            $set_entry_parameters = array(
            'session' => $session, //Session ID
            'module' => $module,  //Module name
            'name_value_list' => array (
                    array('name' => 'id', 'value' => $data->id),
                    array('name' => 'status', 'value' => 'HotLead'),
                    array('name' => 'message_c', 'value' => $data->message_c),
                    array('name' => 'segment_c', 'value' => $data->segment_c),
                    array('name' => 'lead_source', 'value' => $data->lead_source)
                  
                )
            );

            $set_entry_result = call('set_entry', $set_entry_parameters, $url);

        }
        else
        {
            // Creating Lead
            /***********************************/
            $set_entry_parameters = array(
            'session' => $session, //Session ID
            'module' => $module,  //Module name
            'name_value_list' => array (
                    array('name' => 'salutation', 'value' => $data->$salutation),
                    array('name' => 'first_name', 'value' => $data->first_name), 
                    array('name' => 'last_name', 'value' => $data->last_name),
                    array('name' => 'status', 'value' => 'HotLead'),
                    array('name' => 'email1', 'value' => $data->email),
                    array('name' => 'segment_c', 'value' => $data->segment_c),
                    array('name' => 'message_c', 'value' => $data->message_c),
                    array('name' => 'phone_mobile', 'value' => $data->phone_mobile),
                    array('name' => 'lead_source', 'value' => $data->lead_source)
                    
                )
            );

            $set_entry_result = call('set_entry', $set_entry_parameters, $url);
        }
        if(isset($set_entry_result->id))
            return true;
        else
            return false;
    }
 

    function run_result($result_leads)
    {
        $record_ids = (Object)array('module' => '', 'record_id' => '');
        $ok = false;

        foreach ($result_leads->entry_list as $results)
        {
            $record_ids->module = $results->name;
       
            foreach ($results->records as $records)
            {
                foreach($records as $record)
                {
                    if ($record->name = 'id')
                    {
                        $record_ids->record_id = $record->value;
                        //skip any additional fields
                        $ok = true;
                        break;
                    }
                }
                if($ok == true)
                    break;
            }
            if($ok == true)
                    break;
       
        }
        return $record_ids;
    }


    function call($method, $parameters, $url)
    {
        ob_start();
        $curl_request = curl_init();
        curl_setopt($curl_request, CURLOPT_URL, $url);
        curl_setopt($curl_request, CURLOPT_POST, 1);
        curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($curl_request, CURLOPT_HEADER, 1);
        curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);
        $jsonEncodedData = json_encode($parameters);
        $post = array(
             "method" => $method,
             "input_type" => "JSON",
             "response_type" => "JSON",
             "rest_data" => $jsonEncodedData
        );
        curl_setopt($curl_request, CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($curl_request);
        curl_close($curl_request);
        $result = explode("\r\n\r\n", $result, 2);
        $response = json_decode($result[1]);
        ob_end_flush();
        return $response;
    }

    function get_description($data)
    {
        extract($data);
        
        $description = $salutation."\n
            Nom: ".ucfirst($first_name)."\n
            Prénom: ".ucfirst($last_name)."\n
            Email: ".$email."\n
            Mobile: ".$phone_mobile."\n
            Segment: ".$segment."\n
            Lead source: ".$lead_source."\n
            Message: ".$message.""
        ;
        return $description;
    }


 ?>


