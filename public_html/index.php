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
    setcookie("ID", $_POST['user'], time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie("PWD", $_POST['password'], time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie("HASH", str_rot13($_POST['user'] . " " . $_POST['password']), time() + (86400 * 30), "/");
}


if ($_COOKIE['HASH'] == $_ENV['COOKIE_HASH']) {
    $userAuthed = true;
}
/*
if ($_POST['user'] != '' && $_POST['user'] != null) {
    if ($_POST['user'] == $_ENV["COOKIE_ID"] && $_POST['password'] == $_ENV["COOKIE_PWD"]) {
        $userAuthed = true;
        setcookie("nobAuth","true",time()+600000);
    }
}*/
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
        <input type="text" name="user" id="user">
        <input type="password" name="password" id="password">
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