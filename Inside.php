<?php
require_once 'vendor/autoload.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use wish\view\ParticipantView as ViewPage;
include_once 'src/control/ControlListe.php';
include_once 'src/control/ControlCreateListe.php';
use ControlListe as cL;
use ControlCreateListe as ccL;
// Container nécessaire
$c=new \Slim\Container([ 'settings'=>['displayErrorDetails' => true]]);
$app = new \Slim\App($c);

\wish\bd\Eloquent::start(__DIR__ . '/src/conf/conf.ini');


if (isset($_GET['changeSource'])) {
    # code...
    echo "Hello ". $_GET['New_Source']. '   ID : '.$_GET['ID'];
}

$app->get('[/]', function(Request $rq, Response $rs, array $args) {

    $rs->getBody()->write("<h1>Page Accueil application wishlist</h1>
    \n
    <a href='ListePage'>Clicked To Liste Page</a>
    <br>
    <a href='Create_Liste'>Clicked To Create Liste</a>
    ");

    return $rs;
}) ;

$app->get('/ListePage', function(Request $rq, Response $rs, array $args): Response {
    $rs->getBody()->write(ViewPage::createListePage()); 
    cL::showListe();
    return $rs;
})->setName('ListePage');

$app->get('/Create_Liste', function(Request $rq, Response $rs, array $args): Response {
    $rs->getBody()->write(ViewPage::createListe()); 
    ccL::check();
    return $rs;
})->setName('Create_Liste');

// $app->get('/uploadItem', function(Request $rq, Response $rs, array $args): Response {
//     $rs->getBody()->write
//     (
//     '<div id="NewHome">
//     <form action="" method="GET">
//         <textarea name="IDToDo" cols="20" rows="1" placeholder="ID : "></textarea>
//         <br>
//         <input type="submit" name="show_ID" value="Show Item">
//     </form>
//     </div>'
//     );
//     CIt::showItem();
//     return $rs;
// })->setName('uploadItem');



// $app->get('/items/{id}', function(Request $rq, Response $rs, array $args): Response {
//     $c = new \wish\control\ParticipantController($this);
//     return $c->displayItem($rq,$rs,$args);

// })->setName('item');

// $app->get('/lists[/]', function(Request $rq, Response $rs, array $args) {

//     $rs->getBody()->write("affichage de la liste les listes");
//     return $rs;
// }) ;

// $app->get('/lists/{id}/items', function(Request $rq, Response $rs, array $args) {

//     $rs->getBody()->write("affichage des items de la liste {$args['id']}");
//     return $rs;
// }) ;

// $app->get('/changeAdresse',function(Request $rq, Response $rs, array $args) {

//     $rs->getBody()->write("affichage des items de la liste ". $_GET['ID']." Et avec src : ".$_GET['New_Source']);
//     return $rs;
// }) ;


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

