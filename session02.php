<?php

session_start();

$name = $_SESSION['name'];
$name = $_SESSION['age'];

echo $name;
echo'<br>';
echo $age;