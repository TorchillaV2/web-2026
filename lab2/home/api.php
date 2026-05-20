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

if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    echo json_encode(['error' => 'Нужно прикрепить фото поста (image)']);
    exit;
}

$dir = 'images/';
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

$postImageName = time() . '_post_' . basename($_FILES['image']['name']);
$postImagePath = $dir . $postImageName;
move_uploaded_file($_FILES['image']['tmp_name'], $postImagePath);

$db = new mysqli('127.0.0.1', 'root', '1One.Five.Fifteen15', 'blog1');
$db->set_charset("utf8mb4");

$sql = "INSERT INTO post (authorId, content, imageUrl, likesCount) VALUES (?, ?, ?, ?)";
$stmt = $db->prepare($sql);

$stmt->bind_param("issi", $data['authorId'], $data['content'], $postImagePath, $data['likesCount']);

if ($stmt->execute()) {
    http_response_code(201);
    echo json_encode([
        'status' => 'success',
        'message' => 'Новый пост успешно добавлен!',
        'postId' => $db->insert_id
    ]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Ошибка базы данных: ' . $db->error]);
}

$stmt->close();
$db->close();
?>