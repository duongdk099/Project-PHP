<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<form  method ="post" >
    <div>
        <label>Username : </label> 
        <input type='text' placeholder='Enter Username' name='username' id="ID" required>
        <br>
        <label>Current Password : </label> 
        <input type='password' placeholder='Enter Password' name='password' id="pass" required > 
        <br>
        <label>New Password : </label>
        <input type='password' placeholder='Enter Password' name='new_password' id="pass" required >
        <button type='submit' name="submit" id="submitChange" >Change</button> 
    </div> 
</form>

<?php
require_once 'vendor/autoload.php';
\wish\control\ControlLogin::change();
        
?>

</html>

