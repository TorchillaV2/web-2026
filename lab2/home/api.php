<?php
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Разрешены только POST-запросы']);
    exit;
}

$jsonData = isset($_POST['postData']) ? $_POST['postData'] : null;
$data = json_decode($jsonData, true);

if (!$data || !isset($data['content']) || !isset($data['authorId']) || !isset($data['likesCount'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Нужны authorId, content и likesCount в JSON']);
    exit;
}

// Подключаемся к БД
$db = new mysqli('127.0.0.1', 'root', '1One.Five.Fifteen15', 'blog1');
$db->set_charset("utf8mb4");

// 1. Сначала создаем сам пост (без картинок)
$sql = "INSERT INTO post (authorId, content, likesCount) VALUES (?, ?, ?)";
$stmt = $db->prepare($sql);
$stmt->bind_param("isi", $data['authorId'], $data['content'], $data['likesCount']);

if (!$stmt->execute()) {
    http_response_code(500);
    echo json_encode(['error' => 'Ошибка базы данных при создании поста: ' . $db->error]);
    exit;
}

$newPostId = $db->insert_id; // Получаем ID только что созданного поста
$stmt->close();

// 2. Теперь разбираемся с картинками
$dir = 'images/';
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

// Проверяем, пришли ли файлы с ключом images
if (isset($_FILES['images'])) {
    $totalFiles = count($_FILES['images']['name']);
    
    for ($i = 0; $i < $totalFiles; $i++) {
        if ($_FILES['images']['error'][$i] === UPLOAD_ERR_OK) {
            $extension = pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION);
            // Делаем уникальное имя с добавлением порядкового номера $i
            $safeName = time() . '_' . $i . '_post.' . $extension;
            $path = $dir . $safeName;
            
            if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $path)) {
                // Записываем путь к картинке в новую таблицу
                $sqlImage = "INSERT INTO post_image (postId, imageUrl) VALUES (?, ?)";
                $stmtImg = $db->prepare($sqlImage);
                $stmtImg->bind_param("is", $newPostId, $path);
                $stmtImg->execute();
                $stmtImg->close();
            }
        }
    }
}

$db->close();

http_response_code(201);
echo json_encode([
    'status' => 'success',
    'message' => 'Новый пост с картинками успешно добавлен!',
    'postId' => $newPostId
]);
?>