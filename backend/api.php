<?php

header('Content-Type: application/json');

$host = getenv('DB_HOST');
$dbname = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');

$connected = false;
$conn = null;

for ($i = 0; $i < 3; $i++) {

    $conn = new mysqli($host, $user, $pass, $dbname);

    if (!$conn->connect_error) {
        $connected = true;
        break;
    }

    sleep(2);
}

if (!$connected) {
    echo json_encode([
        "status" => "error",
        "message" => "Database connection failed"
    ]);
    exit;
}

echo json_encode([
    "status" => "success",
    "message" => "Connected to MySQL successfully",
    "reg_id" => "REG12345"
]);

?>
