<?php
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => get_api('url')."starter/province?id=$propinsi",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "key: ".get_api('key')
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) 
	{
	  
	} 
	else 
	{
	  //echo $response;
		$data = json_decode($response, true);
	  echo str_replace('"','',json_encode($data['rajaongkir']['results']['province']));
	}
