<?php

function getDigitWord(int $digit): string {
    $words = [
        0 => 'Ноль',
        1 => 'Один',
        2 => 'Два',
        3 => 'Три',
        4 => 'Четыре',
        5 => 'Пять',
        6 => 'Шесть',
        7 => 'Семь',
        8 => 'Восемь',
        9 => 'Девять',
    ];

    if ($digit >= 0 && $digit <= 9) {
        return $words[$digit];
    }
    
    else {
        return 'Ошибка: введена не цифра';
    }
}

$inputDigit = isset($_POST['digit']) ? (int) $_POST['digit'] : null;
$resultMessage = null;

if ($inputDigit !== null) {
    $resultMessage = getDigitWord($inputDigit);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Цифра в слово</title>
</head>
<body>
    <form method="POST" action="task2.php">
        <label for="digit">Введите цифру (от 0 до 9):</label>
        <input type="number" name="digit" id="digit" min="0" max="9" required>
        <button type="submit">Перевести</button>
    </form>

    <?php
    if ($resultMessage !== null) {
        echo '<p>Выходные данные: ' . $resultMessage . '</p>';
    }
    ?>
</body>
</html>