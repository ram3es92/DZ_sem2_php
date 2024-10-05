<?php
// 1. Реализовать основные 4 арифметические операции

function add($a, $b) {
    return $a + $b;
}

function subtract($a, $b) {
    return $a - $b;
}

function multiply($a, $b) {
    return $a * $b;
}

function divide($a, $b) {
    if ($b != 0) {
        return $a / $b;
    } else {
        return "Ошибка: деление на ноль.";
    }
}

// 2. Функция mathOperation

function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case 'сложение':
            return add($arg1, $arg2);
        case 'вычитание':
            return subtract($arg1, $arg2);
        case 'умножение':
            return multiply($arg1, $arg2);
        case 'деление':
            return divide($arg1, $arg2);
        default:
            return "Неизвестная операция.";
    }
}

// Пример использования:
echo "Результат сложения: " . mathOperation(10, 5, 'сложение') . "<br>";
echo "Результат деления: " . mathOperation(10, 5, 'деление') . "<br><br>";

// 3. Массив областей и городов

$regions = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область' => ['Рязань', 'Касимов', 'Сасово'],
];

echo "Список областей и городов:<br>";
foreach ($regions as $region => $cities) {
    echo $region . ": " . implode(', ', $cities) . "<br>";
}
echo "<br>";

// 4. Функция транслитерации строки

$translit = [
    'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z',
    'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r',
    'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch',
    'ы' => 'y', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
];

function transliterate($string, $translit) {
    $string = mb_strtolower($string); // Приводим строку к нижнему регистру
    $result = '';
    for ($i = 0; $i < mb_strlen($string); $i++) {
        $letter = mb_substr($string, $i, 1);
        $result .= isset($translit[$letter]) ? $translit[$letter] : $letter;
    }
    return $result;
}

// Пример использования:
echo "Транслитерация слова 'Привет': " . transliterate("Привет", $translit) . "<br><br>";

// 5. Функция возведения числа в степень (рекурсия)

function power($val, $pow) {
    if ($pow == 0) {
        return 1;
    } elseif ($pow > 0) {
        return $val * power($val, $pow - 1);
    } else {
        return 1 / power($val, -$pow);
    }
}

// Пример использования:
echo "Результат возведения 2 в степень 3: " . power(2, 3) . "<br>";
echo "Результат возведения 2 в степень -3: " . power(2, -3) . "<br><br>";

// 6. Функция для вывода текущего времени с правильными склонениями

function getTimeString($hours, $minutes) {
    // Склонения для часов
    if ($hours % 10 == 1 && $hours != 11) {
        $hourStr = $hours . " час";
    } elseif ($hours % 10 >= 2 && $hours % 10 <= 4 && ($hours < 10 || $hours > 20)) {
        $hourStr = $hours . " часа";
    } else {
        $hourStr = $hours . " часов";
    }

    // Склонения для минут
    if ($minutes % 10 == 1 && $minutes != 11) {
        $minuteStr = $minutes . " минута";
    } elseif ($minutes % 10 >= 2 && $minutes % 10 <= 4 && ($minutes < 10 || $minutes > 20)) {
        $minuteStr = $minutes . " минуты";
    } else {
        $minuteStr = $minutes . " минут";
    }

    return $hourStr . " " . $minuteStr;
}

// Пример использования:
$currentHours = date("H");
$currentMinutes = date("i");

echo "Текущее время: " . getTimeString($currentHours, $currentMinutes) . "<br>";