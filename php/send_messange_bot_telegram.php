<?php


    $query_message = "SELECT * FROM system ";  
    $result_message = mysqli_query($connect, $query_message);  
    $row_message = mysqli_fetch_array($result_message);  

    //$apiToken = "1251355437:AAElMMZ1XR7nS2CerqCNxQp0vXeMOZR8g5E";
    $apiToken = $row_message['token_bot'];
    $data = [
      //  'chat_id' => '838018807',
        'chat_id' => $row_message['chat_id'],
        'text' => $string
    ];
    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data));


    
 





?>