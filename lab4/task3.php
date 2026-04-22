<?php

function getZodiacSign(string $dateString): string {
    $dayStr = $dateString[0] . $dateString[1];
    $monthStr = $dateString[3] . $dateString[4];
    $day = (int) $dayStr;
    $month = (int) $monthStr;
    
    if ($month === 1) {
        if ($day <= 20) {
            return 'Козерог';
        }
        return 'Водолей';
    }
    
    if ($month === 2) {
        if ($day <= 19) {
            return 'Водолей';
        }
        else {
            return 'Рыбы';
        }
    }
    
    if ($month === 3) {
        if ($day <= 20) {
            return 'Рыбы';
        }
        else {
            return 'Овен';
        }
    }
    
    if ($month === 4) {
        if ($day <= 20) {
            return 'Овен';
        }
        else {
            return 'Телец';
        }
    }
    
    if ($month === 5) {
        if ($day <= 21) {
            return 'Телец';
        }
        else {
            return 'Близнецы';
        }
    }
    
    if ($month === 6) {
        if ($day <= 21) {
            return 'Близнецы';
        }
        else {
            return 'Рак';
        }
    }
    
    if ($month === 7) {
        if ($day <= 22) {
            return 'Рак';
        }
        else {
            return 'Лев';
        }
    }
    
    if ($month === 8) {
        if ($day <= 21) {
            return 'Лев';
        }
        else {
            return 'Дева';
        }
    }
    
    if ($month === 9) {
        if ($day <= 23) {
            return 'Дева';
        }
        else {
            return 'Весы';
        }
    }
    
    if ($month === 10) {
        if ($day <= 23) {
            return 'Весы';
        }
        else {
            return 'Скорпион';
        }
    }
    
    if ($month === 11) {
        if ($day <= 22) {
            return 'Скорпион';
        }
        else {
            return 'Стрелец';
        }
    }
    
    if ($month === 12) {
        if ($day <= 22) {
            return 'Стрелец';
        }
        else {
            return 'Козерог';
        }
    }
    
    return 'Неизвестный формат даты';
}

$inputDate = isset($_POST['date']) ? $_POST['date'] : null;
$resultSign = null;

if ($inputDate !== null) {
    $resultSign = getZodiacSign($inputDate);
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Знак зодиака</title>
</head>
<body>
    <form method="POST" action="task3.php">
        <label for="date">Введите дату (ДД.ММ.ГГГГ):</label>
        <input type="text" name="date" id="date" placeholder="15.04.1452" required>
        <button type="submit">Узнать знак</button>
    </form>

    <?php
    if ($resultSign !== null) {
        echo '<p>Выходные данные: ' . $resultSign . '</p>';
    }
    ?>
</body>
</html>