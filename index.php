<?php
require_once 'class/class.php';
//instanciation création d' un objet
$x = new voiture(5);
var_dump($x);
//$x->marque = " volvo"; // mauvaise pratique
$x->setMarque("volvo");
//echo $x->marque . '<br>';
$y = new voiture(5);
echo $y->getMarque() . '<br>';
echo $y->hello() . '<br>';
echo $x->getMarque();

//echo $x::nbre_roue;
//echo $y::nbre_roue;
echo $x->getNbre_roue();
echo voiture::getNbre_roue();
echo voiture::nbre_roue;

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

        $nom=htmlspecialchars($_POST["nom"]);
        $prenom=htmlspecialchars($_POST["prenom"]);
        $email=htmlspecialchars($_POST["email"]);
        $tel=htmlspecialchars($_POST['tel']);
        $password=password_hash($_POST['mdp'],PASSWORD_DEFAULT);
      var_dump($_POST);
      var_dump($password);
      $data = array();
    $data["name"]  = $nom;
    $data["prenom"]  = $prenom;
    $data["email"] = $email;
    $data["tel"] = $tel;
    $data["password"] = $password;
    file_put_contents('json/usersjson', json_encode( $data ));
 if (isset($_POST['valider'])) {
   
    
    
var_dump($data);
 }
         

?>
<form action="" METHOD="post">
    <input type="text" name="nom" placeholder="entrez votre nom">
    <input type="text" name="prenom" placeholder="entrez votre prénom">
    <input type="email" name="email" placeholder="entrez votre email">
    <input type="number" name="tel" placeholder="entrez votre n° de telephone">
    <input type="password" name="mdp" placeholder="entrez votre mot de passe">
    <button type="submit" name="valider">s' inscrire</button>
</form>


</body>
</html>
