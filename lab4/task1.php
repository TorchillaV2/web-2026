<?php

function LeapYear(int $year): bool {
    if ($year % 400 === 0) {
        return true;
    }
    
    if ($year % 100 === 0) {
        return false;
    }
    
    if ($year % 4 === 0) {
        return true;
    }
    
    return false;
}

$year = isset($_POST['year']) ? (int) $_POST['year'] : null;
$resultMessage = null;

if ($year !== null) {
    if (LeapYear($year)) {
        $resultMessage = 'YES';
    }

    else {
        $resultMessage = 'NO';
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Високосный год</title>
</head>
<body>
    <form method="POST" action="task1.php">
        <label for="year">Введите год (до 30000):</label>
        <input type="number" name="year" id="year" min="1" max="30000" required>
        <button type="submit">Проверить</button>
    </form>

    <?php
    if ($resultMessage !== null) {
        echo '<p>Результат: ' . $resultMessage . '</p>';
    }
    ?>
</body>
</html>