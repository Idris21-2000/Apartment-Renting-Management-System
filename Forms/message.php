<?php
require_once "../includes/config_session.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/comment.css">
    <link rel="stylesheet" href="../css/reg-form.css">
    <title>Document</title>
</head>

<body>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <div class="navbar">
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><button onclick="goBack()">Back</button></li>
        </ul>
    </div><br><br><br>
    <h1>Tenant messaging portal</h1>
    <br>
    <?php
    require_once "../includes/dbh.inc.php";
    require_once "../includes/models/message_model.inc.php";
    $messages = get_messages($pdo);
    ?>
    <div class="message-form">
        <form action="../includes/message.inc.php" method="post">
            <br>
            <?php foreach ($messages as $message) : ?>
                <section class="<?php echo $message['user_type'] === 'tenant' ? 'text-sent' : 'text-received'; ?>">
                    <p class="para-design">
                        <?php echo ucfirst($message['username']); ?>: <?php echo htmlspecialchars($message['comments']); ?>
                    </p>
                </section><br><br><br>
            <?php endforeach; ?>
            <textarea name="comment_section" rows="1" cols="50" required placeholder="Write your comments or complaints here...."></textarea>
            <br><br>
            <button type="submit" name="submit">Send message</button>
        </form>
    </div>
</body>

</html>