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
    echo "You are not authorized. Go away :(";
} else {
    echo "You are good :)";
}