<?php
require 'flag.php';

if (isset($_GET['name']) and isset($_GET['password'])) {
    $name = (string)$_GET['name'];
    $password = (string)$_GET['password'];

    if ($name == $password) {
        print 'Your password can not be your name.';
    } else if (sha1($name) === sha1($password)) {
      die('Flag: '.$flag);
    } else {
        print '<p class="alert">Invalid password.</p>';
    }
}
?>

<html>
<body>
<h1><a href="ctf.php.txt">Western Cyber Cookies Event - Challenge 1</a></h1>

<form action="ctf.php">
Username: <input type="text" name="name">
Password: <input type="text" name="password">
<input type="submit">
</form>
</body>
</html>