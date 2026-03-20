<?php 

require_once 'env.php';

loadEnv(__DIR__ . '/.env');

// Telegram Bot API Token and Chat ID
$token =  $_ENV['TELEGRAM_TOKEN'];
$chat_id = $_ENV['TELEGRAM_CHAT_ID'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = strip_tags(trim($_POST["email"]));
    $message = strip_tags(trim($_POST["message"]));

    // Prepare the message to send
    $arr = array(
        'New message from Site "High Wave"' => '',
        'Name:' => $name,
        'Email:' => $email,
        'Message:' => $message
    );

    $txt = "";
    foreach($arr as $key => $value) {
        $txt .= "<b>" . $key . "</b> ".$value."%0A";
    };

    // Send the message to Telegram
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

    if ($sendToTelegram) {
        echo "Message sent successfully!";
    } else {
        echo "Error sending message.";  
    }
}

?>