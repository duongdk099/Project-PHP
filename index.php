<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<form class="login_info" method="post">
    <div>
        <label>Username : </label>
        <input type='text' placeholder='Enter Username' name='username' id="ID" required>
        <br> <br>
        <label>Password : </label>
        <input type='password' placeholder='Enter Password' name='password' id="pass" required>
        <br> <br>
        <button type='submit' name="submit" id="submitLogin">Login</button>
    </div>
</form>

<form action="pageChange.php">
    <div>
        <button type="submit">Change Password</button>
    </div>
</form>

<form action="pageCreate.php">
    <div>
        <button type="submit">Create Account</button>
    </div>
</form>

<form action="pageDelete.php">
    <div>
        <button type="submit">Delete Account</button>
    </div>
</form>
</html>
<?php
require_once 'vendor/autoload.php';
\wish\control\ControlLogin::checkLogin();
?>