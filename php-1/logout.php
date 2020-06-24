<?php

session_start();
require_once "util.php";
unset($_SESSION[AUTH]);
header('location: login.php');
