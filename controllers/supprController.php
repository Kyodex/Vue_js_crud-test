<?php
if(isset($_GET['id'])){
    $number=$_GET['id'];


        $fichier=file('../assets/json/users.json'); //récupère le fichier
        $decode=json_decode($fichier[0]);   //décode le fichier

     

        $id=-1; //id2 vaut -1 sil 'ID n'est pas trouvé
        for($i=0;$i<count($decode);$i++){  //parcourt la liste
            if($decode[$i]->id==$number){  //une fois trouvé
                $id=$i;
            }
        }
        if($id==-1){   //si l'utilisateur n'a pas été trouvé
            $message='erreur : l\'utilisateur n\'a pas été trouvé';
            header('Location:../views/list.php?');
            return false;   //sort si l'utilisateur n'est pas dans la base
        }

        //supprime l'objet
        array_splice($decode,$id,1);

        
        //ajoute à la liste
        $encode=json_encode($decode);
        //écrit dans le fichier

        $fichier = fopen('../assets/json/users.json', 'w+');
        fputs($fichier,$encode);
        fclose($fichier);
        header('Location:../views/list.php');
    
}