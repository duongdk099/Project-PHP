<?php
// namespace wish\control;

use wish\bd\ConnectionFactory;

include_once 'ControlItem.php';
include_once 'ControlCreateListe.php';
use ControlCreateListe as CCL;
use ControlItem as CI;
// include "./src/bd/ConnectionFactory.php";
class ControlListe
{
    public static function showListe()
    {
        // Case show Liste by number 
        if (isset($_GET['showListeByToken'])) {
            # code...
            $Token = $_GET['Token'];
                # code...
                self::show($Token);
        }

        // Case delete image
        if (isset($_GET['delete'])) {
            # code...
            self::deleteImage($_GET['IDDelete']);
        }

        // Case Update image
        if (isset($_GET['update'])) {
            # code...
            if (strpos($_GET['src'], "http") === 0) {
                echo "Update OKE";
                self::updateImage();
            } else {
                echo "Not the correct type of link";
            }
        }

        // Case reservation
        if (isset($_GET['reservation'])) {
            echo "This ". $_GET['ID'] ." will be reservé by ". $_GET['id_res'] . "with the text : ". $_GET['text_res'];
            $id = $_GET['ID'];
            $nom = $_GET['id_res'];
            $text = $_GET['text_res'];
            self::reservation($id,$nom,$text);

        }

        // Case access detailler 
        if (isset($_GET['detailler'])) {
            # code...
            $liste_id = $_GET['ID_Detailler'];
            ControlItem::Detailler($liste_id);
        }

        // Case Modification liste
        if (isset($_GET['modification'])) {
            # code...

            
            self::ModificationSection();
            
        }

        if (isset($_GET['Changed'])) {
            # code...
            echo "hello ".$_GET['ID'];
            $id = $_GET['ID_Modif'];
            $titre = $_GET['titre'];
            $des = $_GET['description'];
            $date = $_GET['expiration'];
            
            
            if (CCL::interdireBalises($titre)==false) {
                # code...
                echo "refaire";
            }elseif (CCL::interdireBalises($des)==false) {
                # code...
                echo "refaire";
            }elseif (CCL::interdireBalises($date)==false) {
                # code...
                echo "refaire";
            }
            else{
                CCL::Changed($titre,$des,$date,$id);
            }
        }
        // Case Partager
        if (isset($_GET['partager'])) {
            # code...
            $url = $_GET['text_res'];
            $id = $_GET['ID'];
            CI::partargerURL($url,$id);
        }
    }

    public static function show($Token)
    {
        $db = ConnectionFactory::callAuto();
        $query = "SELECT * from liste WHERE token ='$Token'";
        $st = $db->prepare($query);
        $st->execute();
        $row = $st->fetch(PDO::FETCH_ASSOC);
        if ($row == null) {
            # code...
            echo "Not found";
        } else {
            # code...
            echo "<p name='numero'> ID : " . $row["no"] . "</p>";
            echo "<p> User_ID : " . $row["user_id"] . "</p>";
            echo "<p>Titre : " . $row["titre"] . "</p>";
            echo "<p>Description : " . $row["description"] . "</p>";
            echo "<p>Date Expiration : " . $row["expiration"] . "</p>";
            echo "<p>Token : " . $row["token"] . "</p>";
            echo '
            <div id="Modification">
            <form method="GET" enctype="multipart/form-data">
                <input type="hidden" name="ID_Modif" value =' . $row["no"] . '>
                <input type="submit" name="modification" value="Modifier Cet item">
            </form>
        </div>';
            ControlItem::showByListeID($row["user_id"]);
        }
    }
    public static function updateImage()
    {
        $db = ConnectionFactory::callAuto();

        if ($_GET['src'] != null) {
            // Source Link sur internet
            $src = $_GET['src'];

            $query = "UPDATE  `item`  SET img =  '" . $src . "' where id =" . $_GET['IDUpdate'] . ";";

            $st = $db->prepare($query);
            $st->execute();
        } else {
            echo "Not correct";
        }
    }

    public static function deleteImage($id)
    {
        $db = ConnectionFactory::callAuto();
        $query = "UPDATE  `item`  SET img = '' where id =" . $id . ";";
        $st = $db->prepare($query);
        $st->execute();
    }

    public static function reservation($id,$nom, $text){
        $db = ConnectionFactory::callAuto();
        $query = "UPDATE  `reservation_item`  SET nom_res = '".$nom."' where id_item =" . $id . ";";
        $st = $db->prepare($query);
        $st->execute();

        $query = "UPDATE  `reservation_item`  SET text = '".$text."' where id_item =" . $id . ";";
        $st = $db->prepare($query);
        $st->execute();
    }

    public static function ModificationSection(){
        echo 
        '<div id="Modif">
            <form action="" method="GET">
            <textarea name="titre" cols="20" rows="1" placeholder="titre : "></textarea>
            <br>
            <textarea name="description" cols="20" rows="1" placeholder="description : "></textarea>
            <br>
            <textarea name="expiration" cols="20" rows="1" placeholder="expiration : "></textarea>
            <br>
            <input type="hidden" name="ID" value="'.$_GET['ID_Modif'].'">
            <input type="submit" name="Changed" value="Changed Liste">
            </form>
        </div>';
    }
}
