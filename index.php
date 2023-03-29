<?php

require_once '_connect.php';

$pdo = new PDO(DSN, USER, PASS);



// if (!empty($_POST)){ 

// $query = "INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)";
// $statement = $pdo->prepare($query);
// $statement->bindValue(':firstname', $friend['firstname']);
// $statement->bindValue(':lastname', $friend['lastname']);
// $statement->execute();


// }

if (!empty($_POST)) {

    $lastname = trim($_POST['lastname']);
    $firstname = trim($_POST['firstname']);

    $lastname = htmlentities($_POST['lastname']);
    $firstname = htmlentities($_POST['firstname']);

    $insertQuery = "INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)";
    $statement = $pdo->prepare($insertQuery);
    $statement->bindValue(':lastname', $lastname);
    $statement->bindValue(':firstname', $firstname);
    $statement->execute();
}

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friend = $statement->fetchAll();

// var_dump($friend);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friends</title>
</head>

<body>
    <h1>Friends :</h1>
    <ul>
        <?php foreach ($friend as $name) : ?>
            <li><?= $name['firstname'] . '  ' . $name['lastname'] ?> </li>
        <?php endforeach ?>
    </ul>
    <form action="" method="POST">
        <div>
            <label for="firstname">Prénom :</label>
            <input type="text" name="firstname" id="firstname">
        </div>
        <div>
            <label for="lastname">Nom :</label>
            <input type="text" name="lastname" id="lastname">
        </div>
        <button type="submit">ajouter</button>
    </form>
</body>

</html>