<?php
// namespace wish\control;

use wish\bd\ConnectionFactory;
include_once 'ControlItem.php';
// include "./src/bd/ConnectionFactory.php";
class ControlListe
{
    public static function showListe()
    {
        if (isset($_GET['showListeByNum'])) {
            # code...
            $id = $_GET['Num_Liste'];
            self::show($id);
        }
        if (isset($_GET['showListeAll'])) {
            # code...
            self::showAll();
        }
    }

    public static function changedImage(){
        if (isset($_GET[''])) {
            # code...
        }
    }


    public static function show($no)
    {
        $db = ConnectionFactory::callAuto();
        $query = "SELECT * from liste WHERE no =$no";
        $st = $db->prepare($query);
        $st->execute();
        $row = $st->fetch(PDO::FETCH_ASSOC);
        if ($row== null) {
            # code...
            echo "Not found";
        }
        else{
# code...
echo "<p name='numero'> ID : " . $row["no"] . "</p>";
echo "<p> User_ID : " . $row["user_id"] . "</p>";
echo "<p>Titre : " . $row["titre"] . "</p>";
echo "<p>Description : " . $row["description"] . "</p>";
echo "<p>Date Expiration : " . $row["expiration"] . "</p>";
echo "<p>Token : " . $row["token"] . "</p>";
        }
                
    }

    public static function showAll(){
        $db = ConnectionFactory::callAuto();
        $query = "SELECT * from liste ";
        $st = $db->prepare($query);
        $st->execute();
        foreach ($st->fetchAll(PDO::FETCH_NUM) as $row){
                echo "<p name='numero'> ID : " . $row[0] . "</p>";
                echo "<p> User_ID : " . $row[1] . "</p>";
                echo "<p>Titre : " . $row[2] . "</p>";
                echo "<p>Description : " . $row[3] . "</p>";
                echo "<p>Date Expiration : " . $row[4] . "</p>";
                echo "<p>Token : " . $row[5] . "</p>";
                echo "<p>Les items qui ont le lien avec celui : <p>";
                ControlItem::showByListeID($row[1]);
        }       
    }
}
