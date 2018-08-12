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


function traduci($text,$target="en"){
  
  //api google
  # Includes the autoloader for libraries installed with composer
  require __DIR__ . '/vendor/autoload.php';
  # Imports the Google Cloud client library
  use Google\Cloud\Translate\TranslateClient;
  # Your Google Cloud Platform project ID
  $projectId = 'YOUR_PROJECT_ID';
  # Instantiates a client
  $translate = new TranslateClient([
      'projectId' => $projectId
  ]);
  # The text to translate
  # @ $text = $text;
  # The target language
  # @ $target = $lenguage;
  # Translates some text into Russian
  $translation = $translate->translate($text, [
      'target' => $target
  ]);
  return $translation['text'];
  //fine api google
  
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


$text = strtolower($text);
$IDdestinatario = $chatId;
$risposta = $text . "traduttore 1";







if (strpos(variabile, "/tr")===0 ){
  $risposta = str_replace("/tr", "", $risposta);
  messaggio( traduci($risposta, "en"), $IDdestinatario);
}


	
messaggio($risposta, $IDdestinatario);


