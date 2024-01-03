<?php

session_start();
$name = 'yamada';
$age = 30;
$_SESSION['name'] = $name;
$_SESSION['age'] = $age;

$sid = session_id();
echo $sid;