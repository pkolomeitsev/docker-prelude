<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$to = 'pong@mailhog.local';
$from = 'ping@mailhog.local';
$cc = 'pinpongcc@mailhog.local';
$subject = 'Hey, I\'m MailHog test! ' . time();
$body = 'Hello, MailHog world!';

# from PHP 7.2.0 compatible
$headers = [
    'From' => sprintf('sender <%s>', $from),
    'Cc' =>  sprintf('cc <%s>', $cc),
    'X-Mailer' => 'PHP/' . phpversion(),
    'MIME-Version' => '1.0',
    'Content-Type' => 'text/html; charset=UTF-8'
];

if (mail($to, $subject, $body, $headers)) {
    echo "SUCCESS";
} else {
    echo "ERROR";
}