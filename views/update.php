<?php

include_once "partials/header.php";
include_once "../config/database.php";

$title = "";
$price = "";
$date = "";
$imagePath = "";

$id = $_GET["id"] ?? null;

if ($id) {
    $statement = $pdo->prepare("SELECT * FROM products WHERE id = :id");
    $statement->bindValue(":id", $id);
    $statement->execute();
    $product = $statement->fetch(PDO::FETCH_ASSOC);
    $title = $product["title"];
    $price = $product["price"];
    $date = $product["create_time"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // var_dump($_SERVER);

    $title = $_POST["title"];
    $price = $_POST["price"];
    $create_time = $_POST["create_date"];

    $image = $_FILES["image"] ?? null;

    if ($image and $image["tmp_name"]) {
        // var_dump($image);

        if (!is_dir("../assets/img")) {
            mkdir("../assets/img");
        }

        $imagePath = "../assets/img/" . randomName(8) . "/" . $image["name"];

        mkdir(dirname($imagePath));
        move_uploaded_file($image["tmp_name"], $imagePath);
    }

    $stmt = $pdo->prepare("UPDATE products SET title = :title, image=:image, price= :price WHERE id = :id");

    $stmt->bindValue(":title", $title);
    $stmt->bindValue(":price", $price);
    $stmt->bindValue(":image", $imagePath);
    $stmt->bindValue(":id", $id);
    $stmt->execute();

    header("Location:../index.php");
    exit;
}

function randomName($num)
{
    $string = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ@#_-";
    $finalString = "";
    for ($i = 0; $i < $num - 1; $i++) {
        $randNum = rand(0, strlen($string)  - 1);
        $finalString .= $string[$randNum];
    }
    return $finalString;
}


?>


<div class="lg:flex lg:items-center lg:justify-between mb-4">
    <div class="min-w-0 flex-1">
        <h2 class="text-2xl font-bold leading-7  sm:truncate sm:text-3xl sm:tracking-tight">Create New Product</h2>

    </div>
    <div class="mt-5 flex lg:ml-4 lg:mt-0">


        <span class="sm:ml-3">
            <a href="../index.php" type="button" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Return to Product list
            </a>
        </span>


    </div>
</div>


<?php require_once "form.php"; ?>


</body>

</html>