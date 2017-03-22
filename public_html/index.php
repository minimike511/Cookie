<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 2017-03-18
 * Time: 오후 8:14
 */

session_start();
$userAuthed = false;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    setcookie("HASH", str_rot13($_POST['user'] . " " . $_POST['password']), time() + (86400 * 30), "/");
}

echo $_COOKIE['HASH'] . '\n';
echo $_ENV['COOKIE_HASH'] . '\n';
if ($_COOKIE['HASH'] == $_ENV['COOKIE_HASH']) {
    $userAuthed = true;
}
?>

<html>
<body>
<h1>
    <a href="index.txt">
        Source code
    </a>
</h1>
<?php
if (!$userAuthed) {
    ?>
    <form method="POST" action="index.php">
        Username: <input type="text" name="user" id="user"><br>
        Password: <input type="password" name="password" id="password"><br>
        <input type="submit" value="SUBMIT">
    </form>
    <?php
} else {
    ?>
    <p>You are authed, try clicking on this <a href="cookies3.php">link</a>.</p>
    <?php
}
?>
</body>
</html>
