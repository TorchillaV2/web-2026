<?php
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $rawJson = file_get_contents('php://input');
    $requestData = json_decode($rawJson, true);
    
    if ($requestData !== null) {
        $fileName = isset($requestData['name']) ? $requestData['name'] : 'new_image.jpg';
        $encodedImage = isset($requestData['image']) ? $requestData['image'] : null;
        
        if ($encodedImage !== null) {
            $decodedImage = base64_decode($encodedImage);
            
            $savePath = './static/' . $fileName;
            
            file_put_contents($savePath, $decodedImage);
            
            echo 'Картинка сохранена по пути ' . $savePath;
        }
        else {
            echo 'В JSON нет ключа "image" с картинкой';
        }
    }
    else {
        echo 'Неверный формат JSON';
    }
}
else {
    echo 'Разрешены только POST-запросы';
}

?>