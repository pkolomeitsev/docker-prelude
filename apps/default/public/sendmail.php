<?php require_once '../src/lib/func.php'; ?>
<!DOCTYPE html>
<html lang="en">
<body>
<form method="get">
    <input type="hidden" name="sendmail" value="1"/>
    <input type="submit" value="Send e-mail!">
</form>
<p>
    <?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $to = 'pong@mailhog.local';
    $from = 'ping@mailhog.local';
    $cc = 'pinpongcc@mailhog.local';
    $subject = 'Hey, I\'m MailHog test! ' . time();
    $body = 'Hello, MailHog world!';

    # from PHP 7.2+ compatible
    $headers = [
        'From' => sprintf('sender <%s>', $from),
        'Cc' => sprintf('cc <%s>', $cc),
        'X-Mailer' => 'PHP/' . phpversion(),
        'MIME-Version' => '1.0',
        'Content-Type' => 'text/html; charset=UTF-8'
    ];

    if (!empty($_GET['sendmail'])) {
        echo (mail($to, $subject, $body, $headers))
            ? "SUCCESS"
            : "ERROR";
    }

    ?>
</p>
<p>
    <?php $mailHogLink = getAppList()['MailHog'] ?? '#fixme'; ?>
    Check result -> <a href="<?php echo $mailHogLink; ?>" target="_blank">MailHog</a>
</p>
</body>
</html>
