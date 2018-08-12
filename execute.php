<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
  exit;
}

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
$IDdestinatario = $chatId;
$risposta = $text;


if($text == "/start")
{
	$risposta = "aggiungi";//aggiungi persona all'elenco
}
elseif($text == "/list")
{
	$risposta = "mostra";//mostra lista
}
elseif($text == "/listcancel")
{
    if ($username == "Andrea99F"){
    $risposta = "cancella";//cancella la lista
    }
    else {
    $risposta = "non sei un amministratore";
  } 
}
	

header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => $risposta);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
