<?php
require_once 'vendor/autoload.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Container nécessaire
$c=new \Slim\Container([ 'settings'=>['displayErrorDetails' => true]]);
$app = new \Slim\App($c);

\wish\bd\Eloquent::start(__DIR__ . '/src/conf/conf.ini');

$app->get('[/]', function(Request $rq, Response $rs, array $args) {

    $rs->getBody()->write("<h1>Page Accueil application wishlist</h1>");
    return $rs;
}) ;

$app->get('/items/{id}', function(Request $rq, Response $rs, array $args): Response {
    $c = new \wish\control\ParticipantController($this);
    return $c->displayItem($rq,$rs,$args);

})->setName('item');

$app->get('/lists[/]', function(Request $rq, Response $rs, array $args) {

    $rs->getBody()->write("affichage de la liste les listes");
    return $rs;
}) ;

$app->get('/lists/{id}/items', function(Request $rq, Response $rs, array $args) {

    $rs->getBody()->write("affichage des items de la liste {$args['id']}");
    return $rs;
}) ;

$app->run();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>