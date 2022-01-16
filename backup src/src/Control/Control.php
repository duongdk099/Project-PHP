<?php
namespace wish\control;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use wish\models\Item;
use wish\view\ParticipantView;
class Control{

    private $c = null;

    public function __construct(\Slim\Container $c) {

        $this->c = $c;
    }

    public function displayItem(Request $rq, Response $rs, array $args):Response {

        try {
            $item = Item::query()->where('id', '=', $args['id'])
                ->firstOrFail();
            $htmlvars = [
                'basepath'=> $rq->getUri()->getBasePath()
            ];

            $v = new ParticipantView([$item]);
            $rs->getBody()->write( $v->render( $htmlvars ) );
            return $rs;

        } catch (ModelNotFoundException $e) {

            $rs->getBody()->write("item {$item->id} non trouvé");
            return $rs;

        }

    }

}


?>