<?php

namespace wish\control;

use wish\bd\ConnectionFactory;

include "./src/bd/ConnectionFactory.php";
class ControlLogin
{

    public static function checkLogin()
    {
        if (isset($_POST['submit'])) {
            # code...
            // collect value of input field
            $user = $_POST['username'];
            $pass = $_POST["password"];

            $db = ConnectionFactory::callAuto();
            $request = ("SELECT * from login where `user`='$user' and `pass`='$pass';");
            $st = $db->prepare($request);
            $st->execute();

            if ($st->rowCount() > 0) {
                print "Welcome " . $user;
                echo
                '<form action="Inside.php" >
                            <div>
                                <button type="submit">Go to Your Space</button>
                            </div>
                        </form>';
            } else {
                print "Wrong User or Password";
            }
        }
    }

    public static function checkUserPass($user,$pass)
    {
        $db = ConnectionFactory::callAuto();
        $st = $db->prepare("SELECT * FROM `login` where `user` = ? and `pass` = ?;");
        $st->execute(array($user,$pass));

        if ($st->rowCount() == 0) {
            return false;
        }
        return true;
    }

    /**
     * Website Change.php 
     */
    public static function change(){

        if (isset($_POST['submit'])){
            $user = $_POST['username'];
            $pass = $_POST["password"];
            $newPass = $_POST['new_password'];
            if (self::checkUserPass($user,$pass) == true) {
                # code...
                $db = ConnectionFactory::callAuto();
    
                $st = $db->prepare("UPDATE `login` set pass = '".$newPass."' where user = '".$user."';");
                $st->execute();
                print "Nice, ".$user."has been updated new password";
            }
            else{
                print $user." not found or Wrong Pass";
            }
        }
    }

    public static function checkUser($user)
    {
        $db = ConnectionFactory::callAuto();
        $st = $db->prepare("SELECT * from login where `user`='" . $user . "';");
        $st->execute();

        if ($st->rowCount() == 0) {
            return false;
        }
        return true;
    }
    public static function created()
    {
        if (isset($_POST['submit'])){
            $user = $_POST['username'];
            $pass = $_POST["password"];
            if (self::checkUser($user) == false) {
                # code...
                $db = ConnectionFactory::callAuto();
                $user = $_POST['username'];
                $pass = $_POST["password"];
                $st = $db->prepare("INSERT INTO `login`(user,pass) VALUES('".$user."','".$pass."');");
                $st->execute();
                print "Nice, ".$user."has been created";
            }
            else{
                print $user." has been used by others";
            }
        }
            # code...
    }

    public static function deleted(){
        if (isset($_POST['submit'])) {
            # code...
            // collect value of input field
                $user = $_POST['username'];            
                    $db= ConnectionFactory::callAuto();
                    $request = ("delete from login where `user`='".$user."';");
                    $st=$db->prepare($request);
                    $st->execute();
                
                    if ($st ->rowCount()>0) {
                        print "Delete ok";
                    }
                    else{
                        print "Not found " .$user;
                    }
        }
    }
}
