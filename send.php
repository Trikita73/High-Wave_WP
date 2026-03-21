<?php
require_once 'env.php';
loadEnv(__DIR__ . '/.env');

$token = $_ENV['TELEGRAM_TOKEN'];
$chat_id = $_ENV['TELEGRAM_CHAT_ID'];

// --- БЛОК ЛОГИРОВАНИЯ ---
$log_file = __DIR__ . '/debug.log';
$log_data = "--- " . date("Y-m-d H:i:s") . " ---\n";
$log_data .= "Method: " . $_SERVER['REQUEST_METHOD'] . "\n";
$log_data .= "POST Data: " . print_r($_POST, true) . "\n";
$log_data .= "Raw Input: " . file_get_contents('php://input') . "\n";
file_put_contents($log_file, $log_data, FILE_APPEND);
// ------------------------

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = strip_tags(trim($_POST["name"] ?? 'Пусто'));
    $email = strip_tags(trim($_POST["email"] ?? 'Пусто'));
    $message = strip_tags(trim($_POST["message"] ?? 'Пусто'));

    $text = "<b>Новая заявка с сайта!</b>\n";
    $text .= "<b>Имя:</b> " . $name . "\n";
    $text .= "<b>Email:</b> " . $email . "\n";
    $text .= "<b>Сообщение:</b> " . $message;

    $data = [
        'chat_id' => $chat_id,
        'text' => $text,
        'parse_mode' => 'html'
    ];

    $ch = curl_init("https://api.telegram.org/bot{$token}/sendMessage");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        $resArray = json_decode($response, true);
        if ($resArray['ok'] === true) {
            echo "success";
        } else {
            echo "Telegram Error: " . $resArray['description'];
        }
    } else {
        echo "cURL Error";
    }
}