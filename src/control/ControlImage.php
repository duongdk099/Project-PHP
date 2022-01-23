<?php
// namespace wish\control;

use wish\bd\ConnectionFactory;

include "./src/bd/ConnectionFactory.php";
class ControlImage
{
    public static function showImage()
    {
        if (isset($_GET['showImageByID'])) {
            # code...
            $id = $_GET['URL_To_Image'];
            self::show($id);
        } 
    }

    public static function changedImage(){
        if (isset($_GET[''])) {
            # code...
        }
    }


    public static function UploadImage(){
        if ($_POST['src'] != null) {
            // Source Link sur internet
        $db = ConnectionFactory::callAuto();
        $src = $_POST['src'];
    
        $query = "INSERT INTO imgsrc (src) VALUES ('$src')";
    
        $st = $db->prepare($query);
        $st->execute();
        echo "Source Link";
        }
        else{
        // Path to store
        $target = "image/" . basename($_FILES['image']['name']);
        // Connect
        $db = ConnectionFactory::callAuto();
    
        $image = $_FILES['image']['name'];
    
        $query = "INSERT INTO imgsrc (img) VALUES ('$image ')";
    
        $st = $db->prepare($query);
        $st->execute();
    
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            # code...
            $msg = "Img uploaded successfully";
        } else {
            $msg = "Problems";
        }
        }
    } 

    public static function show($url)
    {
        $db = ConnectionFactory::callAuto();
        $query = "SELECT * FROM `item` WHERE `url` = '".$url."';";
        $st = $db->prepare($query);
        $st->execute();
        foreach ($st->fetchAll(PDO::FETCH_NUM) as $row) {
                # code...
                print "<p name='IDDelete'> ID : " . $row[0] . "</p>";
                echo '<a href="delete.php?id=' . $row[0] . '"> Delete</a><br/>';
                print "<img src='../src/img/" . $row[4] . "'>";
                echo '
                <div id="ChangeAdresse">
                    <form action="" method="GET">
                        <input type="hidden" name="ID" value="'.$row[0].'">
                        <textarea name="New_Source" cols="20" rows="1" placeholder="src : "></textarea>
                        <br>
                        <input type="submit" name="changeSource" value="Change source">
                        
                    </form>
                </div>';
                print "<p>Text : " . $row[3] . "</p>";
            
        }
        // echo "<img src='../src/img/animateur.jpg' >";     
    }
}
