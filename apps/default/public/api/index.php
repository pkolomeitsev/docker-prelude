<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

use App\Builders\ConfigBuilder;

require __DIR__ . '/../../vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath('/api');

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->get('/config', function (Request $request, Response $response, $args) {
    $projectRoot = __DIR__ . '/../../../';
    $response->getBody()->write(json_encode([
        'config' => ConfigBuilder::build($projectRoot)
    ]));
    return $response;
});

$app->post('/send-email', function (Request $request, Response $response, $args) {
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

    sleep(1); // anti-DDos :)

    $response->getBody()->write((mail($to, $subject, $body, $headers))
        ? json_encode(['success' => 200, 'msg' => 'Test e-mail message was successfully send'])
        : json_encode(['error' => 500, 'msg' => "Send test e-mail message failed!"])
    );

    return $response;

});

$app->run();