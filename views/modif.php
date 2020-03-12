<?php
    include '../controllers/modifController.php';
    include 'header.php';
    if( isset($number)){
?>
<div id="app" >
<p class="font-weight-bold vert" v-if="!trouve"> {{ message }} <?=$message?></p>
<form method="post" @submit="valide" novalidate="true" action="#"  v-if="trouve">
    <div class="form-group">
        <label for="title">Titre :</label>
        <input type="text" class="form-control" id="title" name="title" v-model="title">
        <span class="text-danger">{{ err_title }}</span>
    </div>
    <div class="form-group">
        <label for="label">Label :</label>
        <input type="text" class="form-control" id="label" name="label" v-model="label">
        <span class="text-danger">{{ err_label }}</span>
    </div>
    <div class="form-group">
        <label for="price">Prix :</label>
        <input type="text" class="form-control" id="price" name="price" v-model="price">
        <span class="text-danger">{{ err_label }}</span>
    </div>
    <div class="form-group">
        <label for="year">Année :</label>
        <input type="text" class="form-control" id="year" name="year" v-model="year">
        <span class="text-danger">{{ err_label }}</span>
    </div>
    <button type="submit" id="valider" name="valider" class="btn btn-info" >Valider</button>
</form>
    </div>
<?php
}else{
?>
    <p class="font-weight-bold vert"> utilisateur invalide </p>
<?php
    }
?>

<?php
    include 'footer.php';
?>





    