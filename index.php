<?php
require_once 'class/class.php';
require_once 'class/users.php';
//instanciation création d' un objet
//$x = new voiture(5);
//var_dump($x);
//$x->marque = " volvo"; // mauvaise pratique
//$x->setMarque("volvo");
//echo $x->marque . '<br>';
////$y = new voiture(5);
//echo $y->getMarque() . '<br>';
//echo $y->hello() . '<br>';
//echo $x->getMarque();

//echo $x::nbre_roue;
//echo $y::nbre_roue;
//echo $x->getNbre_roue();
//echo voiture::getNbre_roue();
//echo voiture::nbre_roue;
// on parcour tous les posts en les securisant avec htmlspecialchars
foreach ($_POST as $key => $val){
    $postSecure[$key] = htmlspecialchars($val);

}
if (isset($postSecure['valider'])) {
    $users = new users($postSecure);
    if ($users->isValid()){
        $users->save();
    }else{
      $errors =  $users->getError();
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
<?php
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error;
    }
}
?>
<form action="" METHOD="post">
    <input type="text" name="nom" placeholder="entrez votre nom">
    <input type="text" name="prenom" placeholder="entrez votre prénom">
    <input type="email" name="email" placeholder="entrez votre email">
    <input type="tel" name="tel" placeholder="entrez votre n° de telephone">
    <input type="password" name="password" placeholder="entrez votre mot de passe">
    <button type="submit" name="valider">s'inscrire</button>
</form>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
