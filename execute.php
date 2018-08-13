<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
  exit;
}


function messaggio($risp, $Id){
header("Content-Type: application/json");
$parameters = array('chat_id' => $Id, "text" => $risp);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
}

function traduci($testo,$target,$Id){
  
$string = $testo;
$data = file_get_contents('http://www.example.com/'/*.urlencode($string)*/);
if (is_null($data)) { messaggio("errore 1", $Id);}
$data = json_decode($data);
if (is_null($data)) { messaggio("errore 2", $Id);}
return $data;
  
}



//inizio programma





$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";

$text = trim($text);

//$text = strtolower($text);

$text = traduci($text, "en", $chatId);
messaggio($text, $chatId);
/*


if (strpos($text, "/tr")===0 ){
  $text = str_replace("/tr", "", $text);
  $text = traduci($text, "en");
  messaggio($text, $chatId);
} else { 
  messaggio("error", $chatId);
}

*/
	

