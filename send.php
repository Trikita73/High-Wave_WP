<?php 

require_once 'env.php';

loadEnv(__DIR__ . '/.env');

// Telegram Bot API Token and Chat ID
$token =  $_ENV['TELEGRAM_TOKEN'];
$chat_id = $_ENV['TELEGRAM_CHAT_ID'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Собираем данные и очищаем их
    $name = strip_tags(trim($_POST["name"]));
    $email = strip_tags(trim($_POST["email"]));
    $message = strip_tags(trim($_POST["message"]));

    // Формируем текст сообщения
    $text = "<b>Новая заявка с сайта!</b>\n";
    $text .= "<b>Имя:</b> " . $name . "\n";
    $text .= "<b>Email:</b> " . $email . "\n";
    $text .= "<b>Сообщение:</b> " . $message;

    // Параметры для запроса к Telegram
    $data = [
        'chat_id' => $chat_id,
        'text' => $text,
        'parse_mode' => 'html'
    ];

    // Инициализируем cURL (это надежнее, чем fopen)
    $ch = curl_init("https://api.telegram.org/bot{$token}/sendMessage");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // Сами кодируем данные
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Игнорируем проблемы с SSL на локалке

    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    if ($response) {
        $resArray = json_decode($response, true);
        if ($resArray['ok'] === true) {
            echo "success";
        } else {
            // Если Telegram вернул ошибку (например, неверный ID или Токен)
            echo "Telegram Error: " . $resArray['description'];
        }
    } else {
        // Если cURL вообще не смог отправить запрос (проблемы с интернетом/сервером)
        echo "cURL Error: " . $error;
    }
}
?>