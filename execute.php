<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

$token = "610084141:AAGcMMfHzHWx7v0Ru8Y_CZqc6-aHz3mrhEg";
$api="https://api.telegram.org/bot".$token;

if(!$update)
{
  exit;
}


function sendmess($chat,$testo)
{
	$url = $GLOBALS[api]."/sendmessage?chat_id=" . $chat . "&text=" . urlencode($testo);
	file_get_contents($url);
}

//inizio programma





$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$userId = isset($message['from']['id']) ? $message['from']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);

$messaggio = json_encode($message, JSON_PRETTY_PRINT);
sendmess($chatId, $messaggio);


