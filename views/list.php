<?php
    include '../controllers/listController.php';
    include 'header.php';
?>

<div class="table responsive" id="tableau">
    <table class="table table-bordered table-dark table-hover">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Titre</th>
            <th scope="col">Label</th>
            <th scope="col">Année</th>
            <th scope="col">Prix</th>
        </tr>
        </thead>
        <tbody>
            <tr v-for="disc in discs" v-on:click="link(disc.disc_id)">
                <td> {{ disc.disc_id }} </td>
                <td> {{ disc.disc_title }} </td>
                <td> {{ disc.disc_label }} </td>
                <td> {{ disc.disc_year }} </td>
                <td> {{ disc.disc_price }} </td>
            </tr>

        </tbody>
    </table>
</div>

<?php
    include 'footer.php';
?>