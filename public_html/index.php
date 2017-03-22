<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 2017-03-18
 * Time: 오후 8:14
 */

session_start();
$userAuthed = false;
$_SESSION['nobAuth'] = false;

setcookie("ID", $_POST['user'], time() + (86400 * 30), "/"); // 86400 = 1 day
setcookie("PWD", $_POST['password'], time() + (86400 * 30), "/"); // 86400 = 1 day
?>

<html>
<body>
<h1>
    <a href="index.txt">
        Source code
    </a>
</h1>
<?php
if (!($_COOKIE['ID'] != '' && $_COOKIE['ID']  != null)) {
    ?>
    <form method="POST" action="index.php">
        <input type="text" name="user" id="user">
        <input type="password" name="password" id="password">
        <input type="submit" value="SUBMIT">
    </form>
    <?php
} else if($_COOKIE['ID']  == $_ENV["COOKIE_ID"] && $_COOKIE['PWD'] == $_ENV["COOKIE_PWD"]){
    ?>
    <p>You are authed, try clicking on this <a href="cookies3.php">link</a>.</p>
    <?php
}
?>
</body>
</html>