<?php

function isLuckyTicket(int $ticket): bool {
    $digit1 = (int)($ticket / 100000) % 10;
    $digit2 = (int)($ticket / 10000) % 10;
    $digit3 = (int)($ticket / 1000) % 10;
    $digit4 = (int)($ticket / 100) % 10;
    $digit5 = (int)($ticket / 10) % 10;
    $digit6 = (int)($ticket % 10);

    $sum1 = $digit1 + $digit2 + $digit3;
    $sum2 = $digit4 + $digit5 + $digit6;
    
    return $sum1 == $sum2;
}

$start = isset($_POST['start']) ? (int) $_POST['start'] : null;
$end = isset($_POST['end']) ? (int) $_POST['end'] : null;

if ($start !== null && $end !== null && $start <= $end) {
    for ($i = $start; $i <= $end; $i++) { 
        if (isLuckyTicket($i)) { 
            echo $i . '<br>';
        }
    }
}
else {
    echo 'Введите правильный диапазон чисел';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Цифра в слово</title>
</head>
<body>
<form method="post">
    <input type="number" name="start" placeholder="Начальный билет"> 
    <input type="number" name="end" placeholder="Конечный билет">
    <button type="submit">Найти</button>
</form>
</body>
</html>