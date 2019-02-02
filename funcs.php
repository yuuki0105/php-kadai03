<?php
//共通に使う関数を記述

function h($a){
    return htmlspecialchars($a, ENT_QUOTES);
}

function db_con(){
    try {
        $pdo = new PDO('mysql:dbname=gs_kadai;charset=utf8;host=localhost','root','');
        return $pdo;
    } catch (PDOException $e) {
        exit('DB-Connection-Error:'.$e->getMessage());
      }      
}

function redirect($page){
    header("Location: ".$page);
    exit;
}

function sqlError($stmt){ 
    $error = $stmt->errorInfo();
    exit("ErrorSQL:".$error[2]);
  }