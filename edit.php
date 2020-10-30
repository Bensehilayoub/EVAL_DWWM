<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<?php

date ('Y-m-d');


@$oldTitle=$_GET['title'];
@$oldDescription=$_GET['description'];
@$oldDate=$_GET['date'];

if ($_POST){
    try {
        require_once("db.php");
        $cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $cnx->exec("SET NAMES 'UTF8';");
        $id=$_GET['id'];        
        $title=$_POST['title'];
        $description=$_POST['description'];
        $date=$_POST['date'];
        $resultat = $cnx->prepare('UPDATE posts SET post_title = :title, description = :description, post_at = :date WHERE Id = :id');
        $resultat->bindParam(':id', $id);
        $resultat->bindParam(':title', $title);
        $resultat->bindParam(':description', $description);
        $resultat->bindParam(':date', $date);
        $resultat->execute();
        if($cnx) echo "CONNEXION OK<br>";
        header('location:index.php');
    
    }   catch (Exception $ex) {
            die ('Erreur : ' .$ex->getMessage());
    }
}

?>



<div class="row">
    <div class="col-12 col-md-6">
    <h4>Modification de l'article : <?php echo $oldTitle ?> </h4>
        <form method="post" action="">
            <div class="form-group" >
                <label for="title"> Title : </label>
                <input type="text"  required class="form-control" id="title" aria-describedby="emailHelp" name="title" placeholder="Title" value="<?php echo $oldTitle ?>">
            </div>
            <div class="form-group">
                <label for="description">Description : </label>
                <textarea class="form-control" id="description" name="description" rows="3" required><?=$oldDescription?></textarea>
            </div>
            <div class="form-date">
                <label for="date"> Date : </label>
                <input type="date" required max="<?php echo date('Y-m-d'); ?>" min="1970-01-01" value="<?php echo $oldDate ?>"  class="form-control" id="date" name="date">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</div>