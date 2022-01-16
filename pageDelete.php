<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<form  method ="post" >
    <div>
        <label>Username : </label> 
        <input type='text' placeholder='Enter Username' name='username' id="ID" required>       
        <button type='submit' name="submit" id="submitDelete" >Delete</button> 
    </div> 
</form>

<?php
require_once 'vendor/autoload.php';
\wish\control\ControlLogin::deleted();
        
?>

</html>

