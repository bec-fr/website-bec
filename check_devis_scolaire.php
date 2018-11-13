<?php 
    extract($_GET);
    //$url = 'https://cameleonapp.com/bec/SuiteCRM-7.10.9/service/v4_1/rest.php';
    $url = 'https://cameleonapp.com/bec/suitecrm_/service/v4_1/rest.php';
    
    $record_ids = run_result(search_by_module($email, array('Contacts', 'Leads'), $session, $url));
    $record_found = null;

    $get_entry_result = get_entry_list($record_ids->module, 'id', $record_ids->record_id, $session, $url);
    $accounts_related = $get_entry_result->relationship_list[0]->link_list[0]->records;

    //--------------------------------------------------------------------
    if(empty($record_ids->record_id))
    {
        if( recordModule(
                (Object)array(
                    'salutation' => $salutation,
                    'first_name' => ucfirst($first_name),
                    'last_name' => ucfirst($last_name),
                    'email' => $email,
                    'phone_mobile' => $phone_mobile,
                    /*'segment_c' => $segment,*/
                    'establishment' => $establishment,
                    'code_postal_establishment' => $code_postal_establishment,
                    'address_establishment' => $address_establishment,
                    'town_establishment' => $town_establishment,
                    'phone_work_establishment' => $phone_work_establishment,
                    'message_c' => get_description($_GET),
                    'lead_source'=> $lead_source
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
                    /*'segment_c' => $segment,*/
                    'message_c' => get_description($_GET),
                    'lead_source'=> $lead_source,
                    'establishment' => $establishment,
                    'code_postal_establishment' => $code_postal_establishment,
                    'town_establishment' => $town_establishment,
                    'phone_work_establishment' => $phone_work_establishment,
                    'address_establishment' => $address_establishment,
                    'id' => $record_ids->record_id,
                    'accounts_related' => $accounts_related
                ),
                $record_ids->module,
                $session,
                $url
            ) 
        )echo $record_ids->module." Updating";
            else
            {
                echo "Error updating ".$record_ids->module;
            }
    }
    //------------------------------------------------------------------------------------------------------------------------------------



    //Save or Update a Contact or Lead
    function recordModule($data, $module, $session, $url)
    {
        $idAccount = null;
        $nameAccount = $data->establishment;
        $created = 1;

        if(isset($data->id))
        {
            //if Lead or Contact is related to Accounts
            if(!empty($data->accounts_related))
            {
                foreach ($data->accounts_related as $results)
                {
                    if($results->link_value->name->value == $data->establishment)
                    {
                        $res = get_entry_list('Accounts', 'name', $results->link_value->name->value, $session, $url);
                        if($res->entry_list[0]->name_value_list->billing_address_postalcode->value == $data->code_postal_establishment)
                        {
                            $created = 0;
                            break;
                        } 
                    }
                }   
            }

            //Created Account if Lead or Contact is not related to a Account
            if($created)
            {
                $search_results = search_by_module($data->establishment, array('Accounts'), $session, $url);

                if(empty($search_results->entry_list[0]->records))
                {
                    //Create Account
                    /***********************************/
                    $set_entry_parameters = array(
                        'session' => $session, //Session ID
                        'module' => 'Accounts',  //Module name
                        'name_value_list' => array (
                                array('name' => 'name', 'value' => $nameAccount),
                                array('name' => 'billing_address_postalcode', 'value' => $data->code_postal_establishment),
                                array('name' => 'billing_address_city', 'value' => $data->town_establishment),
                                /*array('name' => 'segment_c', 'value' => $data->segment_c),*/
                                array('name' => 'phone_office', 'value' => $data->phone_work_establishment),
                                array('name' => 'billing_address_street', 'value' => $data->address_establishment)
                            )
                        );
                    $set_entry_result = call('set_entry', $set_entry_parameters, $url);

                    $idAccount = $set_entry_result->id;

                }
                else
                    $idAccount = $search_results->entry_list[0]->records[0]->id->value;

                //Updating Contact or Lead
                /***********************************/
                $set_entry_parameters = array(
                'session' => $session, //Session ID
                'module' => $module,  //Module name
                'name_value_list' => array (
                        array('name' => 'id', 'value' => $data->id),
                        /*array('name' => 'segment_c', 'value' => $data->segment_c),*/
                        array('name' => 'lead_source', 'value' => $data->lead_source),
                        array('name' => 'account_id', 'value' => $idAccount),
                        array('name' => 'account_name', 'value' => $nameAccount),
                        array('name' => 'message_c', 'value' => $data->message_c)
                    )
                );

                $set_entry_result = call('set_entry', $set_entry_parameters, $url);

                $related_ids = array();
                foreach ($data->accounts_related as $value) {
                    array_push($related_ids, $value->link_value->id->value);
                }

                array_push($related_ids, $idAccount);
                $set_relationship_parameters = array(
                    //session id  
                    "session" => $session,    
                    "module_name" => $module,
                    "module_id" => $data->id,  
                    "link_field_name" => (($module == 'Leads') ? 'accounts_leads_1' : 'accounts'),
                    "related_ids" => $related_ids ,
                    'name_value_list' => array(
                        array(
                            /*'name' => 'contact_role',
                            'value' => 'Other'*/
                        )
                    ),
                    'delete'=> 0,
                );
                call('set_relationship', $set_relationship_parameters, $url);



            }
            

            if(isset($set_entry_result->id))
                return true;
        }
        else
        {
            $search_results = search_by_module($data->establishment, array('Accounts'), $session, $url);

            if(empty($search_results->entry_list[0]->records))
            {
                //Create Account
                /***********************************/
                $set_entry_parameters = array(
                    'session' => $session, //Session ID
                    'module' => 'Accounts',  //Module name
                    'name_value_list' => array (
                            array('name' => 'name', 'value' => $nameAccount),
                            array('name' => 'billing_address_postalcode', 'value' => $data->code_postal_establishment),
                            array('name' => 'billing_address_city', 'value' => $data->town_establishment),
                            /*array('name' => 'segment_c', 'value' => $data->segment_c),*/
                            array('name' => 'phone_office', 'value' => $data->phone_work_establishment),
                            array('name' => 'billing_address_street', 'value' => $data->address_establishment)
                        )
                    );
                $set_entry_result = call('set_entry', $set_entry_parameters, $url);

                $idAccount = $set_entry_result->id;

            }
            else
                $idAccount = $search_results->entry_list[0]->records[0]->id->value;

            //Create Lead
            /***********************************/
            $set_entry_parameters = array(
            'session' => $session, //Session ID
            'module' => 'Leads',  //Module name
            'name_value_list' => array (
                    array('name' => 'salutation', 'value' => $data->salutation),
                    array('name' => 'last_name', 'value' => $data->last_name),
                    array('name' => 'first_name', 'value' => $data->first_name),
                    array('name' => 'email1', 'value' => $data->email),
                    array('name' => 'phone_mobile', 'value' => $data->phone_mobile),
                    array('name' => 'account_id', 'value' => $idAccount),
                    array('name' => 'account_name', 'value' => $nameAccount),
                    array('name' => 'status', 'value' => 'HotLead'),
                    array('name' => 'message_c', 'value' => $data->message_c),
                    array('name' => 'lead_source', 'value' => $data->lead_source),
                )
            );
            $set_entry_result = call('set_entry', $set_entry_parameters, $url);

            $set_relationship_parameters = array(  
                //session id  
                "session" => $session,    
                "module_name" => 'Leads',
                "module_id" => $set_entry_result->id,  
                "link_field_name" => "accounts_leads_1",
                "related_ids" => array($idAccount),
                'name_value_list' => array(
                    array(
                        /*'name' => 'contact_role',
                        'value' => 'Other'*/
                    )
                ),
                'delete'=> 0,
            );
            call('set_relationship', $set_relationship_parameters, $url);
            
            
            if(isset($set_entry_result->id))
                return true;

        }
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
        $curl_request = curl_init($curl);
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
        $description = "
            Information Client => \n
            Nom: ".ucfirst($last_name)."\n
            Prénom: ".ucfirst($first_name)."\n
            Email: ".$email."\n
            Téléphone mobile: ".$phone_mobile."\n\n
            Information etablissement => \n
            Nom établissement: ".$establishment."\n
            Adresse: ".$address_establishment."\n
            Code postal: ".$code_postal_establishment."\n
            Ville: ".$town_establishment."\n\n
            Détails de demande de dévis => \n
            Destination (pays: ".$destination_country." | ville: ".$destination_city.")\n
            Nombre d eleves: [-16 ans: ".$less16."| 16/18 ans: ".$equal16_18."| +18 ans: ".$more18."]\n
            Nombre d encadrants: ".$framings."\n
            Nombre de places: ".$places."\n
            Date de depart de l etablissement: ".$date_start."\n
            Date de retour de l etablissement: ".$date_end."\n
            Mode de voyage: ".$mode_travel."\n
            Traversée maritime: ".$crossing."\n
            Date du CA devant voter le voyage: ".$date_ca."\n
            Assurance souhaitée: ".$assurance."\n\n
            Message: ".$message."
            Deatils supplémentaire => \nComment ç-t'il connu BEC: ".$survey;
        ;
        return $description;
    }

    //SEARCH IF EMAIL EXIST IN MODULE (CONTACTS - LEADS)
    function search_by_module($string, $modules_to_search, $session, $url)
    {
        $search_paramaters = array(
            "session" => $session,
            'search_string' => $string,
            'modules' => $modules_to_search,
            'offset' => 0,
            'max_results' => 1,
            'assigned_user_id' => '',
            'select_fields' => array('id'),
            'unified_search_only' => false,
            'favorites' => false
        );
        return call('search_by_module', $search_paramaters, $url);
    }
    //--------------------------------------------------------------------
 
    //GET RECORDS ON MODULE SPECIFIC
    function get_entry_list($module, $query_field, $value, $session, $url)
    {
        $get_entry_parameters = array(
            'session' => $session,
            'module_name' => $module,
            'query' => strtolower($module).".".$query_field."= '$value'",
            'order_by' => strtolower($module).".first_name ",
            'offset'  => 0,
            'select_fields' => $fields_array,
            'link_name_to_fields_array' => array(
                array(
                    'name' => 'accounts',
                    'value' => array(
                        'id',
                        'name',
                    ),
                ),
            ),
            'max_results' => 10,                
            'deleted' => 'false',
        );
        return call('get_entry_list', $get_entry_parameters, $url);
    }

 ?>