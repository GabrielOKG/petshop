<?php
require 'database.php';
use DB\Conn;
    $pdo = Conn::get()->connect();
    var_dump($pdo);