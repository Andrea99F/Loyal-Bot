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
$firstname = isset($message['from']['first_name']) ? $message['from']['first_name'] : "";
$lastname = isset($message['from']['last_name']) ? $message['from']['last_name'] : "";
$username = isset($message['from']['username']) ? $message['from']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);

if ($text==="/start"){
	$messaggio = "write /start to know what I can do \n write \report + a text to send a message to developers \n write /info to know what bot recive";
	sendmess($chatId, $messaggio);
} 
if ($text==="/info"){
	$messaggio = json_encode($message, JSON_PRETTY_PRINT);
	sendmess($chatId, $messaggio);
} 
if (strstr($text,"/report")===0){
	sendmess($chatId, "report sent");
	sendmess("420118798", $text);
} 
