<?php

function calculateFactorial(int $number): int {
    if ($number <= 1) {
        return 1;
    }
    else {
        return $number * calculateFactorial($number - 1);
    }
}

$inputNumber = isset($_POST['number']) ? (int) $_POST['number'] : null;
$resultFactorial = null;

if ($inputNumber !== null) {
    if ($inputNumber >= 0) {
        $resultFactorial = calculateFactorial($inputNumber);
    }
    else {
        $resultFactorial = -1;
    }
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Факториал</title>
</head>
<body>
    <form method="POST" action="task5.php">
        <label for="number">Введите число для факториала:</label>
        <input type="number" name="number" id="number" min="0" required>
        <button type="submit">Вычислить</button>
    </form>

    <?php
    if ($resultFactorial !== null) {
        if ($resultFactorial >= 0) {
            echo '<p>Выходные данные ' . $resultFactorial . '</p>';
        }
        else {
            echo '<p>Ошибка: введено отрицательное число</p>';
        }
    }
    ?>
</body>
</html>