<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<?php

$id=$_GET['id']; 
$title=$_GET['title'];

try {
    require_once("db.php");
    $cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $cnx->exec("SET NAMES 'UTF8';");
    if($cnx) echo "CONNEXION OK <br>";
    $sql = "DELETE FROM posts WHERE Id = :id ";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    echo "Titre ".$title." effacé avec succés. <br>";
    header('location:index.php');
        

}   catch (Exception $ex) {
        die ('Erreur : ' .$ex->getMessage());
}


?>
