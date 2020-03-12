<?php
    include '../controllers/detailController.php';
    include 'header.php';
if( isset($number)){
?>
<div id="app">
    <p class="font-weight-bold vert" v-if="!trouve"> {{ message }} </p>
    <div v-if="trouve">
        <p>
            <span class="font-weight-bold"> Titre : </span>{{ disc.disc_title }}
        <p>        
        </p>
            <span class="font-weight-bold"> Label : </span>{{ disc.disc_label }}
        </p>
        </p>
            <span class="font-weight-bold"> Prix : </span>{{ disc.disc_price }}
        </p>
        </p>
            <span class="font-weight-bold"> Année : </span>{{ disc.disc_year }}
        </p>
    </div>
</div>
<a class="btn btn-info" href="modif.php?id=<?=$number?>">Modifier</a>

<!-- Button trigger modal -->
<a type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" href="../controllers/supprController.php">
  Supprimer
</a>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Supprimer</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Êtes-vous sûr de vouloir supprimer ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Annuler</button>
        <a type="button" class="btn btn-danger" href="../controllers/supprController.php?id=<?=$number?>">Supprimer</a>
      </div>
    </div>
  </div>
</div>

<?php
}else{
?>
    <p class="font-weight-bold vert"> utilisateur invalide </p>
<?php
    }
?>
<a class="btn btn-info" href="list.php">Retour</a>
<?php
    include 'footer.php';
?>