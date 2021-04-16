<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    include '../secure/log.php';


    try {
        $bdd = new PDO('mysql:host=' . $servername . ';charset=utf8', $username, $password);



        $bdd->query("CREATE DATABASE $dbname");
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }



    try {
        $bdd = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname . ';charset=utf8', $username, $password);





        $bdd->query("CREATE TABLE users (
        pseudo VARCHAR(30) NOT NULL,
        name VARCHAR(30),
        lastname VARCHAR(30),
        mail VARCHAR(250) UNIQUE,
        pass VARCHAR(255),
        role INT,
        PRIMARY KEY (pseudo)
        )");

        $bdd->query("CREATE TABLE IF NOT EXISTS content (
        id INT NOT NULL AUTO_INCREMENT, 
        name VARCHAR(30),
        description VARCHAR(255),
        content LONGTEXT,
        practice VARCHAR(30),
        speciality VARCHAR(30),
        type VARCHAR(30),
        picutre VARCHAR(255),
        time DATE,
        published INT,
        PRIMARY KEY (id))");
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    ?>
</body>

</html>