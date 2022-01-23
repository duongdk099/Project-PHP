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
            } else {
                echo "It must be a number";
            }
        }
    }

    public static function changedImage()
    {
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

    public static function showByListeID($liste_id)
    {
        $db = ConnectionFactory::callAuto();
        $query = "SELECT * from item, reservation_item where liste_id = " . $liste_id . " AND  id= reservation_item.id_item;";
        $st = $db->prepare($query);
        $st->execute();
        $stt = 1;
        foreach ($st->fetchAll(PDO::FETCH_NUM) as $row) {
            echo "<br> <br> <br> <br> ";
            echo '
            <div id="Detailler">
            <form method="GET" enctype="multipart/form-data">
                <input type="hidden" name="ID_Detailler" value =' . $row[0] . '>
                <input type="submit" name="detailler" value="Access Cet item">
            </form>
        </div>';
            echo "<p> Nom : " . $row[2] . "</p>";
            echo '
            <div id="delete">
            <form method="GET" enctype="multipart/form-data">
                <input type="hidden" name="IDDelete" value =' . $row[0] . '>
                <input type="submit" name="delete" value="Delete This Img">
            </form>
        </div>';
            if ($row[4] == null) {
                # code...
                echo "Not found image";
            } else {
                if (strpos($row[4], "http") === 0) {
                    echo "<img src='" . $row[4] . "' style='width:10%'>";
                } else {
                    echo "<br><img src='../src/img/" . $row[4] . "'  style='width:10%'>";
                }
            }
            echo '
            <br>
            <div id="image">
            <form method="GET" enctype="multipart/form-data">
            <br>
                    <textarea name="src" cols="40" rows="4" placeholder="Link to update img"></textarea>
                    <br>
                    <input type="submit" name="update" value="Update Img">
                    <br>
                    <input type="hidden" name ="IDUpdate" value = ' . $row[0] . ' >
            </form>
        </div>';
            echo "<p>Text : " . $row[3] . "</p>";
            echo "<p>Tarif : " . $row[6] . "</p>";
            if ($row[8] == null) {
                # code...
                echo '
                <div id="reservation">
                <form method="GET" enctype="multipart/form-data">
                    <div>
                        <textarea name="id_res" cols="6" rows="1" placeholder="Name Participant"></textarea>
                        <br>
                        <textarea name="text_res" cols="20" rows="2" placeholder="Message"></textarea>
                        <br>
                        <input type="hidden" name="ID" value="' . $row[0] . '">
                        <input type="submit" name="reservation" value="Reserver">
                        <br>
                </form>
            </div>';
            } else {
                echo "<p>Taken by : " . $row[8] . "</p>";
                echo "<p>Text : " . $row[9] . "</p>";
            }
        }
    }

    public static function Detailler($id)
    {
        $db = ConnectionFactory::callAuto();
        $query = "SELECT * from item, reservation_item where id = " . $id . " AND  id= reservation_item.id_item;";
        $st = $db->prepare($query);
        $st->execute();
        $stt = 1;
        foreach ($st->fetchAll(PDO::FETCH_NUM) as $row) {
            echo "<br> <br> <br> <br> ";
            echo "<p>ID : ". $row[0];
            echo "<p>Liste_ID : ". $row[1];
            echo "<p>Nom : " . $row[2] . "</p>";
            echo "<p>Description : ".$row[3]."</p>";
            echo '<div id="delete">
            <form method="GET" enctype="multipart/form-data">
                <input type="hidden" name="IDDelete" value =' . $row[0] . '>
                <input type="submit" name="delete" value="Delete This Img">
            </form>
        </div>';
            if ($row[4] == null) {
                # code...
                echo "Not found image";
            } else {
                if (strpos($row[4], "http") === 0) {
                    echo "<img src='" . $row[4] . "' style='width:10%'>";
                } else {
                    echo "<br><img src='../src/img/" . $row[4] . "'  style='width:10%'>";
                }
            }
            echo '
            <br>
            <div id="image">
            <form method="GET" enctype="multipart/form-data">
            <br>
                    <textarea name="src" cols="40" rows="4" placeholder="Link to update img"></textarea>
                    <br>
                    <input type="submit" name="update" value="Update Img">
                    <br>
                    <input type="hidden" name ="IDUpdate" value = ' . $row[0] . ' >
            </form>
        </div>';
            echo "<p>Text : " . $row[3] . "</p>";
            echo "<p>Tarif : " . $row[6] . "</p>";
            if ($row[8] == null) {
                # code...
                echo '
                <div id="reservation">
                <form method="GET" enctype="multipart/form-data">
                    <div>
                        <textarea name="id_res" cols="6" rows="1" placeholder="Name Participant"></textarea>
                        <br>
                        <textarea name="text_res" cols="20" rows="2" placeholder="Message"></textarea>
                        <br>
                        <input type="hidden" name="ID" value="' . $row[0] . '">
                        <input type="submit" name="reservation" value="Reserver">
                        <br>
                </form>
            </div>';
            } else {
                echo "<p>Taken by : " . $row[8] . "</p>";
                echo "<p>Text : " . $row[9] . "</p>";
            }

            echo '
                <div id="partager">
                <form method="GET" enctype="multipart/form-data">
                    <div>
                        <textarea name="text_res" cols="20" rows="2" placeholder="URL"></textarea>
                        <br>
                        <input type="hidden" name="ID" value="' . $row[0] . '">
                        <input type="submit" name="partager" value="Partager">
                        <br>
                </form>
            </div>';
        }
    }

    public static function partargerURL($url,$id){
        $db = ConnectionFactory::callAuto();
        $query = "UPDATE  item  SET url = '".$url."' where id =" . $id . ";";
        $st = $db->prepare($query);
        $st->execute();
    }
}
