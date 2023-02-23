<?php
    $serveur = "localhost";
    $dbname = "exam";
    $user = "root";
    $pass = "";

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $age = $_POST["age"];
    $classe = $_POST["classe"];  
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];      
    $sexe = $_POST["sexe"];
    $pays = $_POST["pays"];


    try{
        $dbco= new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth=$dbco->prepare("
            INSERT INTO devoir(nom, prenom, age, classe, email, telephone, sexe, pays)
            VALUES(:nom, :prenom, :age, :classe, :email, :telephone, :sexe, :pays)");
        $sth->bindParam(':nom',$nom);
        $sth->bindParam(':prenom',$prenom);
        $sth->bindParam(':age',$age);
        $sth->bindParam(':classe',$classe);
        $sth->bindParam(':email',$email);
        $sth->bindParam('telephone',$telephone);
        $sth->bindParam(':sexe',$sexe);
        $sth->bindParam(':pays',$pays);
        $sth->execute( );

        header("Location:exam-merci.html");
    }
    catch(PDOExeception $e){
        echo'Imposible de traiter les données. Erreur : '.$e->getMessage();
    }
?>
