<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 1) {
    header("Location: login.php");
    exit;
}

include '../backend/Database.php';
$db = new Database();
$conn = $db->getConnection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesazhet | Admin Panel</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="/car-marketplace/css/style.css">
</head>
<body>

<?php include 'includes/admin_header.php'; ?>

<div class="dashboard-container">
    <?php include 'includes/admin_sidebar.php'; ?>

    <main class="dashboard-content">
        <h2>Mesazhet e përdoruesve</h2>
        
        <?php
        if (isset($_GET['deleted']) && $_GET['deleted'] == 1) {
            echo '<p style="color:green; padding: 10px; background: #d4edda; border-radius: 6px; margin-bottom: 15px;">Mesazhi u fshi me sukses!</p>';
        }
        
        if (isset($_GET['error'])) {
            echo '<p style="color:red; padding: 10px; background: #f8d7da; border-radius: 6px; margin-bottom: 15px;">' . htmlspecialchars($_GET['error']) . '</p>';
        }
        ?>
        
        <?php
        try {
            $stmt = $conn->query("SELECT * FROM messages ORDER BY created_at DESC");
            $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($messages) > 0) {
                echo '<table class="admin-table">';
                echo '<tr>
                        <th>ID</th>
                        <th>Emri</th>
                        <th>Email</th>
                        <th>Mesazhi</th>
                        <th>Dërguar më</th>
                        <th>Veprime</th>
                      </tr>';
                foreach ($messages as $row) {
                    echo '<tr>';
                    echo '<td>'. htmlspecialchars($row['id']) .'</td>';
                    echo '<td>'. htmlspecialchars($row['name']) .'</td>';
                    echo '<td>'. htmlspecialchars($row['email']) .'</td>';
                    echo '<td>'. nl2br(htmlspecialchars($row['message'])) .'</td>';
                    echo '<td>'. htmlspecialchars($row['created_at']) .'</td>';
                    echo '<td>
                            <a href="delete_message.php?id='. urlencode($row['id']) .'" onclick="return confirm(\'A jeni të sigurt që doni ta fshini?\')">Fshi</a>
                          </td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '<p>Nuk ka mesazhe të regjistruara.</p>';
            }
        } catch (PDOException $e) {
            echo '<p style="color:red;">Gabim gjatë marrjes së mesazheve: ' . htmlspecialchars($e->getMessage()) . '</p>';
        }
        ?>
    </main>
</div>

<?php include '../includes/footer.php'; ?>
</body>
</html>
