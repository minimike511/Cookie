<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 2017-03-18
 * Time: 오후 8:15
 */
session_start();
echo $_SESSION['nobAuth'] . "\n";
echo $_COOKIE['nobAuth'] . "\n";
if ($_COOKIE['nobAuth'] != "true") {
    exit(1);
} else {
    echo "You are good :)\n";
}
?>

<html>
<body>
<?php
    echo $_ENV["COOKIE_FLAG"];
?>
</body>
</html>