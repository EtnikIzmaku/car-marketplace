<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 1) {
    header("Location: ../login.php");
    exit;
}

include '../backend/Database.php';
$db = new Database();
$conn = $db->getConnection();

$message_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($message_id > 0) {
    try {

        $stmt = $conn->prepare("DELETE FROM messages WHERE id = :id");
        $stmt->bindParam(':id', $message_id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: messages.php?deleted=1");
        exit;
    } catch (PDOException $e) {

        header("Location: messages.php?error=" . urlencode("Gabim gjatë fshirjes së mesazhit: " . $e->getMessage()));
        exit;
    }
} else {
    header("Location: messages.php?error=" . urlencode("ID e mesazhit jo valid"));
    exit;
}
?>

