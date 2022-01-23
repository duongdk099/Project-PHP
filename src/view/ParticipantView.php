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
            <img src="\src\img\{$item->img}" alt="{$item->img}">
            
</section>
END;
        return $html;


    }

    public function ItemHTML( \wish\models\Item $item): string{
        return '
        <h3>'.$item->nom.'</h3>
            <p>'.$item->descr.'</p>
            <h4>tarif : '.$item->tarif.'</h4>';
            
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

    public static function createViewImage(){
        return 
        '<div id="NewHome">
            <form action="" method="GET">
            <textarea name="URL_To_Image" cols="20" rows="1" placeholder="URL To Image : "></textarea>
            <br>
            <input type="submit" name="showImageByID" value="Show Image">
            </form>
        </div>';
    }

    public static function createListePage(){
        return 
        '<div id="NewHome">
            <form action="" method="GET">
                <textarea name="Token" cols="20" rows="1" placeholder="Token : "></textarea>
                <br>
                <input type="submit" name="showListeByToken" value="Show Liste">

            </form>
        </div>';
    }

    public static function createListe(){
        return 
        '<div id="NewHome">
            <form action="" method="GET">
            <textarea name="titre" cols="20" rows="1" placeholder="titre : "></textarea>
            <br>
            <textarea name="description" cols="20" rows="1" placeholder="description : "></textarea>
            <br>
            <textarea name="expiration" cols="20" rows="1" placeholder="expiration : "></textarea>
            <br>
            <input type="submit" name="Create" value="Create Liste">
            </form>
        </div>';
    }

}