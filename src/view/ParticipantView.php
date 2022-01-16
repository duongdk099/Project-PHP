<?php
/**
 * Created by PhpStorm.
 * User: canals5
 * Date: 07/12/2020
 * Time: 14:36
 */

namespace wish\view;


class ParticipantView {

    private $data;


    public function __construct(array $data) {

        $this->data = $data;

    }

    private function unItemHtml( \wish\models\Item $item): string {

        $html = <<<END
            <section class="content">
            <h3>{$item->nom}</h3>
            <p>{$item->descr}</p>
            <h4>tarif : {$item->tarif}</h4>
            <img src="img/animateur.jpg">
</section>
END;
        return $html;


    }

    public function render(array $vars) {

        $content = $this->unItemHtml($this->data[0]);

        $html= <<<END
        <!DOCTYPE html>
        <head>
        <link rel="stylesheet" href="{$vars['basepath']}/wish.css"
        </head>
        <body>
        
           $content
</body>
END;

        return $html;



    }

}