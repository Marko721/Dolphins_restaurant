<?php include("includes/header.php"); ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            
<?php include("includes/top_nav.php") ?>
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            

<?php include("includes/side_nav.php"); ?>


            <!-- /.navbar-collapse -->
        </nav>




        <div id="page-wrapper">

        <div class="container-fluid">


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dodeljeni stolovi
        </h1>

    
<div class="col-md-12">

<table class="table table-hover">
    <thead>
        <tr>
            <th>Broj Stola</th>
            <th>Broj Stolica</th>
            <th>Broj zauzetih stolica</th>
            <th>Poruceno</th>
            <th>Iznos Racuna</th>
            <th>Naplaceno</th>
            <th>Porudzbina</th>
        </tr>
    </thead>

    <tbody>

        <?php


if ($session->status == 'konobar') {
    $query = "SELECT * FROM stolovi WHERE id_konobara = {$session->user_id}";
    $stolovi = Sto::find_this_query($query);

    foreach ($stolovi as $sto) {
        echo "<tr>";
        echo "<td>{$sto->id}<img src='../includes/images/table.png' width=50px hspace=20px></td>";
        echo "<td>{$sto->broj_stolica}</td>";
        echo "<td>{$sto->zauzete_stolice}</td>";
        echo "<td>{$sto->poruceno}</td>";
        echo "<td>{$sto->iznos_racuna} RSD</td>";
        echo ($sto->naplaceno) ? "<td>Naplaceno</td>" : "<td>Nije naplaceno</td>";
        echo "<td><a href='porudzbina.php?id={$sto->id}' class='btn btn-primary'>Porudzbina</a></td>";
        echo "</tr>";
    }

} else {

    echo "<p class='bg-danger'>Nemate pristup ovoj strani</p>";

}

echo "<p>{$session->message}</p>";

?>
       
       </tbody>
</table>
</div>


    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>