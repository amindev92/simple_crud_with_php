<?php

include_once "../config/database.php";

$id = $_GET["id"] ?? null;

if ($id) {
    $statement = $pdo->prepare("DELETE FROM products WHERE id = :id");
    $statement->bindValue(":id", $id);
    $statement->execute();


    header("Location:../index.php");
    exit;
}


?>
