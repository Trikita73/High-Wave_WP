<?php
function loadEnv($path) {
    if (!file_exists($path)) return;

    // Читаем файл в массив строк
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) { // Исправлено: $lines
        $line = trim($line);
        
        // Пропускаем пустые строки и комментарии
        if (empty($line) || str_starts_with($line, '#')) { // Исправлено: str_starts_with
            continue;
        }

        // Разбиваем строку по первому символу "="
        if (strpos($line, '=') !== false) {
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);
            
            // Убираем кавычки
            $value = trim($value, "\"'");

            $_ENV[$name] = $value;
            $_SERVER[$name] = $value; // Для надежности добавляем и сюда
            putenv("$name=$value");
        }
    }
}