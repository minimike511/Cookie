<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 2017-03-18
 * Time: 오후 8:15
 */
session_start();

if ($_COOKIE['ID']  != $_ENV["COOKIE_ID"] && $_COOKIE['PWD'] != $_ENV["COOKIE_PWD"]) {
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