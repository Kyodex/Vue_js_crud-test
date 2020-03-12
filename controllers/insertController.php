<?php
$title='Ajouter un utilisateur';    //titre de la page
$link_js='../assets/js/insert.js';    //liens de la page javascript 

if(isset($_POST['valider'])){
    $val=true;
    $title=$_POST['title'];
    $label=$_POST['label'];
    $year=$_POST['year'];
    $price=$_POST['price'];

    if($val){
        $fichier=file('../assets/json/disc.json'); //récupère le fichier
        //var_dump($fichier);

        $decode=json_decode($fichier[0]);   //décode le fichier
        
        //récupère le dernier id
        $id=$decode[count($decode)-1]->disc_id;
        //rajoute les nouvelles valeurs
        //recopie le dernier élément
        $dernier = clone $decode[count($decode)-1]; //copy l'objet
        //ajoute les nouvelles valeurs
        $dernier->disc_id++;
        $dernier->disc_title=$title;
        $dernier->disc_label=$label;
        $dernier->disc_year=$year;
        $dernier->disc_price=$price;
        //ajoute à la liste
        $decode[]=$dernier;
        $encode=json_encode($decode);
        //écrit dans le fichier        
        $fichier = fopen('../assets/json/disc.json', 'w+');
        fputs($fichier,$encode);
        fclose($fichier);
        header('Location:../views/list.php');
    }
}