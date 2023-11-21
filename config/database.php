
<?php

$pdo = new PDO("mysql:host=localhost;port=3306;dbname=simple_crud","root","");

$pdo ->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);








/*

mysql> CREATE TABLE products(
    -> id int primary key AUTO_INCREMENT,
    -> title varchar(256),
    -> price float(6,2),
    -> image varchar(2056),
    -> create_time datetime DEFAULT CURRENT_TIMESTAMP);

    **/

    ?>