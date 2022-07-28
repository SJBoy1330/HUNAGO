<?php
function send_notification($array=array()){
	/**
	array (
	fcm_key, 
	priority, 
	title,
	substitle,
	body,
	organization
	)
	**/

	$payload = array(
          'to'=>$array['fcm_key'],
          'priority'=>'high',
          "mutable_content"=>true,
          "notification"=>array(
			"title"=> $array['title'],
			"body"=> $array['body'],
			"priority" => $array['priority'], 
			"substitle" => $array['substitle'],
			"content_available" => true,
			"OrganizationId" => $array['organization'],
			"click_action" => "ActivitySplash"
          ),
          'data'=>array(
               "priority" => $array['priority'], 
               "sound" => 'app_sound.wav',
               "content_available" => true,
               "bodyText" =>  $array['body'],
               "organization" => $array['organization']
              )
        );
    $headers = array(
      "Authorization:key=AAAAHjRCzNM:APA91bEjamgPJrLc_dMetpMNyHnjrQZWJIDbI1iENAY9DewExYAVOUB-6neXeVPkwind6rHPbV5ubrFcuROZbmDOXYnk4fnA2QRUft0YtEXpio0J1ydsYcOd4_C_Uyws69rKxua0i0ol",
      'Content-Type: application/json'
	);
	//print_r(json_encode($payload));
	//die;
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $payload ) );
    $result = curl_exec($ch );
    curl_close( $ch );
    var_dump($result);
}


function remoteCall($url, $server_key, $data_hash, $post = true)
{
    $ch = curl_init();

    $curl_options = array(
      CURLOPT_URL => $url,
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: Basic ' . base64_encode($server_key . ':')
      ),
      CURLOPT_RETURNTRANSFER => 1,
      // CURLOPT_CAINFO => dirname(__FILE__) . "/../data/cacert.pem"
    );

    

    if ($post) {
      $curl_options[CURLOPT_POST] = 1;

      if ($data_hash) {
        $body = json_encode($data_hash);
        $curl_options[CURLOPT_POSTFIELDS] = $body;
      } else {
        $curl_options[CURLOPT_POSTFIELDS] = '';
      }
    }

    curl_setopt_array($ch, $curl_options);

    $result = curl_exec($ch);


    if ($result === FALSE) {
      throw new Exception('CURL Error: ' . curl_error($ch), curl_errno($ch));
    }
    else {
      try {
        $result_array = json_decode($result);
      } catch (Exception $e) {
        throw new Exception("API Request Error unable to json_decode API response: ".$result . ' | Request url: '.$url);
      }
      if (!in_array($result_array->status_code, array(200, 201, 202, 407))) {
        $message = 'Veritrans Error (' . $result_array->status_code . '): '
            . $result_array->status_message;
        if (isset($result_array->validation_messages)){
            $message .= '. Validation Messages (' . implode(", ", $result_array->validation_messages) . ')';
        }
        if (isset($result_array->error_messages)){
            $message .= '. Error Messages (' . implode(", ", $result_array->error_messages) . ')';
        }
        throw new Exception($message, $result_array->status_code);
      }
      else {
        return $result_array;
      }
    }
  }