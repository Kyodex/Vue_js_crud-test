<?php
$title='Detail d\'un utilisateur';    //titre de la page
$link_js='../assets/js/detail.js';    //lien de la page javascript 


if(isset($_GET['id'])){
    $number=$_GET['id'];
    $title='Detail de l\'utilisateur '.$number;
}