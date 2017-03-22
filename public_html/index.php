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
    <button onclick="clearListCookies()"> Delete Cookie </button>
    <script>
        function clearListCookies()
        {
            var cookies = document.cookie.split(";");
            for (var i = 0; i < cookies.length; i++)
            {
                var spcook =  cookies[i].split("=");
                deleteCookie(spcook[0]);
            }
            function deleteCookie(cookiename)
            {
                var d = new Date();
                d.setDate(d.getDate() - 1);
                var expires = ";expires="+d;
                var name=cookiename;
                //alert(name);
                var value="";
                document.cookie = name + "=" + value + expires + "; path=/acc/html";
            }
            window.location = ""; // TO REFRESH THE PAGE
        }
    </script>
    <?php
}
?>
</body>
</html>
