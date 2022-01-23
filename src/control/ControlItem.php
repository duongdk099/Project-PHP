<?php
// namespace wish\control;

use wish\bd\ConnectionFactory;

// include "./src/bd/ConnectionFactory.php";
class ControlItem
{
    public static function showItem()
    {
        if (isset($_GET['show_ID'])) {
            # code...
            $id = $_GET['IDToDo'];
            if (is_numeric($id) == 1) {
                # code...
                self::show($id);
            }
            else{
                echo "It must be a number";
            }
            
        }
    }

    public static function changedImage(){
        if (isset($_GET[''])) {
            # code...
        }
    }


    public static function show($id)
    {
        $db = ConnectionFactory::callAuto();
        $query = "SELECT * from item WHERE id =$id";
        $st = $db->prepare($query);
        $st->execute();
        $row = $st->fetch(PDO::FETCH_ASSOC);
                # code...
                echo "<p name='IDDelete'> ID : " . $row["id"] . "</p>";
                echo "<p> Nom : " . $row["nom"] . "</p>";
                echo "<img src='../src/img/" . $row["img"] . "'>";
                echo "<p>Text : " . $row["descr"] . "</p>";
        // echo "<img src='../src/img/animateur.jpg' >";     
    }

    public static function showByListeID($liste_id){
        $db = ConnectionFactory::callAuto();
        $query = "SELECT * from item, reservation_item where liste_id = ".$liste_id ." AND  id= reservation_item.id_item;";
        $st = $db->prepare($query);
        $st->execute();
        foreach ($st->fetchAll(PDO::FETCH_NUM) as $row){
            echo "<p name='IDDelete'> ID : " . $row[0] . "</p>";
            echo "<p name='IDDelete'> Liste_ID : " . $row[1] . "</p>";
            echo "<p> Nom : " . $row[2] . "</p>";
            echo "<img src='../src/img/" . $row[4] ."'  style='width:10%'>";
            echo '
            <br>
            <div id="content">
            <form method="GET" enctype="multipart/form-data">
                <div>
                    <input type="file" name="image">
                    <br>
                    <textarea name="src" cols="40" rows="4" placeholder="Link to this img"></textarea>
                    <br>
                    <input type="submit" name="update" value="Update Img">
                    <br>
            </form>
        </div>';
            echo "<p>Text : " . $row[3] . "</p>";
            echo "<p>Tarif : " . $row[6] . "</p>";
            if ($row[8] == null) {
                # code...
                echo '<br>
                <div id="content">
                <form method="GET" enctype="multipart/form-data">
                    <div>
                        <textarea name="src" cols="6" rows="1" placeholder="Your ID"></textarea>
                        <br>
                        <textarea name="src" cols="20" rows="2" placeholder="Your Message"></textarea>
                        <br>
                        <input type="submit" name="update" value="Update Img">
                        <br>
                </form>
            </div>';
            }
            else{
                echo "<p>Already had someone</p>";
            }
    } 
    }
}
