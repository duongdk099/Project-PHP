<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<form method="post">
    <div>
        <label>Username : </label>
        <input type='text' placeholder='Enter Username' name='username' id="ID" required>
        <label>Password : </label>
        <input type='password' placeholder='Enter Password' name='password' id="pass">
        <button type='submit' name="submit" id="submitCreate">Create</button>
    </div>
</form>
<?php
require_once 'vendor/autoload.php';
\wish\control\ControlLogin::created();
?>

</html>