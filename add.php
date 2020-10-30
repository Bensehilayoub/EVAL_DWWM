<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<?php

date ('Y-m-d');


if ($_POST){
    try {
        require_once("db.php");
        $cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $cnx->exec("SET NAMES 'UTF8';");
        $title=$_POST['title'];
        $description=$_POST['description'];
        $date=$_POST['date'];
        if($cnx) echo "CONNEXION OK<br>";
        
        $sql = "INSERT INTO posts(post_title, description, post_at) VALUES (:title, :description, :date)";
        $stmt = $cnx->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        echo "Personne ajoutée avec succés. <br>";
        header('location:index.php');
            
    
    }   catch (Exception $ex) {
            die ('Erreur : ' .$ex->getMessage());
    }
}
?>


    <h1>Ajouter un article</h1>
    <br>
    <a class="btn btn-primary" href="index.php" role="button">BACK TO LIST</a>
    <br>
<div class="row">
    <div class="col-12 col-md-6">
        <form method="post" action="">
            <div class="form-group" >
                <label for="title">Title : </label>
                <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" placeholder="Title" required>
            </div>
            <div class="form-group">
                <label for="description">Description : </label>
                <textarea class="form-control" id="description" name="description" required rows="3">Description.. </textarea>
            </div>
            <div class="form-date">
                <label for="date"> Date : </label>
                <input type="date" required  max="<?php echo date('Y-m-d'); ?>" min="1970-01-01"  class="form-control" id="date" name="date">
            </div>
            <br>
            <button type="submit" class="btn btn-primary"> Add </button>
        </form>
    </div>
</div>