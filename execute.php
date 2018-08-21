<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

$token = "";
$api="";

if(!$update)
{
  exit;
}

//inizio programma





$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$userId = isset($message['user']['id']) ? $message['user']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);

$messaggio = "chat: " . $chatId . "user: ". $userId;
sendmess($chatId, $messaggio);


function sendmess($chat,$testo)
{
	$url = $GLOBALS[api]."/sendmessage?chat_id=" . $chat . "&text=" . urlencode($testo);
	file_get_contents($url);
}
