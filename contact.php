<?php
include 'backend/Message.php';

$messageObj = new Message();

$success_message = '';
$error_message = '';

if (isset($_GET['success']) && $_GET['success'] == 1) {
    $success_message = "Mesazhi juaj u dërgua me sukses!";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($name) || empty($email) || empty($message)) {
        $error_message = "Të gjitha fushat duhen të plotësohen!";
    } elseif (strlen($name) < 3) {
        $error_message = "Emri duhet të ketë të paktën 3 shkronja!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Email jo valid!";
    } elseif (strlen($message) < 10) {
        $error_message = "Mesazhi duhet të ketë të paktën 10 karaktere!";
    } else {
        $result = $messageObj->addMessage($name, $email, $message);
        
        if ($result) {
            header("Location: contact.php?success=1");
            exit;
        } else {
            $error_message = "Ndodhi një gabim gjatë ruajtjes së mesazhit.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | BLITZ Auto Market</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <section class="contact-section">
        <h1>Contact Us</h1>
        <p>Have questions? Get in touch with us.</p>

        <?php if ($success_message): ?>
            <p style='color:green; text-align:center; padding: 10px;'><?php echo htmlspecialchars($success_message); ?></p>
        <?php endif; ?>

        <?php if ($error_message): ?>
            <p style='color:red; text-align:center; padding: 10px;'><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>

        <form id="contactForm" class="contact-form" method="POST" action="" novalidate>
            <input type="text" id="name" name="name" placeholder="Your Name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" required>
            <input type="email" id="email" name="email" placeholder="Your Email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
            <textarea id="message" name="message" placeholder="Your Message" required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
        
            <button type="submit" name="send_message">Send Message</button>
        </form>

    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="js/contact.js"></script>
    <script src="js/cars.js"></script>

</body>
</html>