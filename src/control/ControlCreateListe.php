<?php
// namespace wish\control;

use wish\bd\ConnectionFactory;

// include "./src/bd/ConnectionFactory.php";
class ControlCreateListe
{
    public static function check(){
        // To create a liste
        if (isset($_GET['Create'])) {
            # code...
            $titre = $_GET['titre'];
            $des = $_GET['description'];
            $date = $_GET['expiration'];

            if (self::interdireBalises($titre)==false) {
                # code...
                echo "refaire";
            }elseif (self::interdireBalises($des)==false) {
                # code...
                echo "refaire";
            }elseif (self::interdireBalises($date)==false) {
                # code...
                echo "refaire";
            }
            else{
                self::CreateNewListe($titre,$des,$date);
            }
        }
    }

    public static function interdireBalises($var){
        if (strpos($var,'<') !== false) {
            # code...
            return false;
        }elseif(strpos($var,'/>') !== false){
            return false;
        }elseif(strlen($var)==0){
            return false;
        }
        else{
            return true;
        }
    }

    public static function CreateNewListe($titre,$des,$date){
        $db = ConnectionFactory::callAuto();
        $token = bin2hex(openssl_random_pseudo_bytes(4));
        $query = "INSERT INTO `liste`( `titre`, `description`, `expiration`, `token`) VALUES ('".$titre."','".$des."','".$date."','".$token."');";
        $st = $db->prepare($query);
        $st->execute();
    }

    public static function Changed($titre,$des,$date, $id){
        $db = ConnectionFactory::callAuto();
        $query = "UPDATE  `liste`  SET titre =  '" . $titre . "' where id =" . $id . ";";
        $st = $db->prepare($query);
        $st->execute();

        $query = "UPDATE  `liste`  SET description =  '" . $des . "' where id =" . $id . ";";
        $st = $db->prepare($query);
        $st->execute();

        $query = "UPDATE  `liste`  SET expiration =  '" . $date . "' where id =" . $id . ";";
        $st = $db->prepare($query);
        $st->execute();
    }


}
