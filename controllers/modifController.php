<?php

$title = 'Modifier l\'utilisateur';    //titre de la page
$link_js = '../assets/js/modif.js';    //liens de la page javascript 

$message = '';    //message d'erreur

if (isset($_GET['id'])) {
    $number = $_GET['id'];
    $title = 'Modifier l\'utilisateur ' . $number;
}

if (isset($_POST['valider'])) {
    $val = true;
    $title = $_POST['title'];
    $label = $_POST['label'];
    $price = $_POST['price'];
    $year = $_POST['year'];
    if ($val) {
        $fichier = file('../assets/json/disc.json'); //récupère le fichier
        $decode = json_decode($fichier[0]);   //décode le fichier
        $id = -1; //id2 vaut -1 sil 'ID n'est pas trouvé
        for ($i = 0; $i < count($decode); $i++) {  //parcourt la liste
            if ($decode[$i]->disc_id == $number) {  //une fois trouvé
                $id = $i;
            }
        }
        if ($id == -1) {   //si l'utilisateur n'a pas été trouvé
            $message = 'erreur : l\'utilisateur n\'a pas été trouvé';
            return false;   //sort si l'utilisateur n'est pas dans la base
        }

        //change les valeurs
        $decode[$id]->disc_title = $title;
        $decode[$id]->disc_label = $label;
        $decode[$id]->disc_price = $price;
        $decode[$id]->disc_year = $year;


        //ajoute à la liste
        $encode = json_encode($decode);
        //écrit dans le fichier

        $fichier = fopen('../assets/json/disc.json', 'w+');
        fputs($fichier, $encode);
        fclose($fichier);
        header('Location:../views/list.php');
    }
}